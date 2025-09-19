@extends('layouts.app')

@section('title', 'Arsip Surat')

@section('content')

<div class="container mx-auto p-6">
    <div class="bg-white shadow-lg rounded-2xl overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b bg-gradient-to-r from-indigo-500 to-blue-600 text-white">
            <h3 class="text-lg font-semibold">Arsip Surat</h3>
        </div>

        <!-- Search -->
        <div class="px-6 py-4 bg-gray-50 border-b">
            <form action="{{ route('arsip.index') }}" method="GET" class="flex w-full max-w-lg items-center gap-4">
                <input type="text" name="search" id="searchInput"
                    value="{{ request('search') }}"
                    placeholder="Cari judul surat..."
                    class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                <!-- Tombol Cari -->
                <button type="submit" 
                    class="px-4 py-2 text-sm font-semibold text-white rounded-lg shadow transition duration-200"
                    style="background-color:#3b82f6;"
                    onmouseover="this.style.backgroundColor='#2563eb';"
                    onmouseout="this.style.backgroundColor='#3b82f6';">
                    Cari
                </button>

                <!-- Tombol Clear -->
                @if(request('search'))
                <button type="button" id="clearSearch"
                    class="px-5 py-2 text-sm font-semibold text-white rounded-lg shadow transition duration-200"
                    style="background-color:#ef4444;"
                    onmouseover="this.style.backgroundColor='#dc2626';"
                    onmouseout="this.style.backgroundColor='#ef4444';">
                    ✕
                </button>
                @endif
            </form>
        </div>

        <!-- Tabel -->
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 font-semibold">Nomor Surat</th>
                        <th class="px-6 py-3 font-semibold">Kategori</th>
                        <th class="px-6 py-3 font-semibold">Judul</th>
                        <th class="px-6 py-3 font-semibold">Waktu Pengarsipan</th>
                        <th class="px-6 py-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($arsip as $item)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">{{ $item->nomor_surat }}</td>
                        <td class="px-6 py-4">{{ $item->kategori->nama }}</td>
                        <td class="px-6 py-4">{{ $item->judul }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $item->waktu_pengarsipan }}</td>
                        <td class="px-6 py-4">
                            <div class="flex justify-center">
                                <!-- Tombol Hapus (buka modal) -->
                                <button type="button" 
                                    onclick="openDeleteModal({{ $item->id }})"
                                    class="px-4 py-2 text-sm font-semibold text-white rounded-lg shadow transition duration-200" 
                                    style="background-color:#ef4444; margin-right:10px;"
                                    onmouseover="this.style.backgroundColor='#dc2626';"
                                    onmouseout="this.style.backgroundColor='#ef4444';">
                                    Hapus
                                </button>

                                <!-- Tombol Unduh -->
                                <a href="{{ route('arsip.download', $item->id) }}" 
                                class="px-4 py-2 text-sm font-semibold text-white rounded-lg shadow transition duration-200" 
                                style="background-color:#22c55e; margin-right:10px;"
                                onmouseover="this.style.backgroundColor='#16a34a';"
                                onmouseout="this.style.backgroundColor='#22c55e';">
                                    Unduh
                                </a>

                                <!-- Tombol Lihat -->
                                <a href="{{ route('arsip.show', $item->id) }}" 
                                class="px-4 py-2 text-sm font-semibold text-white rounded-lg shadow transition duration-200" 
                                style="background-color:#3b82f6;"
                                onmouseover="this.style.backgroundColor='#2563eb';"
                                onmouseout="this.style.backgroundColor='#3b82f6';">
                                    Lihat
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            Belum ada data arsip
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="px-6 py-4">
    {{ $arsip->links('vendor.pagination.custom') }}
</div>
<!-- Tombol Arsipkan Surat -->
<div class="px-6 py-4">
    <a href="{{ route('arsip.create') }}" 
       class="px-5 py-2 text-sm font-semibold text-white rounded-lg shadow transition duration-200"
       style="background-color:#3b82f6;"
       onmouseover="this.style.backgroundColor='#2563eb';"
       onmouseout="this.style.backgroundColor='#3b82f6';">
        Arsipkan Surat
    </a>
</div>

<!-- Modal Konfirmasi Hapus -->
<div id="deleteModal" class="hidden">
    <div class="modal-overlay">
        <div class="modal-box animate-fadeIn">
            <h3 class="text-xl font-bold text-red-600 mb-3">Konfirmasi</h3>
            <p class="mb-6 text-gray-700">Apakah Anda yakin ingin menghapus arsip surat ini?</p>
            <div class="flex justify-center gap-6">
                <button type="button" onclick="closeDeleteModal()" 
                    class="px-4 py-2 rounded-lg font-semibold border border-gray-300 hover:bg-gray-100 transition">
                    Batal
                </button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                        class="px-4 py-2 rounded-lg font-semibold text-white shadow transition"
                        style="background-color:#ef4444;margin-left:10px;"
                        onmouseover="this.style.backgroundColor='#dc2626';"
                        onmouseout="this.style.backgroundColor='#ef4444';">
                        Ya, Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<style>
.modal-overlay {
    position: fixed;
    inset: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: rgba(0,0,0,0.4);
    backdrop-filter: blur(2px);
    z-index: 50;
}
.modal-box {
    background: #fff;
    border-radius: 1rem;
    padding: 1.5rem;
    width: 360px;
    text-align: center;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px) scale(0.95); }
    to { opacity: 1; transform: translateY(0) scale(1); }
}
.animate-fadeIn {
    animation: fadeIn 0.25s ease-out;
}
</style>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const clearBtn = document.getElementById("clearSearch");
        const searchInput = document.getElementById("searchInput");

        if (clearBtn) {
            clearBtn.addEventListener("click", function () {
                searchInput.value = "";
                searchInput.form.submit();
            });
        }
    });

    function openDeleteModal(id) {
        const modal = document.getElementById("deleteModal");
        const form = document.getElementById("deleteForm");
        form.action = "/arsip/" + id; // route destroy
        modal.classList.remove("hidden");
    }

    function closeDeleteModal() {
        document.getElementById("deleteModal").classList.add("hidden");
    }
</script>
@endsection
