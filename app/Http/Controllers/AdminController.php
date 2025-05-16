<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\PengajuanAmbulan;
use App\Models\PengajuanBerobat;
use App\Models\ProfileKlinik;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('get')) {
            $pasien = Pasien::all();
            $obat = Obat::all();
            return view('admin.dashboard', compact('pasien', 'obat'));
        }

        if ($request->isMethod('post')) {
            // Validasi data yang diterima dari frontend
            $data = $request->validate([
                'id' => 'required|exists:pasien,id',
                'status' => 'required|string|in:dirawat,sembuh,operasi,kritis'
            ]);

            // Temukan pasien berdasarkan ID dan perbarui statusnya
            $pasien = Pasien::find($data['id']);
            if ($pasien) {
                $pasien->status = $data['status'];
                $pasien->save();

                // Mengirim respons sebagai JSON
                return response()->json([
                    'message' => 'Status pasien berhasil diperbarui',
                    'status' => $pasien->status
                ]);
            }

            // Jika pasien tidak ditemukan
            return response()->json([
                'message' => 'Pasien tidak ditemukan'
            ], 404);
        }
    }

    public function pasien(Request $request)
    {
        if ($request->isMethod('get')) {
            $pasien = Pasien::all();
            return view('admin.data-pasien', compact('pasien'));
        }
    }

    public function tambahPasien(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.form-tambah-pasien');
        }

        if ($request->isMethod('post')) {
            try {
                $data = $request->validate([
                    'nomor_antrian' => 'required|string|exists:pengajuan_berobat,nomor_antrian',
                ]);
                $pengajuan = PengajuanBerobat::where('nomor_antrian', $data['nomor_antrian'])->first();
                Pasien::create([
                    'nomor_antrian' => $pengajuan->nomor_antrian,
                    'nik' => $pengajuan->nik,
                    'nama' => $pengajuan->nama,
                    'usia' => $pengajuan->usia,
                    'no_telp' => $pengajuan->no_hp,
                    'alamat' => $pengajuan->alamat,
                    'jenis_pelayanan' => $pengajuan->jenis_pelayanan,
                    'id_user' => $pengajuan->id_user
                ]);
                return redirect()->route('admin.tambah-pasien')->with('success', 'Data pasien berhasil ditambahkan');
            } catch (\Throwable $th) {
                return redirect()->route('admin.tambah-pasien')->with('error', 'Data pasien gagal ditambahkan ' . $th->getMessage())->withInput();
            }
        }
    }

    public function editPasien(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $pasien = Pasien::find($id);
            return view('admin.form-edit-pasien', compact('pasien'));
        }

        if ($request->isMethod('post')) {
            try {
                $data = $request->validate([
                    'nama' => 'required|string',
                    'nik' => 'required|string',
                    'no_telp' => 'required|string',
                    'alamat' => 'required|string',
                    'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                    'tempat_lahir' => 'required|string',
                    'tgl_lahir' => 'required|date',
                ]);

                $usia = date('Y') - date('Y', strtotime($data['tgl_lahir']));

                Pasien::where('id', $id)->update([
                    'nama' => $data['nama'],
                    'nik' => $data['nik'],
                    'no_telp' => $data['no_telp'],
                    'alamat' => $data['alamat'],
                    'jenis_kelamin' => $data['jenis_kelamin'],
                    'tempat_lahir' => $data['tempat_lahir'],
                    'tgl_lahir' => $data['tgl_lahir'],
                    'usia' => $usia,
                ]);
                return redirect()->route('admin.edit-pasien', $id)->with('success', 'Data pasien berhasil diubah');
            } catch (\Throwable $th) {
                return redirect()->route('admin.edit-pasien', $id)->with('error', 'Data pasien gagal diubah ' . $th->getMessage());
            }
        }
    }

    public function hapusPasien($id)
    {
        try {
            Pasien::where('id', $id)->delete();
            return redirect()->route('admin.pasien')->with('success', 'Data pasien berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('admin.pasien')->with('error', 'Data pasien gagal dihapus ' . $th->getMessage());
        }
    }

    public function dokter(Request $request)
    {
        if ($request->isMethod('get')) {
            $dokter = Dokter::all();
            return view('admin.data-dokter', compact('dokter'));
        }
    }

    public function tambahDokter(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.form-tambah-dokter');
        }

        if ($request->isMethod('post')) {
            try {
                $data = $request->validate([
                    'nama_dokter' => 'required|string',
                    'nip' => 'required|string|unique:dokter,nip',
                    'spesialis' => 'required|string',
                    'foto_dokter' => 'required|mimes:jpg,jpeg,png|max:2048',
                    'pin' => 'required|numeric|digits:6',
                ]);
                $file = $request->file('foto_dokter');
                $fileName = $file->hashName();
                $file->storeAs('foto-dokter', $fileName, 'public');

                User::create([
                    'name' => $data['nama_dokter'],
                    'username' => $data['nip'],
                    'password' => Hash::make('123'),
                    'role' => 'dokter',
                    'email' => $data['nip'] . '@test.com',
                    'pin' => $data['pin'],
                ]);

                Dokter::create([
                    'nama_dokter' => $data['nama_dokter'],
                    'id_user' => User::where('username', $data['nip'])->first()->id,
                    'nip' => $data['nip'],
                    'spesialis' => $data['spesialis'],
                    'foto_dokter' => $fileName,
                ]);
                return redirect()->route('admin.tambah-dokter')->with('success', 'Data dokter berhasil ditambahkan');
            } catch (\Throwable $th) {
                return redirect()->route('admin.tambah-dokter')->with('error', 'Data dokter gagal ditambahkan ' . $th->getMessage())->withInput();
            }
        }
    }

    public function editDokter(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $dokter = Dokter::find($id);
            return view('admin.form-edit-dokter', compact('dokter'));
        }

        if ($request->isMethod('post')) {
            DB::beginTransaction();
            try {
                $data = $request->validate([
                    'nama_dokter' => 'required|string',
                    'nip' => 'required|string',
                    'spesialis' => 'required|string',
                    'foto_dokter' => 'required|string',
                ]);

                Dokter::where('id', $id)->update([
                    'nama_dokter' => $data['nama_dokter'],
                    'nip' => $data['nip'],
                    'spesialis' => $data['spesialis'],
                    'foto_dokter' => $data['foto_dokter'],
                ]);

                DB::commit();
                return redirect()->route('admin.edit-dokter', $id)->with('success', 'Data dokter berhasil diubah');
            } catch (\Throwable $th) {
                DB::rollBack();
                return redirect()->route('admin.edit-dokter', $id)->with('error', 'Data dokter gagal diubah ' . $th->getMessage());
            }
        }
    }

    public function hapusDokter($id)
    {
        try {
            User::where('id', Dokter::where('id', $id)->first()->id_user)->delete();
            Dokter::where('id', $id)->delete();
            return redirect()->route('admin.dokter')->with('success', 'Data dokter berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('admin.dokter')->with('error', 'Data dokter gagal dihapus ' . $th->getMessage());
        }
    }

    public function obat(Request $request)
    {
        if ($request->isMethod('get')) {
            $obat = Obat::all();
            return view('admin.data-obat', compact('obat'));
        }
    }

    public function tambahObat(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.form-tambah-obat');
        }

        if ($request->isMethod('post')) {
            try {
                $data = $request->validate([
                    'nama_obat' => 'required|string',
                    'stok' => 'required|numeric',
                    'jenis' => 'required|string',
                ]);

                Obat::create([
                    'nama_obat' => $data['nama_obat'],
                    'stok' => $data['stok'],
                    'jenis' => $data['jenis'],
                ]);
                return redirect()->route('admin.tambah-obat')->with('success', 'Data obat berhasil ditambahkan');
            } catch (\Throwable $th) {
                return redirect()->route('admin.tambah-obat')->with('error', 'Data obat gagal ditambahkan ' . $th->getMessage())->withInput();
            }
        }
    }

    public function editObat(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $obat = Obat::find($id);
            return view('admin.form-edit-obat', compact('obat'));
        }

        if ($request->isMethod('post')) {
            try {
                $data = $request->validate([
                    'nama' => 'required|string',
                    'nik' => 'required|string',
                    'no_telp' => 'required|string',
                    'alamat' => 'required|string',
                    'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
                    'tempat_lahir' => 'required|string',
                    'tgl_lahir' => 'required|date',
                ]);

                $usia = date('Y') - date('Y', strtotime($data['tgl_lahir']));

                Obat::where('id', $id)->update([
                    'nama' => $data['nama'],
                    'nik' => $data['nik'],
                    'no_telp' => $data['no_telp'],
                    'alamat' => $data['alamat'],
                    'jenis_kelamin' => $data['jenis_kelamin'],
                    'tempat_lahir' => $data['tempat_lahir'],
                    'tgl_lahir' => $data['tgl_lahir'],
                    'usia' => $usia,
                ]);
                return redirect()->route('admin.edit-obat', $id)->with('success', 'Data obat berhasil diubah');
            } catch (\Throwable $th) {
                return redirect()->route('admin.edit-obat', $id)->with('error', 'Data obat gagal diubah ' . $th->getMessage());
            }
        }
    }

    public function hapusObat($id)
    {
        try {
            Obat::where('id', $id)->delete();
            return redirect()->route('admin.obat')->with('success', 'Data obat berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('admin.obat')->with('error', 'Data obat gagal dihapus ' . $th->getMessage());
        }
    }

    public function jadwalDokter(Request $request)
    {
        if ($request->isMethod('get')) {
            $jadwal = JadwalDokter::with('dokter')->get();
            // $dokter = Dokter::all();
            return view('admin.jadwal-dokter', compact('jadwal'));
        }
    }

    public function tambahJadwalDokter(Request $request)
    {
        if ($request->isMethod('get')) {
            $dokter = Dokter::all();
            return view('admin.form-tambah-jadwal-dokter', compact('dokter'));
        }

        if ($request->isMethod('post')) {
            try {
                $data = $request->validate([
                    'id_dokter' => 'required|exists:dokter,id',
                    'id_hari' => 'required|in:1,2,3,4,5,6,7',
                    'waktu_mulai' => 'required|date_format:H:i',
                    'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
                ]);

                JadwalDokter::create([
                    'id_dokter' => $data['id_dokter'],
                    'id_hari' => $data['id_hari'],
                    'waktu_mulai' => $data['waktu_mulai'],
                    'waktu_selesai' => $data['waktu_selesai'],
                ]);
                return redirect()->route('admin.jadwal-dokter')->with('success', 'Data jadwal dokter berhasil ditambahkan');
            } catch (\Throwable $th) {
                return redirect()->route('admin.jadwal-dokter')->with('error', 'Data jadwal dokter gagal ditambahkan ' . $th->getMessage())->withInput();
            }
        }
    }

    public function editJadwalDokter(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $jadwal = JadwalDokter::find($id);
            $dokter = Dokter::all();
            return view('admin.form-edit-jadwal-dokter', compact('jadwal', 'dokter'));
        }

        if ($request->isMethod('post')) {
            try {
                $data = $request->validate([
                    'id_dokter' => 'required|exists:dokter,id',
                    'id_hari' => 'required|in:1,2,3,4,5,6,7',
                    'waktu_mulai' => 'required|date_format:H:i',
                    'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
                ]);

                JadwalDokter::where('id', $id)->update([
                    'id_dokter' => $data['id_dokter'],
                    'id_hari' => $data['id_hari'],
                    'waktu_mulai' => $data['waktu_mulai'],
                    'waktu_selesai' => $data['waktu_selesai'],
                ]);
                return redirect()->route('admin.jadwal-dokter')->with('success', 'Data jadwal dokter berhasil diubah');
            } catch (\Throwable $th) {
                return redirect()->route('admin.jadwal-dokter')->with('error', 'Data jadwal dokter gagal diubah ' . $th->getMessage());
            }
        }
    }

    public function hapusJadwalDokter($id)
    {
        try {
            JadwalDokter::where('id', $id)->delete();
            return redirect()->route('admin.jadwal-dokter')->with('success', 'Data jadwal dokter berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('admin.jadwal-dokter')->with('error', 'Data jadwal dokter gagal dihapus ' . $th->getMessage());
        }
    }

    public function pengajuanAmbulans(Request $request)
    {
        if ($request->isMethod('get')) {
            $pengajuan = PengajuanAmbulan::all();
            return view('admin.pengajuan-ambulans', compact('pengajuan'));
        }

        if ($request->isMethod('post')) {
            // Validasi data yang diterima dari frontend
            $data = $request->validate([
                'id' => 'required|exists:pasien,id',
                'status' => 'required|string|in:Diprosess,Ditolak,Berjalan,Selesai'
            ]);

            // Temukan pasien berdasarkan ID dan perbarui statusnya
            $pengajuan = PengajuanAmbulan::find($data['id']);
            if ($pengajuan) {
                $pengajuan->status = $data['status'];
                $pengajuan->save();

                // Mengirim respons sebagai JSON
                return response()->json([
                    'message' => 'Status pengajuan berhasil diperbarui',
                    'status' => $pengajuan->status
                ]);
            }

            // Jika pasien tidak ditemukan
            return response()->json([
                'message' => 'Pengajuan tidak ditemukan'
            ], 404);
        }
    }

    public function tambahPengajuanAmbulans(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.form-tambah-pengajuan-ambulans');
        }

        if ($request->isMethod('post')) {
            try {
                $data = $request->validate([
                    'nama_pasien' => 'required|string|max:50',
                    'alamat' => 'required|string',
                    'no_hp' => 'required|numeric',
                    'tanggal' => 'required|date',
                    'waktu' => 'required|date_format:H:i',
                    'jenis_keperluan' => 'required|in:Darurat,Kontrol Medis,Lainnya',
                    'status' => 'required|in:Diproses,Berjalan,Selesai,Ditolak',
                ]);
                $data['id_user'] = Auth::user()->id;

                PengajuanAmbulan::create($data);

                return redirect()->route('admin.ambulans')->with('success', 'Data pengajuan ambulans berhasil ditambahkan');
            } catch (\Throwable $th) {
                return redirect()->route('admin.ambulans')->with('error', 'Data pengajuan ambulans gagal ditambahkan ' . $th->getMessage())->withInput();
            }
        }
    }

    public function editPengajuanAmbulans(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $pengajuan = PengajuanAmbulan::find($id);
            return view('admin.form-edit-pengajuan-ambulans', compact('pengajuan'));
        }

        if ($request->isMethod('post')) {
            try {
                $data = $request->validate([
                    'nama_pasien' => 'required|string|max:50',
                    'alamat' => 'required|string',
                    'no_hp' => 'required|numeric',
                    'tanggal' => 'required|date',
                    'waktu' => 'required|date_format:H:i',
                    'jenis_keperluan' => 'required|in:Darurat,Kontrol Medis,Lainnya',
                    'status' => 'required|in:Diproses,Berjalan,Selesai,Ditolak',
                ]);

                PengajuanAmbulan::where('id', $id)->update($data);
                return redirect()->route('admin.ambulans')->with('success', 'Data pengajuan berhasil diubah');
            } catch (\Throwable $th) {
                return redirect()->route('admin.ambulans')->with('error', 'Data pengajuan gagal diubah ' . $th->getMessage());
            }
        }
    }

    public function hapusPengajuanAmbulans($id)
    {
        try {
            PengajuanAmbulan::where('id', $id)->delete();
            return redirect()->route('admin.ambulans')->with('success', 'Data pengajuan ambulans berhasil dihapus');
        } catch (\Throwable $th) {
            return redirect()->route('admin.ambulans')->with('error', 'Data pengajuan ambulans gagal dihapus ' . $th->getMessage());
        }
    }

    public function profil(Request $request)
    {
        if ($request->isMethod('get')) {

            $profile = ProfileKlinik::firstOrFail();
            return view('admin.profil-admin', compact('profile'));
        }

        if ($request->isMethod('post')) {
            try {
                $data = $request->validate([
                    'nama_klinik' => 'required|string',
                    'alamat' => 'required|string',
                    'no_telp' => 'required|numeric',
                    'email' => 'required|email',
                    'deskripsi' => 'required|string',
                ]);

                ProfileKlinik::firstOrFail()->update($data);
                return redirect()->route('admin.profil')->with('success', 'Data profil berhasil diubah');
            } catch (\Throwable $th) {
                return redirect()->route('admin.profil')->with('error', 'Data profil gagal diubah ' . $th->getMessage());
            }
        }
    }
}
