<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasbor Laporan Dokter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0d1b2a;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #1b263b;
            padding: 20px;
            text-align: center;
            font-size: 1.5em;
            color: #ffffff;
            border-bottom: 2px solid #415a77;
        }
        .container {
            margin: 20px auto;
            max-width: 90%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #102a43;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #415a77;
        }
        th {
            background-color: #1e3a5f;
            color: #f0f8ff;
        }
        tr:nth-child(even) {
            background-color: #243b55;
        }
        tr:hover {
            background-color: #334e68;
            cursor: pointer;
        }
        .button-container {
            text-align: center;
            margin: 20px 0;
        }
        .button-container a {
            background-color: #1e3a5f;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1em;
            transition: background-color 0.3s;
        }
        .button-container a:hover {
            background-color: #415a77;
        }
    </style>
</head>
<body>
    <header>
        Dasbor Dokter - Laporan Pemeriksaan
    </header>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>NIK Pasien</th>
                    <th>Nama Pasien</th>
                    <th>Usia Pasien</th>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Diagnosis</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hasilPemeriksaan as $h)
                <tr>
                    <td>{{ $h->pasien->nik ?? '-'}}</td>
                    <td>{{ $h->pasien->nama ?? '-'}}</td>
                    <td>{{ $h->usia_pasien }} tahun</td>
                    <td>{{ $h->tanggal_pemeriksaan }}</td>
                    <td>{{ $h->diagnosa }}</td>
                    <td>{{ $h->catatan }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="button-container">
        <a href="{{ route('dokter.dashboard') }}">Kembali ke Halaman Dasbor</a>
    </div>
</body>
</html>
