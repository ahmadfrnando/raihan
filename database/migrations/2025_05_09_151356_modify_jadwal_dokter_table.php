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
        Schema::dropIfExists('jadwal_dokter');

        Schema::create('jadwal_dokter', function (Blueprint $table) {
            $table->id();
            $table->integer('id_dokter');
            $table->integer('id_hari');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->boolean('is_hadir')->default(false);
            $table->date('waktu_absensi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_dokter');
    }
};
