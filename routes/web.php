<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;

// Kalau buka root (/) langsung redirect ke arsip.index
Route::get('/', function () {
    return redirect()->route('arsip.index');
});

Route::resource('arsip', ArsipController::class);
Route::get('/arsip/{id}/download', [ArsipController::class, 'download'])
    ->name('arsip.download');

Route::resource('kategori', KategoriController::class);

// About
Route::get('/about', [AboutController::class, 'show'])->name('about.show');
