<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\JadwalDokter;
use App\Models\Pasien;
use App\Models\Pemeriksaan;
use App\Models\PengajuanBerobat;
use App\Models\ResepObat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    public function index()
    {
        return view('dokter.dashboard');
    }

    public function absensi(Request $request)
    {
        $dokter = Dokter::where('id_user', Auth::user()->id)->first();
        $pin = User::where('id', Auth::user()->id)->first()->pin;
        if ($request->isMethod('get')) {
            $jadwal = JadwalDokter::where('id_dokter', $dokter->id)->first();
            $isHadir = $jadwal->is_hadir;
            if($isHadir === null){
                return back()->with('error', 'Jadwal Dokter Belum Tersedia. Minta admin untuk buatkan jadwal');
            }
            switch ($isHadir) {
                case 0:
                    $status = 'Pulang';
                    break;
                case 1:
                    $status = 'Hadir';
                    break;
                default:
                    $status = 'Belum Absen';
                    break;
            }
            return view('dokter.absensi-dokter', compact('jadwal', 'status', 'isHadir'));
        }
        try {
            $request->validate([
                'pin' => 'required|numeric|digits:6|exists:users,pin',
                'isHadir' => 'required|numeric|between:0,1'
            ]);

            $waktu_absensi = now()->format('Y-m-d');
            if ($request->pin == $pin) {
                JadwalDokter::where('id_dokter', $dokter->id)->update([
                    'is_hadir' => $request->isHadir,
                    'waktu_absensi' => $waktu_absensi
                ]);
                return back()->with('success', 'Anda telah melakukan absensi' . ($request->isHadir == 1 ? ' kehadiran' : ' pulang'));
            }
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function inputResep(Request $request, $id_pasien = null)
    {
        if ($request->isMethod('get')) {
            return view('dokter.input-resep', [
                'id_pasien' => $id_pasien
            ]);
        }
        try {
            $request->validate([
                'deskripsi_obat' => 'required',
                'catatan' => 'nullable',
                'file_resep' => 'nullable|mimes:pdf,jpg,jpeg,png|max:2048',
                'total_harga' => 'required|numeric'
            ]);
            $dokter = Dokter::where('id_user', Auth::user()->id)->first();
            $nomor_antrian = Pasien::where('id', $id_pasien)->first()->nomor_antrian;
            $id_user = PengajuanBerobat::where('nomor_antrian', $nomor_antrian)->first()->id_user;

            $waktu_absensi = now();
            ResepObat::create([
                'id_pasien' => $id_pasien,
                'id_dokter' => $dokter->id,
                'total_harga' => $request->total_harga,
                'deskripsi_obat' => $request->deskripsi_obat,
                'catatan' => $request->catatan,
                'file_resep' => $request->file('file_resep') ? $request->file('file_resep')->store('resep', 'public') : null,
                'id_user' => $id_user
            ]);
            return back()->with('success', 'Anda telah melakukan input resep obat')->withInput();
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function pemeriksaan()
    {
        $pasien = Pasien::all();
        return view('dokter.pemeriksaan', compact('pasien'));
    }

    public function resep()
    {
        $pasien = Pasien::all();
        return view('dokter.resep', compact('pasien'));
    }

    public function inputPemeriksaan(Request $request, $id_pasien = null)
    {
        if ($request->isMethod('get')) {
            $pasien = Pasien::where('id', $id_pasien)->first();
            return view('dokter.input-hasil-pemeriksaan', compact('pasien'));
        }

        try {
            $request->validate([
                'tanggal_pemeriksaan' => 'required|date',
                'diagnosa' => 'required',
                'catatan' => 'nullable',
                'file_pemeriksaan' => 'required|mimes:pdf,doc,docx|max:2048',
            ]);

            $pasien = Pasien::where('id', $id_pasien)->first();
            $dokter = Dokter::where('id_user', Auth::user()->id)->first();
            $usia_pasien = now()->year - date('Y', strtotime($pasien->tgl_lahir));
            $pengajuan = PengajuanBerobat::where('nomor_antrian', $pasien->nomor_antrian)->first();
            $id_user = $pengajuan->id_user;
            $jenis_pelayanan = $pengajuan->jenis_pelayanan;
            Pemeriksaan::create([
                'id_pasien' => $pasien->id,
                'tanggal_pemeriksaan' => $request->tanggal_pemeriksaan,
                'diagnosa' => $request->diagnosa,
                'file_pemeriksaan' => $request->file('file_pemeriksaan')->store('hasil-pemeriksaan', 'public'),
                'id_dokter' => Auth::user()->id,
                'nama_pasien' => $pasien->nama,
                'nama_dokter' => $dokter->nama_dokter,
                'usia_pasien' => $usia_pasien,
                'catatan' => $request->catatan,
                'id_user' => $id_user,
                'jenis_pelayanan' => $jenis_pelayanan
            ]);
            return back()->with('success', 'Pemeriksaan berhasil disimpan');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function laporan()
    {
        $hasilPemeriksaan = Pemeriksaan::all();
        return view('dokter.laporan-hasil-pemeriksaan', compact('hasilPemeriksaan'));
    }
}
