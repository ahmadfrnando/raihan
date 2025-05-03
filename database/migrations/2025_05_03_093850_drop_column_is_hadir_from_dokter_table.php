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
        Schema::table('dokter', function (Blueprint $table) {
            $table->dropColumn('is_hadir');
            $table->dropColumn('waktu_absensi');
            $table->dropColumn('pin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dokter', function (Blueprint $table) {
            $table->boolean('is_hadir')->default(false);
            $table->datetime('waktu_absensi')->nullable();
            $table->integer('pin');
        });
    }
};
