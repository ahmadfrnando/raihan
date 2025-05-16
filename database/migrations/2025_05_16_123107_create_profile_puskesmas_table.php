<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profile_klinik', function (Blueprint $table) {
            $table->id();
            $table->string('nama_klinik');
            $table->text('alamat');
            $table->string('no_telp');
            $table->string('email');
            $table->text('deskripsi');
            $table->timestamps();
        });

        $data = [
            [
                'nama_klinik' => 'Puskesmas Bubulak',
                'alamat' => 'Jl. Raya Bubulak No. 123, Bubulak, Kec. Bojong Gede, Kab. Bogor, Jawa Barat 16923',
                'no_telp' => '0251 8621234',
                'email' => 'puskesmasbubulak@gmail.com',
                'deskripsi' => 'Puskesmas Bubulak adalah puskesmas yang berada di wilayah Kecamatan Bojong Gede, Kabupaten Bogor, Provinsi Jawa Barat. Puskesmas ini menyediakan berbagai macam fasilitas kesehatan seperti rawat jalan, rawat inap, dan lain-lain.'
            ],
        ];

        DB::table('profile_klinik')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_klinik');
    }
};
