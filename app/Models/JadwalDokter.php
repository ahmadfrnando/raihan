<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    protected $table = 'jadwal_dokter';

    protected $fillable = [
        'id',
        'nama_dlis',
        'id_harokter',
        'spesiai',
        'waktu_mulai',
        'waktu_selesai',
    ];
}
