<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use Illuminate\Http\Request;

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
            return view('admin.data-pasien');
        }
    }
    public function obat(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.data-obat');
        }
    }
    public function dokter(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.data-pasien');
        }
    }
    public function jadwalDokter(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.data-pasien');
        }
    }
    public function ambulans(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.data-pasien');
        }
    }
    public function profil(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.data-pasien');
        }
    }
}
