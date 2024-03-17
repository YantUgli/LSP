<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasFormatRupiah;

class Paketwisata extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    protected $table = 'paket_wisata';
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'fasilitas',
        'harga_per_pack',
        'diskon',
        'foto1',
        'foto2',   
        'foto3',   
        'foto4',   
        'foto5',   



    ];

}