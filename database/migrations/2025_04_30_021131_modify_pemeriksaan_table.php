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
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien');
            $table->string('nama_pasien');
            $table->integer('usia_pasien');
            $table->integer('id_dokter');
            $table->string('nama_dokter');
            $table->text('diagnosa');
            $table->date('tanggal_pemeriksaan');
            $table->string('file_pemeriksaan');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan');
    }
};
