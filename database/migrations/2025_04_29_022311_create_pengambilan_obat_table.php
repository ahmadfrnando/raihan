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
        Schema::create('pengambilan_obat', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien');
            $table->integer('id_dokter');
            $table->longText('deskripsi')->nullable();
            $table->decimal('total_harga', 10, 2);
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('jenis_pembayaran', ['tunai', 'transfer'])->nullable();
            $table->enum('tahap', ['proses', 'selesai'])->default('proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengambilan_obat');
    }
};
