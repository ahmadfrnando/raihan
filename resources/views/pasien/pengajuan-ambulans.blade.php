<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Ambulans</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #009688, #004d40);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
        }

        .form-container,
        .thank-you-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .form-container h1,
        .thank-you-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #333;
        }

        .btn-submit,
        .btn-dashboard {
            background-color: #007bff;
            color: white;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 15px;
        }

        .btn-submit:hover,
        .btn-dashboard:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @if (session('success'))
    <div id="thank-you-section" class="thank-you-container">
        <h1>Terima Kasih</h1>
        <p>{{ session('success') }}</p>
        <a href="{{ route('pasien.dashboard') }}" class="btn-dashboard">Kembali ke Dashboard</a>
    </div>
    @else

    <div id="form-section" class="form-container">
        @if (session('error'))
        <div style="background-color:rgb(236, 31, 48); border-radius: 5px; padding: 10px; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
        @endif
        <h1>Ajukan Ambulans</h1>
        <form id="ambulanceForm" action="{{ route('pasien.pengajuan-ambulans') }}" method="POST">
            @csrf
            <input type="text" class="form-control" name="nama_pasien" placeholder="Nama Pengaju" value="{{ old('nama_pasien') }}" required>
            <input type="tel" class="form-control" name="no_hp" placeholder="Nomor Telepon" value="{{ old('no_hp') }}" required>
            <textarea class="form-control" name="alamat" rows="3" placeholder="Alamat Tujuan" value="{{ old('alamat') }}" required></textarea>
            <input type="date" class="form-control" name="tanggal" required>
            <input type="time" class="form-control" name="waktu" required>
            <select class="form-control" name="jenis_keperluan" required>
                <option value="" disabled selected>Pilih Keperluan</option>
                <option value="Darurat">Darurat</option>
                <option value="Kontrol Medis">Kontrol Medis</option>
                <option value="Lainnya">Lainnya</option>
            </select>
            <button type="submit" class="btn-submit">Kirim</button>
        </form>
        <a href="{{ route('pasien.dashboard') }}"><button class="btn-back">Kembali</button></a>
    </div>
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>