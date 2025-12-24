<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $fillable = [
        'nomor_surat',
        'nomor_agenda',
        'perihal',
        'tanggal',
        'pengirim',
        'bagian',
        'keterangan',
        'file_path',
        'jenis'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function scopeMasuk($query)
    {
        return $query->where('jenis', 'masuk');
    }

    public function scopeKeluar($query)
    {
        return $query->where('jenis', 'keluar');
    }
}
