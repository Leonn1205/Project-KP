<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatWisata extends Model
{
    use HasFactory;

    protected $table = 'tempat_wisata';
    protected $primaryKey = 'id_wisata';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'nama_wisata','kategori_wisata',
        'longitude','latitude',
        'deskripsi','sejarah','narasi'
    ];

    protected $casts = [
        'longitude' => 'float',
        'latitude' => 'float',
    ];

    public function fotos()
    {
        return $this->hasMany(FotoWisata::class, 'id_wisata', 'id_wisata');
    }

    public function jamOperasional()
    {
        return $this->hasMany(JamOperasionalWisata::class, 'id_wisata', 'id_wisata');
    }
}
