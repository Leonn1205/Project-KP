<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamOperasionalWisata extends Model
{
    use HasFactory;

    protected $table = 'jam_operasional_wisata';
    protected $fillable = ['id_wisata','hari','jam_buka','jam_tutup'];

    public function wisata()
    {
        return $this->belongsTo(TempatWisata::class, 'id_wisata', 'id_wisata');
    }
}
