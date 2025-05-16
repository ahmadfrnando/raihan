<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileKlinik extends Model
{
    protected $table = 'profile_klinik';

    protected $fillable = [
        'nama_klinik',
        'alamat',
        'no_telp',
        'email',
        'deskripsi',
    ];
}
