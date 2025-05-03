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
        Schema::create('resep_obat', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pasien');
            $table->integer('id_dokter');
            $table->text('deskripsi_obat');
            $table->text('catatan')->nullable();
            $table->decimal('total_harga', 10, 2);
            $table->string('bukti_pembayaran')->nullable();
            $table->string('file_resep')->nullable();
            $table->enum('jenis_pembayaran', ['tunai', 'transfer'])->nullable();
            $table->enum('tahap', ['Resep', 'Bayar', 'Selesai'])->default('Resep');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_obat');
    }
};
