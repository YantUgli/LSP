<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';
    protected $fillable = [
       
        'nama_lengkap',
        'alamat',
        'no_hp',
        'foto',
        'id_user'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

}