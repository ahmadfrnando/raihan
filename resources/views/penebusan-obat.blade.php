<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selesaikan Penebusan - Puskesmas</title>
    <!-- Menggunakan Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #00bcd4, #0097a7);
            height: 100vh;
            color: white;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 40px;
        }
        .page-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .page-header h1 {
            font-size: 36px;
            font-weight: bold;
        }
        .card {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
            margin: 15px 0;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);
        }
        .btn-kembali {
            background-color: #00796b;
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-kembali:hover {
            background-color: #004d40;
            transform: translateY(-3px);
        }
        .btn-kembali:active {
            transform: translateY(1px);
        }
        .informasi {
            font-size: 18px;
            margin-top: 20px;
        }
        .informasi span {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Header -->
        <div class="page-header">
            <h1>Penebusan Obat Selesai</h1>
            <p>Proses penebusan obat Anda telah berhasil diselesaikan!</p>
        </div>

        <!-- Konfirmasi Penebusan -->
        <div class="card"><!DOCTYPE html>
            <html lang="id">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Selesaikan Penebusan - Puskesmas</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
                <style>
                    body {
                        background: linear-gradient(135deg, #00bcd4, #0097a7);
                        height: 100vh;
                        color: white;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        padding: 40px;
                    }
                    .page-header {
                        text-align: center;
                        margin-bottom: 30px;
                    }
                    .page-header h1 {
                        font-size: 36px;
                        font-weight: bold;
                    }
                    .card {
                        background-color: rgba(0, 0, 0, 0.6);
                        border-radius: 15px;
                        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
                        margin: 15px 0;
                        padding: 20px;
                        text-align: center;
                        transition: transform 0.3s ease, box-shadow 0.3s ease;
                    }
                    .card:hover {
                        transform: translateY(-10px);
                        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5);
                    }
                    .btn-kembali, .btn-upload {
                        background-color: #00796b;
                        color: white;
                        padding: 12px 25px;
                        border-radius: 50px;
                        text-decoration: none;
                        transition: background-color 0.3s ease, transform 0.3s ease;
                    }
                    .btn-kembali:hover, .btn-upload:hover {
                        background-color: #004d40;
                        transform: translateY(-3px);
                    }
                    .btn-kembali:active, .btn-upload:active {
                        transform: translateY(1px);
                    }
                    .informasi {
                        font-size: 18px;
                        margin-top: 20px;
                    }
                    .informasi span {
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>
            
                <div class="container">
                    <!-- Header -->
                    <div class="page-header">
                        <h1>Penebusan Obat Selesai</h1>
                        <p>Proses penebusan obat Anda telah berhasil diselesaikan!</p>
                    </div>
            
                    <!-- Konfirmasi Penebusan -->
                    <div class="card">
                        <h4>Konfirmasi Penebusan</h4>
                        <p><span>Nama Pasien:</span> [Nama Pasien]</p>
                        <p><span>Nama Dokter:</span> [Nama Dokter]</p>
                        <p><span>Obat yang Ditebus:</span> [Daftar Obat]</p>
                        <p><span>Total Pembayaran:</span> Rp [Jumlah Pembayaran]</p>
                        <p><span>Status Pembayaran:</span> [Status Pembayaran]</p>
                    </div>
            
                    <!-- Unggah Bukti Foto -->
                    <div class="card">
                        <h4>Unggah Bukti Pembayaran</h4>
                        <p>Silakan unggah foto bukti pembayaran Anda di sini:</p>
                        <input type="file" class="form-control mb-3" id="buktiFoto" accept="image/*">
                        <button class="btn-upload" onclick="uploadBukti()">Unggah Bukti</button>
                    </div>
            
                    <!-- Informasi Lain -->
                    <div class="informasi">
                        <p>Terima kasih telah menggunakan layanan kami. Obat Anda siap untuk diambil di apotek puskesmas.</p>
                    </div>
            
                    <!-- Tombol Kembali ke Dashboard -->
                    <div class="text-center">
                        <a href="dashboard.html" class="btn-kembali">Kembali ke Dashboard</a>
                    </div>
                </div>
            
                <!-- Script untuk upload -->
                <script>
                    function uploadBukti() {
                        const buktiFoto = document.getElementById('buktiFoto').files[0];
                        if (buktiFoto) {
                            alert('Bukti pembayaran berhasil diunggah!');
                            // Lakukan proses upload ke server di sini
                        } else {
                            alert('Harap unggah bukti pembayaran terlebih dahulu.');
                        }
                    }
                </script>
            
                <!-- Menggunakan Bootstrap JS (optional) -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            </body>
            </html>
            
            <h4>Konfirmasi Penebusan</h4>
            <p><span>Nama Pasien:</span> [Nama Pasien]</p>
            <p><span>Nama Dokter:</span> [Nama Dokter]</p>
            <p><span>Obat yang Ditebus:</span> [Daftar Obat]</p>
            <p><span>Total Pembayaran:</span> Rp [Jumlah Pembayaran]</p>
            <p><span>Status Pembayaran:</span> [Status Pembayaran]</p>
        </div>

        <!-- Informasi Lain -->
        <div class="informasi">
            <p>Terima kasih telah menggunakan layanan kami. Obat Anda siap untuk diambil di apotek puskesmas.</p>
        </div>

        <!-- Tombol Kembali ke Dashboard -->
        <div class="text-center">
            <a href="dashboard.html" class="btn-kembali">Kembali ke Dashboard</a>
        </div>
    </div>

    <!-- Menggunakan Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
