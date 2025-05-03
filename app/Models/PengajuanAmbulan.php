<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanAmbulan extends Model
{
    protected $table = 'pengajuan_ambulans';

    protected $fillable = [
        'id_user',
        'nama_pasien',
        'no_hp',
        'alamat',
        'tanggal',
        'waktu',
        'jenis_keperluan',
    ];
}
