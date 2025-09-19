@extends('layouts.app')
@section('title', 'About')
@section('content')
<style>
    .about-container {
        display: flex;
        align-items: center;   
        gap: 50px;             
        padding-left: 40px;    
        min-height: 300px;     
    }

    .about-title {
        padding-left: 40px; 
    }

    .about-photo {
        width: 160px;
        height: 200px;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 6px 14px rgba(0,0,0,0.1);
        border: 1px solid #e5e7eb;
        flex-shrink: 0;
    }

    .about-photo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .about-bio {
        flex: 4;
        color: #374151;
        font-size: 1rem;
    }

    .about-bio .row {
        display: flex;
        margin-bottom: 12px;
    }

    .about-bio .label {
        font-weight: 600;
        color: #111827;
        width: 120px;
    }
</style>

<div class="px-6">
    <div class="max-w-5xl bg-white rounded-2xl shadow-xl border border-gray-200 p-10 mx-auto">

        <!-- Header -->
        <div class="px-6 py-4 border-b bg-gradient-to-r from-indigo-500 to-blue-600 text-white">
            <h3 class="text-lg font-semibold">About</h3>
        </div>


        <div class="about-container">
            <!-- Foto -->
            <div class="about-photo">
                <img src="{{ asset('template/build/assets/img/profile.jpeg') }}" 
                     alt="Foto Profil">
            </div>

            <!-- Biodata -->
            <div class="about-bio">
                <div class="row">
                    <span class="label">Nama</span>
                    <span>: Duhita Shelly Salanty </span>
                </div>
                <div class="row">
                    <span class="label">Prodi</span>
                    <span>: D3-Manajemen Informatika PSDKU Kediri</span>
                </div>
                <div class="row">
                    <span class="label">NIM</span>
                    <span>: 2331730036 </span>
                </div>
                <div class="row">
                    <span class="label">Tanggal</span>
                    <span>: 19 September 2025 </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
