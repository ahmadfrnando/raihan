<?php

namespace App\Models;
use Tonysm\RichTextLaravel\Models\Traits\HasRichText;

use Illuminate\Database\Eloquent\Model;

class PengambilanObat extends Model
{
    use HasRichText;
    protected $table = 'pengambilan_obat';

    protected $richTextAttributes = [
        'keterangan',
    ];

    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'deskripsi',
        'total_harga',
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
