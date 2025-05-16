<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dokter yang Hadir - Puskesmas</title>
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
            font-size: 0.8em;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 15px;
            margin-right: 5px;
        }

        .bg-success {
            background-color: #198754;
            color: #fff;
        }

        .bg-danger {
            background-color: rgb(135, 25, 25);
            color: #fff;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2><i class="bi bi-person-badge"></i> Daftar Dokter yang Hadir Hari Ini</h2>
        @if($jadwalDokter->isEmpty())
        <div class="card-dokter">
            <p>Tidak ada dokter yang hadir hari ini</p>
        </div>
        @else
        @foreach ($jadwalDokter as $j)
        <div class="card-dokter">
            <h5><i class="bi bi-person-circle"></i> {{ $j->dokter->nama_dokter }}</h5>
            <p>Spesialis {{ $j->spesialis }} | Jam Praktik: {{ date('H:i', strtotime($j->waktu_mulai)) }} - {{ date('H:i', strtotime($j->waktu_selesai)) }}</p>
            @if($j->waktu_absensi !== now()->format('Y-m-d'))
                <span class="badge rounded-pill bg-danger">Belum Absen</span>
            @else
                @if($j->is_hadir == 1)
                <span class="badge rounded-pill bg-success">Hadir</span>
                @else
                <span class="badge rounded-pill bg-danger">Pulang</span>
                @endif
            @endif
        </div>
        @endforeach
        @endif
        <a href="{{ route('pasien.dashboard') }}"><button class="btn-back">Kembali ke Dashboard</button></a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>