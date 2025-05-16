<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pemeriksaan Harian</title>
    <style>
        /* Warna dan font dasar */
        :root {
            --primary-color: #007bff;
            --secondary-color: #0d59db;
            --text-color: #ffffff;
            --bg-color: #0a192f;
            --card-bg-color: #112240;
            --hover-color: #00aaff;
            --font-family: 'Arial', sans-serif;
        }

        body {
            font-family: var(--font-family);
            margin: 0;
            padding: 0;
            background-color: var(--bg-color);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            width: 90%;
            padding: 20px;
            background-color: var(--card-bg-color);
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: var(--primary-color);
            font-size: 1.8rem;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1rem;
            color: #a8b2d1;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: var(--primary-color);
            color: var(--text-color);
        }

        tr:nth-child(even) {
            background-color: var(--secondary-color);
        }

        tr:hover {
            background-color: var(--hover-color);
            color: var(--text-color);
        }

        .download-button {
            text-decoration: none;
            color: var(--text-color);
            background-color: var(--primary-color);
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 0.9rem;
            transition: background-color 0.3s;
        }

        .download-button:hover {
            background-color: var(--hover-color);
        }

        .back-button {
            display: block;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
            background-color: var(--primary-color);
            /* Warna biru */
            color: var(--text-color);
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: var(--hover-color);
            /* Warna biru lebih terang saat hover */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hasil Pemeriksaan Harian</h1>
        <p>Berikut adalah hasil pemeriksaan Anda berdasarkan jangka waktu per hari. Klik tombol unduh untuk mendapatkan detailnya.</p>

        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Dokter</th>
                    <th>Jenis Pemeriksaan</th>
                    <th>Unduh</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data hasil pemeriksaan harian -->
                @foreach($hasil as $h)
                <tr>
                    <td>{{ $h->tanggal_pemeriksaan }}</td>
                    <td>{{ $h->nama_dokter ?? '-' }}</td>
                    <td>{{ $h->jenis_pelayanan }}</td>
                    <td><a href="{{ asset('storage/'.$h->file_pemeriksaan) }}" target="_blank" class="download-button">Unduh</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tombol Kembali ke Dashboard -->
        <a href="{{ route('pasien.dashboard') }}" class="back-button">Kembali ke Dashboard</a>
    </div>
</body>

</html>