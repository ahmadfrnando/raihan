<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengajuan_berobat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_antrian');
            $table->integer('id_user');
            $table->string('nama');
            $table->string('nik');
            $table->integer('usia');
            $table->string('no_hp');
            $table->text('alamat');
            $table->enum('jenis_pelayanan', ['Pelayanan Umum', 'Pelayanan dengan Kartu KIS/BPJS']);
            $table->string('file')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_berobat');
    }
};
