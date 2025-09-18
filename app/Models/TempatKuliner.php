<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatKuliner extends Model
{
    use HasFactory;
    protected $table = 'tempat_kuliner';
    protected $primaryKey = 'id_kuliner';
    protected $fillable = [
        'nama_usaha','tahun_berdiri','nama_pemilik','status_legalitas','lokasi_lengkap','bentuk_kepemilikan',
        'kategori_utama','menu_unggulan','bahan_baku','jenis_menu',
        'bentuk_fisik','status_bangunan','fasilitas',
        'apd','prosedur_kebersihan','sumber_bahan_dasar','pengelolaan_limbah','ventilasi','pelatihan_k3',
        'sertifikasi','kepatuhan_zonasi','kepatuhan_operasional','kepatuhan_pajak','program_pemerintah',
        'rata_pelanggan','profil_pelanggan','metode_transaksi',
        'longitude','latitude'
    ];

    protected $casts = [
        'jenis_menu' => 'array',
        'sertifikasi' => 'array',
        'program_pemerintah' => 'array',
        'profil_pelanggan' => 'array',
        'metode_transaksi' => 'array',
    ];

    public function foto()
    {
        return $this->hasMany(FotoKuliner::class, 'id_kuliner');
    }

    public function jamOperasional()
    {
        return $this->hasMany(JamOperasionalKuliner::class, 'id_kuliner');
    }
}
