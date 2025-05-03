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
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('pin');
            $table->string('nama_dokter');
            $table->integer('id_user');
            $table->string('spesialis');
            $table->string('foto_dokter')->nullable();
            $table->boolean('is_hadir')->default(0);
            $table->datetime('waktu_absensi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
