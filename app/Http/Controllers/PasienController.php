<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\HasilPemeriksaan;
use App\Models\JadwalDokter;
use App\Models\Pemeriksaan;
use App\Models\PengajuanAmbulan;
use App\Models\PengajuanBerobat;
use App\Models\PengambilanObat;
use App\Models\ResepObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{

    public function index()
    {
        return view('pasien.dashboard');
    }

    public function antrian()
    {   
        $antrian = PengajuanBerobat::where('id_user', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(2);
        return view('pasien.antrian', compact('antrian'));
    }

    public function berobat(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('pasien.berobat', compact('pengajuan'));
        }

        try {
            $validator = $request->validate([
                'nama' => 'required|string|max:50',
                'nik' => 'required|string|numeric',
                'usia' => 'required|integer|min:1|max:100',
                'no_hp' => 'required|string|max:15',
                'alamat' => 'required',
                'jenis_pelayanan' => 'required|in:Pelayanan Umum,Pelayanan dengan Kartu KIS/BPJS',
                'file' => 'nullable|file|mimes:jpg,png,jpeg|max:2048'
            ]);
            $nomor_antrian = 'A' . str_pad((string) (PasienController::getNomorAntrianTerakhir() + 1), 4, '0', STR_PAD_LEFT);
            $id_user = Auth::user()->id;
            PengajuanBerobat::create([
                'nomor_antrian' => $nomor_antrian,
                'nama' => $validator['nama'],
                'nik' => $validator['nik'],
                'usia' => $validator['usia'],
                'no_hp' => $validator['no_hp'],
                'alamat' => $validator['alamat'],
                'jenis_pelayanan' => $validator['jenis_pelayanan'],
                'file' => $request->file('file') ? $request->file('file')->store('kartu-kis-bpjs', 'public') : null,
                'id_user' => $id_user
            ]);
            return redirect()->route('pasien.berobat')->with(['success' => "Pengajuan berobat berhasil. Nomor antrian Anda: $nomor_antrian"]);
        } catch (\Throwable $th) {
            return back()->with(['error' => $th->getMessage()])->withInput();
        }
    }

    public function getNomorAntrianTerakhir()
    {
        $antrian_terakhir = PengajuanBerobat::orderByDesc('created_at')->first();
        return $antrian_terakhir ? (int) substr($antrian_terakhir->nomor_antrian, 1) : 0;
    }

    public function ambilObat(Request $request, $id)
    {
        if ($request->isMethod('get')) {
            $obat = ResepObat::where('id', $id)->first();
            return view('pasien.ambil-obat', compact('obat'));
        }

        try {
            $validator = $request->validate([
                'jenis_pembayaran' => 'required|in:tunai,transfer',
                'bukti_pembayaran' => 'nullable|file|mimes:jpg,png,jpeg|max:2048'
            ]);

            ResepObat::where('id', $id)->update([
                'jenis_pembayaran' => $validator['jenis_pembayaran'],
                'bukti_pembayaran' => $request->file('bukti_pembayaran') ? $request->file('bukti_pembayaran')->store('bukti-pembayaran', 'public') : null,
                'tahap' => 'Bayar'
            ]);
            return redirect()->route('pasien.ambil-obat', $id)->with(['success' => 'Pengambilan obat berhasil.']);
        } catch (\Throwable $th) {
            return back()->with(['error' => $th->getMessage()]);;
        }
    }

    public function pengajuanAmbulans(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('pasien.pengajuan-ambulans');
        }

        try {
            $validator = $request->validate([
                'nama_pasien' => 'required|string|max:50',
                'no_hp' => 'required|string|max:15',
                'alamat' => 'required',
                'tanggal' => 'required|date',
                'waktu' => 'required|date_format:H:i',
                'jenis_keperluan' => 'required|in:Darurat,Kontrol Medis,Lainnya',
            ]);

            $id_user = Auth::user()->id;
            PengajuanAmbulan::create([
                'nama_pasien' => $validator['nama_pasien'],
                'no_hp' => $validator['no_hp'],
                'alamat' => $validator['alamat'],
                'tanggal' => $validator['tanggal'],
                'waktu' => $validator['waktu'],
                'jenis_keperluan' => $validator['jenis_keperluan'],
                'id_user' => $id_user
            ]);
            return redirect()->route('pasien.pengajuan-ambulans')->with(['success' => 'Pengajuan berhasil dikirim. Mohon tunggu konfirmasi.']);
        } catch (\Throwable $th) {
            return back()->with(['error' => $th->getMessage()]);;
        }
    }

    public function hasilPemeriksaan()
    {   
        // $hasil = HasilPemeriksaan::where('id_pasien', Auth::user()->id)->where('id_user')->get();
        $hasil = Pemeriksaan::where('id_user', Auth::user()->id)->get();
        return view('pasien.hasil-pemeriksaan', compact('hasil'));
    }

    public function daftarHadirDokter()
    {   
        $hariIni = date('N'); // 1 = Senin, 2 = Selasa, dst.
        $jadwalDokter = JadwalDokter::where('id_hari', $hariIni)->get();
        return view('pasien.daftar-hadir-dokter', compact('jadwalDokter'));
    }

    public function daftarResep()
    {   
        $resep = ResepObat::where('id_user', Auth::user()->id)->get();
        return view('pasien.daftar-resep', compact('resep'));
    }
}
