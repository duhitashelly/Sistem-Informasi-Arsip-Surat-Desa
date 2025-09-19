<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    protected $table = 'arsip_surat';
    protected $fillable = [
        'nomor_surat',
        'kategori_id',
        'judul',
        'waktu_pengarsipan',
        'file_path',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
