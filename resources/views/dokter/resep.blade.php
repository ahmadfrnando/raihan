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
            max-width: 700px;
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

        .patient-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #2e2e4d;
        }

        .patient-table th,
        .patient-table td {
            padding: 10px;
            border-bottom: 1px solid #8c8c9e;
            color: #eaeaea;
            text-align: left;
        }

        .patient-table th {
            border-bottom: 2px solid #00adb5;
        }

        .btn-pilih {
            background-color: #00adb5;
            color: white;
            border: none;
            border-radius: 6px;
            padding: 10px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }

        .btn-pilih:hover {
            background-color: #008a92;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Pilih Pasien</h2>
        <table class="patient-table">
            <thead>
                <tr>
                    <th>Nama Pasien</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Ttl</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <!-- Example row, you can use a loop to generate rows dynamically -->
                 @foreach($pasien as $p)
                <tr>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->jenis_kelamin }}</td>
                    <td>{{ $p->tempat_lahir }} / {{ $p->tgl_lahir }}</td>
                    <td>
                        <a href="/dokter/input-resep/{{ $p->id }}"><button class="btn-pilih">Pilih Pasien</button></a>
                    </td>
                </tr>
                @endforeach
                <!-- Add more patient rows here -->
            </tbody>
        </table>
        <div class="back-button">
            <a href="{{ route('dokter.dashboard') }}">&#8592; Kembali ke Dashboard</a>
        </div>
    </div>
</body>

</html>