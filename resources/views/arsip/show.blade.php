@extends('layouts.app')

@section('title', 'Detail Arsip Surat')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-2xl shadow-lg">
    <!-- Header -->
    <div class="mb-6 border-b pb-3">
        <h4 class="text-2xl font-bold text-gray-800">Arsip Surat >> Lihat</h4>

        <div class="mt-3 text-sm text-gray-600 space-y-1">
            <div class="flex">
                <span class="font-bold w-32">Nomor</span>
                <span>: {{ $arsip->nomor_surat }}</span>
            </div>
            <div class="flex">
                <span class="font-bold w-32">Kategori</span>
                <span>: {{ $arsip->kategori->nama}}</span>
            </div>
            <div class="flex">
                <span class="font-bold w-32">Judul</span>
                <span>: {{ $arsip->judul }}</span>
            </div>
            <div class="flex">
                <span class="font-bold w-32">Waktu Unggah</span>
                <span>: {{ $arsip->waktu_pengarsipan }}</span>
            </div>
        </div>
    </div>

    <!-- Preview PDF -->
    <div class="mb-6">
        <iframe src="{{ asset('storage/' . $arsip->file_path) }}"
                class="w-full border rounded-lg"
                style="height:500px;"></iframe>
    </div>

    <!-- Tombol -->
    <div class="flex justify-center">
        <!-- Tombol Kembali -->
        <a href="{{ route('arsip.index') }}" 
        class="mx-2 px-5 py-2 text-sm font-semibold text-white rounded-lg shadow transition duration-200"
        style="background-color:#6b7280;"
        onmouseover="this.style.backgroundColor='#4b5563';"
        onmouseout="this.style.backgroundColor='#6b7280';">
            << Kembali
        </a>

        <!-- Tombol Unduh (Save As) -->
        <button onclick="downloadFile()" 
            class="mx-2 px-5 py-2 text-sm font-semibold text-white rounded-lg shadow transition duration-200"
            style="background-color:#22c55e;"
            onmouseover="this.style.backgroundColor='#16a34a';"
            onmouseout="this.style.backgroundColor='#22c55e';">
            Unduh
        </button>

        <!-- Tombol Edit -->
        <a href="{{ route('arsip.edit', $arsip->id) }}" 
        class="mx-2 px-5 py-2 text-sm font-semibold text-white rounded-lg shadow transition duration-200"
        style="background-color:#3b82f6;"
        onmouseover="this.style.backgroundColor='#2563eb';"
        onmouseout="this.style.backgroundColor='#3b82f6';">
            Edit/Ganti File
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function downloadFile() {
        const url = "{{ asset($arsip->file_path) }}";
        const fileName = "{{ $arsip->judul }}.pdf";

        fetch(url)
            .then(response => response.blob())
            .then(blob => {
                const link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = fileName;

                link.click();
                window.URL.revokeObjectURL(link.href);
            });
    }
</script>
@endpush
