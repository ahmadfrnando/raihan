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
    
    // pasien
    Route::match(['get', 'post'], '/admin/pasien', [AdminController::class, 'pasien'])->name('admin.pasien');
    Route::match(['get', 'post'], '/admin/tambah-pasien', [AdminController::class, 'tambahPasien'])->name('admin.tambah-pasien');
    Route::match(['get', 'post'], '/admin/edit-pasien/{id}', [AdminController::class, 'editPasien'])->name('admin.edit-pasien');
    Route::get('/admin/hapus-pasien/{id}', [AdminController::class, 'hapusPasien'])->name('admin.hapus-pasien');
    
    //obat
    Route::match(['get', 'post'], '/admin/obat', [AdminController::class, 'obat'])->name('admin.obat');
    Route::match(['get', 'post'], '/admin/tambah-obat', [AdminController::class, 'tambahObat'])->name('admin.tambah-obat');
    Route::match(['get', 'post'], '/admin/edit-obat/{id}', [AdminController::class, 'editObat'])->name('admin.edit-obat');
    Route::get('/admin/hapus-obat/{id}', [AdminController::class, 'hapusObat'])->name('admin.hapus-obat');

    //dokter
    Route::match(['get', 'post'], '/admin/dokter', [AdminController::class, 'dokter'])->name('admin.dokter');
    Route::match(['get', 'post'], '/admin/tambah-dokter', [AdminController::class, 'tambahDokter'])->name('admin.tambah-dokter');
    Route::match(['get', 'post'], '/admin/edit-dokter/{id}', [AdminController::class, 'editDokter'])->name('admin.edit-dokter');
    Route::get('/admin/hapus-dokter/{id}', [AdminController::class, 'hapusdokter'])->name('admin.hapus-dokter');

    //jadwal dokter
    Route::match(['get', 'post'], '/admin/jadwal-dokter', [AdminController::class, 'jadwalDokter'])->name('admin.jadwal-dokter');
    Route::match(['get', 'post'], '/admin/tambah-jadwal-dokter', [AdminController::class, 'tambahJadwalDokter'])->name('admin.tambah-jadwal-dokter');
    Route::match(['get', 'post'], '/admin/edit-jadwal-dokter/{id}', [AdminController::class, 'editJadwalDokter'])->name('admin.edit-jadwal-dokter');
    Route::get('/admin/hapus-jadwal-dokter/{id}', [AdminController::class, 'hapusJadwalDokter'])->name('admin.hapus-jadwal-dokter');
    
    //pengajuan ambulance
    Route::match(['get', 'post'], '/admin/ambulans', [AdminController::class, 'PengajuanAmbulans'])->name('admin.ambulans');
    Route::match(['get', 'post'], '/admin/tambah-pengajuan-ambulans', [AdminController::class, 'tambahPengajuanAmbulans'])->name('admin.tambah-pengajuan-ambulans');
    Route::match(['get', 'post'], '/admin/edit-pengajuan-ambulans/{id}', [AdminController::class, 'editPengajuanAmbulans'])->name('admin.edit-pengajuan-ambulans');
    Route::get('/admin/hapus-pengajuan-ambulans/{id}', [AdminController::class, 'hapusPengajuanAmbulans'])->name('admin.hapus-pengajuan-ambulans');

    // Route::match(['get', 'post'], '/admin/ambulans', [AdminController::class, 'ambulans'])->name('admin.ambulans');
    Route::match(['get', 'post'], '/admin/profil', [AdminController::class, 'profil'])->name('admin.profil');
});
