<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Absensi Dokter</title>
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
            display: flex;
            gap: 8px;
        }

        .form-group label {
            display: flex;
            margin-bottom: 8px;
            font-weight: bold;
            color: #eaeaea;
        }

        .form-group input,
        select {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 6px;
            background: #2e2e4d;
            color: #eaeaea;
        }

        .form-group input::placeholder {
            color: #8c8c9e;
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
            margin-bottom: 15px;
            text-align: center;
            font-weight: bold;
        }

        .alert-success {
            background-color: #28a745;
            color: #ffffff;
        }

        .alert-error {
            background-color: #dc3545;
            color: #ffffff;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: rgb(0, 255, 17);
            color: rgb(0, 0, 0);
            font-size: 0.9em;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="form-container">
        @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-error" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <h2>Terakhir Absen: {{$jadwal->waktu_absensi}} <span class="badge status-badge">{{$status}}</span></h2>
        <h2>Form Absensi Dokter</h2>
        <form method="POST" action="{{ route('dokter.absensi') }}">
            @csrf
            <div class="form-group">
                <select name="isHadir">
                    <option value="1">Hadir</option>
                    <option value="0">Pulang</option>
                </select>
            </div>
            <div class="form-group">
                <input type="password" id="pin" name="pin" placeholder="Masukkan PIN" required>
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