<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])->name('register');
Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/', [PasienController::class, 'index'])->name('pasien.dashboard');
    Route::match(['get', 'post'], '/berobat', [PasienController::class, 'berobat'])->name('pasien.berobat');
    Route::match(['get', 'post'], '/ambil-obat/{id}', [PasienController::class, 'ambilObat'])->name('pasien.ambil-obat');
    Route::match(['get', 'post'], '/pengajuan-ambulans', [PasienController::class, 'pengajuanAmbulans'])->name('pasien.pengajuan-ambulans');
    Route::get('/hasil-pemeriksaan', [PasienController::class, 'hasilPemeriksaan'])->name('pasien.hasil-pemeriksaan');
    Route::get('/daftar-hadir-dokter', [PasienController::class, 'daftarHadirDokter'])->name('pasien.daftar-hadir-dokter');
    Route::get('/daftar-resep', [PasienController::class, 'daftarResep'])->name('pasien.daftar-resep');
});

Route::middleware(['auth', 'role:dokter'])->group(function () {
    Route::get('/dokter', [DokterController::class, 'index'])->name('dokter.dashboard');
    Route::get('/dokter/pemeriksaan', [DokterController::class, 'pemeriksaan'])->name('dokter.pemeriksaan');
    Route::get('/dokter/resep', [DokterController::class, 'resep'])->name('dokter.resep');
    Route::match(['get', 'post'], '/dokter/absensi', [DokterController::class, 'absensi'])->name('dokter.absensi');
    Route::match(['get', 'post'], '/dokter/input-hasil-pemeriksaan/{id_pasien}', [DokterController::class, 'inputPemeriksaan'])->name('dokter.input-hasil-pemeriksaan');
    Route::get('/dokter/laporan', [DokterController::class, 'laporan'])->name('dokter.laporan');
    Route::match(['get', 'post'], '/dokter/input-resep/{id_pasien}', [DokterController::class, 'inputResep'])->name('dokter.input-resep');
    Route::get('data-ajax-pasien', 'DokterController@dataAjaxPasien');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::match(['get', 'post'], '/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::match(['get', 'post'], '/admin/pasien', [AdminController::class, 'pasien'])->name('admin.pasien');
    Route::match(['get', 'post'], '/admin/obat', [AdminController::class, 'obat'])->name('admin.obat');
    Route::match(['get', 'post'], '/admin/dokter', [AdminController::class, 'dokter'])->name('admin.dokter');
    Route::match(['get', 'post'], '/admin/jadwal-dokter', [AdminController::class, 'jadwalDokter'])->name('admin.jadwal-dokter');
    Route::match(['get', 'post'], '/admin/ambulans', [AdminController::class, 'ambulans'])->name('admin.ambulans');
    Route::match(['get', 'post'], '/admin/pasien', [AdminController::class, 'pasien'])->name('admin.pasien');
    Route::match(['get', 'post'], '/admin/profil', [AdminController::class, 'profil'])->name('admin.profil');
});
