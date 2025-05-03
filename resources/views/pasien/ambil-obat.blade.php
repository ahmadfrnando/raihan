<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengambilan Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background: linear-gradient(135deg, #00bcd4, #0097a7);
            color: white;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .card {
            background: rgba(0, 0, 0, 0.8);
            border-radius: 12px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .btn {
            background-color: #00796b;
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            color: white;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn-kembali {
            background-color: rgb(121, 0, 0);
            border: none;
            border-radius: 50px;
            padding: 12px 25px;
            color: white;
            width: 100%;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s;
        }

        .btn:hover {
            background-color: #004d40;
            transform: scale(1.05);
        }

        .btn:active {
            transform: scale(0.95);
        }

        .qr-code {
            margin: 15px 0;
            text-align: center;
        }

        .qr-code img {
            width: 120px;
            height: 120px;
        }

        .info-item {
            margin-bottom: 10px;
            text-align: left;
        }
    </style>
</head>

<body>
    @if(!$obat)
    <div class="card">
        <h1>Pengambilan Obat</h1>
        <div class="info-item">
            <p>Anda belum ada melakukan pengambilan obat.</p>
            <a href="{{ route('pasien.dashboard') }}" class="btn-back">Kembali</a>
        </div>
    </div>
    @else
    <div class="card">
        <h1>Pengambilan Obat</h1>
        @if (session('success'))
        <div style="background-color:rgb(3, 146, 84); border-radius: 5px; padding: 10px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div style="background-color:rgb(236, 31, 48); border-radius: 5px; padding: 10px; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
        @endif
        <div class="info-item">
            <strong>Nama Pasien:</strong> <span id="namaPasien">{{ $obat->pasien->name ?? '-' }}</span>
            <strong>Nama Dokter:</strong> <span id="namaPasien">{{ $obat->dokter->name ?? '-'}}</span>
        </div>

        <div class="info-item">
            <strong>Daftar Obat:</strong>
            <div id="daftarObat" style="padding-left: 20px;">
                {{ $obat->deskripsi_obat }}
            </div>
        </div>

        <div class="info-item">
            <strong>Total Pembayaran:</strong> {{ 'Rp. ' . number_format($obat->total_harga, 0, ',', '.') }}
        </div>
        @if($obat->jenis_pembayaran !== null)
        <div class="info-item">
            <strong>Metode Pembayaran:</strong> {{ $obat->jenis_pembayaran }}
        </div>
        <div class="info-item">
            <strong>Status:</strong>
            @if($obat->jenis_pembayaran == 'transfer' && $obat->tahap == 'Bayar')
                Menunggu verifikasi admin
            @else
                {{ $obat->tahap }}
            @endif
        </div>
        @else
        <!-- Pilih Metode Pembayaran -->
        <form id="paymentForm" method="POST" action="{{ route('pasien.ambil-obat', $obat->id) }}" enctype="multipart/form-data">
            @csrf
            <input type="number" name="id" value="{{ $obat->id }}" hidden>
            <div class="mb-3">
                <select id="paymentMethod" class="form-select" name="jenis_pembayaran" onchange="togglePaymentDetails()" required>
                    <option value="" selected disabled>Pilih Metode Pembayaran</option>
                    <option value="transfer">Transfer</option>
                    <option value="tunai">Tunai</option>
                </select>
            </div>

            <!-- Transfer Section -->
            <div id="uploadBukti" style="display: none;">
                <p>Upload Bukti Pembayaran:</p>
                <input type="file" class="form-control" name="bukti_pembayaran" id="bukti" accept="image/*">
            </div>
            <div id="trasnferDetails" class="qr-code" style="display: none;">
                <p>Scan QR Code untuk membayar:</p>
                <img src="qris-placeholder.png" alt="QR Code">
            </div>


            <!-- Cash Section -->
            <div id="cashDetails" style="display: none;">
                <p>Silakan siapkan uang tunai sebesar Rp <span id="totalPembayaranCash">70,000</span>.</p>
            </div>

            <button type="submit" class="btn w-100">Lanjutkan</button>
        </form>
        @endif
        <div class="text-center" style="margin-top: 10px;">
            <a href="{{ route('pasien.dashboard') }}"><button class="btn-kembali">Kembali</button></a>
        </div>
    </div>
    @endif

    <script>
        function togglePaymentDetails() {
            const method = document.getElementById('paymentMethod').value;
            const trasnferDetails = document.getElementById('trasnferDetails');
            const cashDetails = document.getElementById('cashDetails');
            const uploadBukti = document.getElementById('uploadBukti');

            uploadBukti.style.display = method === 'transfer' ? 'block' : 'none';
            trasnferDetails.style.display = method === 'transfer' ? 'block' : 'none';
            cashDetails.style.display = method === 'tunai' ? 'block' : 'none';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>