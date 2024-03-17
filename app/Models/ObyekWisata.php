<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObyekWisata extends Model
{
    use HasFactory;
    protected $table = 'obyek_wisata';
    protected $fillable = [
        'nama_wisata',
        'deskripsi_wisata',
        'id_kategori_wisata',
        'fasilitas',
        'foto1',
        'foto2',   
        'foto3',   
        'foto4',   
        'foto5',   



    ];

    public function kategoriwisata(){
        return $this->belongsTo(kategoriwisata::class, 'id_kategori_wisata', 'id');
    }

}