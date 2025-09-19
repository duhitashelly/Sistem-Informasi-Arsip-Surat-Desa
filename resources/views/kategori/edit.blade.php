@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')
<div class="max-w-2xl mx-auto p-6 bg-white rounded-2xl shadow-lg">
    <!-- Header -->
    <div class="mb-6 border-b pb-3">
        <h4 class="text-2xl font-bold text-gray-800">Edit Kategori Surat</h4>
        <p class="text-sm text-gray-600 mt-1">
            Perbarui data kategori surat pada form ini sesuai kebutuhan.
        </p>
    </div>

    <!-- Pesan sukses -->
    @if(session('success'))
        <div class="mb-5 p-3 rounded-lg bg-green-100 text-green-700 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Nama Kategori -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Nama Kategori</label>
            <input type="text" name="nama" value="{{ $kategori->nama }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Contoh: Undangan"
                required>
        </div>

        <!-- Keterangan -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Keterangan</label>
            <textarea name="keterangan"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Tuliskan keterangan kategori...">{{ $kategori->keterangan }}</textarea>
        </div>

        <!-- Tombol -->
        <div class="flex justify-end pt-6 border-t mt-6">
            <!-- Tombol Kembali -->
            <a href="{{ route('kategori.index') }}"
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
