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
        Schema::table('jadwal_dokter', function (Blueprint $table) {
            $table->integer('id_dokter');
            $table->boolean('is_hadir')->default(false);
            $table->date('waktu_absensi')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('pin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_dokter', function (Blueprint $table) {
            $table->dropColumn('id_dokter');
            $table->dropColumn('is_hadir');
            $table->dropColumn('waktu_absensi');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('pin');
        });
    }
};
