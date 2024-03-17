<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    use HasFormatRupiah;
    protected $table = 'reservasi';
    protected $fillable = [
       
        'id_pelanggan',
        'id_paket',
        'tgl_reservasi_wisata',
        'harga',
        'jumlah_peserta',
        'diskon',
        'nilai_diskon',
        'total_bayar',
        'file_bukti_tf',
        'status_reservasi_wisata' 



    ];

    public function pelanggan(){
        return $this->belongsTo(pelanggan::class, 'id_pelanggan', 'id');
    }
    public function paketwisata(){
        return $this->belongsTo(paketwisata::class, 'id_paket', 'id');
    }
}