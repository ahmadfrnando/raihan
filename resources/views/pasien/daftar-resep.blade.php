<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter resep dokter - Puskesmas</title>
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background: linear-gradient(135deg, #00bcd4, #0097a7);
            min-height: 100vh;
            color: white;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 40px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .card-dokter {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-dokter:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);
        }

        .card-dokter i {
            font-size: 24px;
            margin-right: 10px;
            color: #00e5ff;
        }

        .badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 0.9em;
            font-weight: bold;
            color: black;
            text-align: center;
        }

        .badge-hijau {
            background-color: #28a745;
            /* Green color */
        }

        .badge-merah {
            background-color: #dc3545;
            /* Red color */
        }

        .badge-kuning {
            background-color: #ffc107;
            /* Yellow color */
        }
    </style>
</head>

<body>

    <div class="container">
        <h2><i class="bi bi-person-badge"></i> Daftar Resep Obat</h2>
        @if($resep->isEmpty())
        <div class="card-dokter">
            <p>Tidak ada resep obat yang tersedia</p>
        </div>
        @else
        @foreach ($resep as $j)
        <a href="/ambil-obat/{{ $j->id }}" style="text-decoration: none;">
            <div class="card-dokter">
                <h5 style="color: white"><i class="bi bi-capsule"></i> {{ $j->dokter->nama_dokter }}</h5>
                <p style="color: white;">Obat: {{ $j->deskripsi_obat }}</p>
                <div>
                    <span style="color: white;">Status: </span>
                    <span class="badge {{ $j->tahap === 'Selesai' ? 'badge-hijau' : ($j->tahap === 'Resep' ? 'badge-kuning' : 'badge-merah') }}">{{ $j->tahap }}</span>
                </div>
            </div>
        </a>
        @endforeach
        @endif
        <a href="{{ route('pasien.dashboard') }}"><button class="btn-back">Kembali ke Dashboard</button></a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>