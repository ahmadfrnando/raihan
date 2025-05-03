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
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->integer('stok');
            $table->string('jenis');
            $table->timestamps();
        });

        Schema::create('obat_keluar', function (Blueprint $table) {
            $table->id();
            $table->integer('id_obat');
            $table->integer('stok_keluar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
        Schema::dropIfExists('obat_keluar');
    }
};
