<?php

namespace App\Http\Controllers;

use App\Models\Arsip;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArsipController extends Controller
{

public function index(Request $request)
{
    $search = $request->input('search');

    $arsip = Arsip::with('kategori')
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('judul', 'like', "%{$search}%")
                  ->orWhere('nomor_surat', 'like', "%{$search}%")
                  ->orWhereHas('kategori', function ($q2) use ($search) {
                      $q2->where('nama', 'like', "%{$search}%");
                  });
            });
        })
        ->orderBy('created_at', 'desc')
        ->paginate(5);

    return view('arsip.index', compact('arsip', 'search'));
}

    /**
     * Form tambah arsip baru.
     */
public function create()
{
    $kategori = \App\Models\Kategori::all(); 
    return view('arsip.create', compact('kategori'));
}

    /**
     * Simpan arsip baru.
     */
public function store(Request $request)
{
    $request->validate([
        'nomor_surat'   => 'required|unique:arsip_surat,nomor_surat',
        'kategori_id'   => 'required|exists:kategori,id',
        'judul'         => 'required|string|max:255',
        'file_path'     => 'nullable|file|mimes:pdf|max:2048',
    ]);

    $filePath = null;
    if ($request->hasFile('file_path')) {
        $filePath = $request->file('file_path')->store('arsip', 'public');
    }

    Arsip::create([
        'nomor_surat'       => $request->nomor_surat,
        'kategori_id'       => $request->kategori_id, 
        'judul'             => $request->judul,
        'file_path'         => $filePath,
        'waktu_pengarsipan' => now(),
    ]);

    return redirect()->route('arsip.index')->with('success', 'Arsip berhasil ditambahkan.');
}

    public function show($id)
    {
        $arsip = Arsip::findOrFail($id);
        return view('arsip.show', compact('arsip'));
    }

    public function edit($id)
    {
        $arsip = Arsip::findOrFail($id);
        $kategori = Kategori::orderBy('nama')->get(); // ambil semua kategori

        return view('arsip.edit', compact('arsip', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $arsip = Arsip::findOrFail($id);

        $request->validate([
            'nomor_surat' => 'required|unique:arsip_surat,nomor_surat,' . $arsip->id,
            'kategori_id' => 'required|exists:kategori,id',
            'judul' => 'required|string|max:255',
            'file_path' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $data = $request->only(['nomor_surat', 'kategori_id', 'judul']);

        if ($request->hasFile('file_path')) {
            // Hapus file lama jika ada
            if ($arsip->file_path && \Storage::disk('public')->exists($arsip->file_path)) {
                \Storage::disk('public')->delete($arsip->file_path);
            }

            // Simpan file baru di storage/app/public/arsip
            $data['file_path'] = $request->file('file_path')->store('arsip', 'public');
        }

        $arsip->update($data);

        return redirect()->route('arsip.show', $arsip->id)->with('success', 'Arsip berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $arsip = Arsip::findOrFail($id);

        if ($arsip->file_path && Storage::disk('public')->exists($arsip->file_path)) {
            Storage::disk('public')->delete($arsip->file_path);
        }

        $arsip->delete();

        return redirect()->route('arsip.index')->with('success', 'Arsip berhasil dihapus.');
    }

public function download($id)
{
    $arsip = Arsip::findOrFail($id);
    $filePath = storage_path('app/public/' . $arsip->file_path);
    $fileName = $arsip->judul . '.pdf';

    return response()->download($filePath, $fileName, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'attachment; filename="'.$fileName.'"'
    ]);
}

}
