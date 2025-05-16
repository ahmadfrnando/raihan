<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Puskesmas</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #00bcd4, #0097a7);
            min-height: 100vh;
            color: white;
            margin: 0;
            padding: 0;
        }

        .dashboard-container {
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .dashboard-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            font-size: 36px;
            font-weight: bold;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            margin: 15px;
            padding: 20px;
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);
        }

        .card i {
            font-size: 40px;
            margin-bottom: 20px;
            color: #00bcd4;
        }

        .card h4 {
            margin-bottom: 15px;
            font-size: 20px;
        }

        .btn-dashboard {
            background-color: #00796b;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-dashboard:hover {
            background-color: #004d40;
            transform: translateY(-3px);
        }

        .btn-dashboard:active {
            transform: translateY(1px);
        }
    </style>
</head>

<body>

    <div class="dashboard-container">
        <!-- Header -->
        <div class="dashboard-header">
            <h1>Selamat Datang di Dashboard Puskesmas</h1>
            <p>Fitur-fitur layanan kami untuk Anda.</p>
            <a href="{{ route('logout') }}" class="btn-dashboard"><i class="bi bi-box-arrow-left" aria-label="Ikon Logout"></i> Logout</a>
        </div>

        <!-- Fitur Dashboard -->
        <div class="d-flex flex-wrap justify-content-center">
            <!-- Card Berobat -->
            <div class="card">
                <i class="bi bi-clipboard-data" aria-label="Ikon Berobat"></i>
                <h4>No Antrian</h4>
                <a href="{{ route('pasien.antrian') }}" class="btn-dashboard">Daftar Antrian</a>
            </div>
            <div class="card">
                <i class="bi bi-house-door" aria-label="Ikon Berobat"></i>
                <h4>Berobat</h4>
                <a href="{{ route('pasien.berobat') }}" class="btn-dashboard">Pengajuan Berobat</a>
            </div>

            <!-- Card Ambil Obat -->
            <div class="card">
                <i class="bi bi-capsule" aria-label="Ikon Ambil Obat"></i>
                <h4>Ambil Obat</h4>
                <a href="{{ route('pasien.daftar-resep') }}" class="btn-dashboard">Ambil Obat</a>
            </div>

            <!-- Card Pengajuan Ambulance -->
            <div class="card">
                <i class="bi bi-car-front" aria-label="Ikon Ambulans"></i>
                <h4>Pengajuan Ambulan</h4>
                <a href="{{ route('pasien.pengajuan-ambulans') }}" class="btn-dashboard">Ajukan Ambulans</a>
            </div>

            <!-- Card Hasil Pemeriksaan -->
            <div class="card">
                <i class="bi bi-clipboard-check" aria-label="Ikon Hasil Pemeriksaan"></i>
                <h4>Hasil Pemeriksaan</h4>
                <a href="{{ route('pasien.hasil-pemeriksaan') }}" class="btn-dashboard">Lihat Hasil</a>
            </div>

            <!-- Card Dokter yang Hadir -->
            <div class="card">
                <i class="bi bi-person-badge" aria-label="Ikon Dokter yang Hadir"></i>
                <h4>Dokter yang Hadir</h4>
                <a href="{{ route('pasien.daftar-hadir-dokter') }}" class="btn-dashboard">Lihat Dokter</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>