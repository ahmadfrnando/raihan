<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Dokter</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            background-image: url('img/SE.png');
            /* Ganti dengan path foto background */
            background-size: cover;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        header {
            background-color: #ffffff;
            /* Mengubah warna latar belakang header menjadi putih */
            color: #333;
            /* Mengubah warna teks menjadi abu-abu gelap */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            /* Menambahkan bayangan lembut */
            padding: 5px 0;
            /* Mengurangi padding agar lebih kecil */
            max-width: 700px;
            /* Membatasi lebar header */
            margin: 0 auto;
            /* Menjaga header tetap terpusat di tengah */
        }

        h1 {
            font-size: 1.75rem;
            /* Mengurangi ukuran font header */
            font-weight: bold;
            text-align: center;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: none;
            border-radius: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .card i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #00d4ff;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            text-transform: uppercase;
            color: #ffffff;
        }

        .divider {
            width: 60px;
            /* Ukuran garis */
            height: 4px;
            /* Ketebalan garis */
            background-color: #00d4ff;
            /* Warna garis */
            margin: 10px auto;
            /* Menempatkan garis di tengah */
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <header class="text-center">
        <h1 class="fw-bold">Dasbor Dokter</h1>
    </header>
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            <!-- Absensi Dokter -->
            <div class="col-12 col-md-4">
                <a href="{{ route('dokter.absensi') }}">
                    <div class="card text-center shadow">
                        <div class="card-body d-flex flex-column align-items-center py-4">
                            <i class="fas fa-camera"></i>
                            <h5 class="card-title">Absensi Dokter</h5>
                        </div>
                        <div class="divider"></div> <!-- Garis pemisah -->
                    </div>
                </a>
            </div>

            <!-- Input Hasil Pemeriksaan -->
            <div class="col-12 col-md-4">
                <a href="{{ route('dokter.pemeriksaan') }}">
                    <div class="card text-center shadow">
                        <div class="card-body d-flex flex-column align-items-center py-4">
                            <i class="fas fa-notes-medical"></i>
                            <h5 class="card-title">Input Hasil Pemeriksaan</h5>
                        </div>
                        <div class="divider"></div> <!-- Garis pemisah -->
                    </div>
                </a>
            </div>

            <!--Lihat Laporan Pasien-->
            <div class="col-12 col-md-4">
                <a href="{{ route('dokter.laporan') }}">
                    <div class="card text-center shadow">
                        <div class="card-body d-flex flex-column align-items-center py-4">
                            <i class="fas fa-notes-medical"></i>
                            <h5 class="card-title">Laporan Hasil Pemeriksaan</h5>
                        </div>
                        <div class="divider"></div> <!-- Garis pemisah -->
                    </div>
                </a>
            </div>

            <!-- Input Resep -->
            <div class="col-12 col-md-4">
                <a href="{{ route('dokter.resep') }}">
                    <div class="card text-center shadow">
                        <div class="card-body d-flex flex-column align-items-center py-4">
                            <i class="fas fa-prescription"></i>
                            <h5 class="card-title">Input Resep</h5>
                        </div>
                        <div class="divider"></div> <!-- Garis pemisah -->
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-4">
                <a href="{{ route('logout') }}">
                    <div class="card text-center shadow">
                        <div class="card-body d-flex flex-column align-items-center py-4">
                            <i class="fas fa-prescription"></i>
                            <h5 class="card-title">Logout</h5>
                        </div>
                        <div class="divider"></div> <!-- Garis pemisah -->
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>