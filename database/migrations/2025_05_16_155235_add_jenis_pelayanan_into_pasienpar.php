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
        Schema::table('pasien', function (Blueprint $table) {
            $table->dropColumn('tgl_lahir');
            $table->dropColumn('tempat_lahir');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        throw new \Exception('Tidak bisa di rollback');
    }
};
