<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObatKeluar extends Model
{
    protected $table = 'obat_keluar';

    protected $guarded = [];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
