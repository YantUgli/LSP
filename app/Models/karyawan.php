<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $fillable = [
       
        'nama_karyawan',
        'alamat',
        'no_hp',
        'jabatan',
        'id_user'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}