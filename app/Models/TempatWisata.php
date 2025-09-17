<?php
// app/Models/TempatWisata.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatWisata extends Model
{
    protected $table = 'tempat_wisata';
    protected $primaryKey = 'id_wisata';
    protected $fillable = [
        'nama_wisata', 'kategori_wisata', 'longitude', 'latitude', 'deskripsi', 'sejarah', 'narasi'
    ];

    public function jamOperasional()
    {
        return $this->hasMany(JamOperasionalWisata::class, 'id_wisata');
    }

    public function foto()
    {
        return $this->hasMany(FotoWisata::class, 'id_wisata');
    }
}
