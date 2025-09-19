<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = Kategori::when($search, function ($query, $search) {
            return $query->where('nama', 'like', "%{$search}%");
        })
        ->orderBy('id', 'asc')
        ->paginate(10)   
        ->withQueryString(); 

        return view('kategori.index', compact('kategori', 'search'));
    }

    // Form tambah kategori
    public function create()
    {
        $nextId = \DB::table('kategori')->max('id') + 1;
        return view('kategori.create', compact('nextId'));
    }

    // Simpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:kategori,nama',
            'keterangan' => 'nullable|string',
        ]);

        Kategori::create($request->only(['nama', 'keterangan']));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan');
    }

    // Form edit kategori
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    // Update kategori
    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $request->validate([
            'nama' => 'required|unique:kategori,nama,' . $kategori->id,
            'keterangan' => 'nullable|string',
        ]);

        $kategori->update($request->only(['nama', 'keterangan']));

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui');
    }

    // Hapus kategori
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus');
    }
}
