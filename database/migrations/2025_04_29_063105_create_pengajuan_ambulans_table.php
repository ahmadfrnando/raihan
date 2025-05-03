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
        Schema::create('pengajuan_ambulans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->string('nama_pasien');
            $table->string('no_hp');
            $table->text('alamat');
            $table->date('tanggal');
            $table->time('waktu');
            $table->enum('jenis_keperluan', ['Darurat', 'Kontrol Medis', 'Lainnya']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_ambulans');
    }
};
