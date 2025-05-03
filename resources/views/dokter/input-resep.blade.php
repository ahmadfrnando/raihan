<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep Obat</title>
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
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Resep Obat</h2>
        @if(session()->has('success'))
        <div class="alert alert-success" style="padding: 15px; border-radius: 5px; margin-bottom: 15px; text-align: center; font-weight: bold; background-color: #28a745; color: #ffffff;">
            {{ session('success') }}
        </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-error" style="padding: 15px; border-radius: 5px; margin-bottom: 15px; text-align: center; font-weight: bold; background-color: #dc3545; color: #ffffff;">
            {{ session('error') }}
        </div>
        @endif
        <form method="POST" action="/dokter/input-resep/{{ $id_pasien }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="deskripsi_obat">Nama Obat <span style="color: red;">*</span></label>
                <textarea id="deskripsi_obat" name="deskripsi_obat" value="{{ old('deskripsi_obat') }}" placeholder="Masukkan nama obat, pisahkan dengan koma jika lebih dari satu" required></textarea>
            </div>
            <div class="form-group">
                <label for="total_harga">Total Harga <span style="color: red;">*</span></label>
                <input type="number" id="total_harga" name="total_harga" placeholder="Masukkan total harga" required></input>
            </div>
            <div class="form-group">
                <label for="catatan">Catatan Tambahan (Opsional)</label>
                <textarea id="catatan" name="catatan" value="{{ old('catatan') }}" placeholder="Masukkan catatan tambahan jika diperlukan"></textarea>
            </div>
            <div class="form-group">
                <label for="file_resep">Unggah Resep Dokter (Opsional)</label>
                <input type="file" id="file_resep" name="file_resep" accept=".pdf,.jpg,.jpeg,.png">
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