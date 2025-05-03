<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HasilPemeriksaan extends Model
{
    protected $table = 'hasil_pemeriksaan';

    protected $fillable = [
        'id_dokter',
        'tanggal',
        'file',
        'jenis_pemeriksaan',
        'id_pasien'
    ];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }

    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }
}
