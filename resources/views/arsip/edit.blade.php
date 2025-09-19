@extends('layouts.app')

@section('title', 'Edit Arsip Surat')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-lg">
    <!-- Header -->
    <div class="mb-6 border-b pb-3">
        <h4 class="text-2xl font-bold text-gray-800">Edit Arsip Surat</h4>
        <p class="text-sm text-gray-600 mt-1">
            Perbarui data arsip surat atau ganti file PDF jika diperlukan.
        </p>
    </div>

    <!-- Pesan sukses/error -->
    @if(session('success'))
        <div class="mb-5 p-3 rounded-lg bg-green-100 text-green-700 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form Edit -->
    <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Nomor Surat -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Nomor Surat</label>
            <input type="text" name="nomor_surat" value="{{ old('nomor_surat', $arsip->nomor_surat) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <!-- Kategori -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Kategori</label>
            <select name="kategori_id"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $k)
                    <option value="{{ $k->id }}" {{ $arsip->kategori_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama }}
                    </option>
                @endforeach
            </select>
        </div>


        <!-- Judul -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Judul</label>
            <input type="text" name="judul" value="{{ old('judul', $arsip->judul) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <!-- File Surat -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">File Surat (PDF)</label>
            <p class="text-xs text-gray-500 mb-2">File saat ini: <b>{{ basename($arsip->file_path) }}</b></p>
            <input type="file" name="file_path" accept="application/pdf"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500">
            <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti file.</p>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end pt-6 border-t mt-6">
            <!-- Tombol Kembali -->
            <a href="{{ route('arsip.show', $arsip->id) }}"
                class="px-5 py-2 text-sm font-semibold text-white rounded-lg shadow transition duration-200"
                style="background-color:#6b7280; margin-right:20px;"
                onmouseover="this.style.backgroundColor='#4b5563';"
                onmouseout="this.style.backgroundColor='#6b7280';">
                ← Kembali
            </a>

            <!-- Tombol Update -->
            <button type="submit"
                class="px-5 py-2 text-sm font-semibold text-white rounded-lg shadow transition duration-200"
                style="background-color:#3b82f6;"
                onmouseover="this.style.backgroundColor='#2563eb';"
                onmouseout="this.style.backgroundColor='#3b82f6';">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
