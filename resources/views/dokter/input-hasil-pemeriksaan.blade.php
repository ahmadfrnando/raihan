<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Hasil Pemeriksaan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1a1a2e;
            color: #eaeaea;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background: linear-gradient(145deg, #23234e, #1a1a2e);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            border-radius: 12px;
            padding: 30px;
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #00adb5;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #eaeaea;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #2e2e4d;
            color: #eaeaea;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #8c8c9e;
        }

        .form-group textarea {
            resize: none;
            height: 100px;
        }

        .form-group button {
            width: 100%;
            padding: 12px;
            background-color: #00adb5;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-group button:hover {
            background-color: #008a92;
        }

        .back-button {
            margin-top: 10px;
            text-align: center;
        }

        .back-button a {
            color: #00adb5;
            text-decoration: none;
            font-weight: bold;
        }

        .back-button a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-success {
            background-color: #28a745;
            color: #ffffff;
        }

        .alert-error {
            background-color: #dc3545;
            color: #ffffff;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Input Hasil Pemeriksaan {{ $pasien->nama }}</h2>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif
        <form method="POST" action="/dokter/input-hasil-pemeriksaan/{{ $pasien->id }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tanggal_pemeriksaan">Tanggal</label>
                <input type="date" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan" required>
            </div>
            <div class="form-group">
                <label for="diagnosa">Diagnosa</label>
                <textarea id="diagnosa" name="diagnosa" placeholder="Masukkan diagnosa" required></textarea>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea id="catatan" name="catatan" placeholder="Masukkan Catatan"></textarea>
            </div>
            <div class="form-group">
                <label for="file_pemeriksaan">Unggah Dokumen Hasil Pemeriksaan</label>
                <input type="file" id="file_pemeriksaan" name="file_pemeriksaan" accept=".pdf,.doc,.docx" required>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
        <div class="back-button">
            <a href="{{ route('dokter.dashboard') }}">&#8592; Kembali ke Dashboard</a>
        </div>
    </div>
</body>

</html>