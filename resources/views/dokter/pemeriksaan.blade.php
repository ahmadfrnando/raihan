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

        .btn-primary {
            background-color: #00adb5;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            padding: 10px;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #008a92;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Daftar Pasien</h2>
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px; background-color: #2e2e4d;">
            <thead>
                <tr>
                    <th style="padding: 10px; border-bottom: 2px solid #00adb5; color: #eaeaea;">Nama Pasien</th>
                    <th style="padding: 10px; border-bottom: 2px solid #00adb5; color: #eaeaea;">Alamat</th>
                    <th style="padding: 10px; border-bottom: 2px solid #00adb5; color: #eaeaea;">Jenis Kelamin</th>
                    <th style="padding: 10px; border-bottom: 2px solid #00adb5; color: #eaeaea;">Ttl</th>
                    <th style="padding: 10px; border-bottom: 2px solid #00adb5; color: #eaeaea;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pasien as $p)
                <tr>
                    <td style="padding: 10px; border-top: 1px solid #8c8c9e; color: #eaeaea;">{{ $p->nama }}</td>
                    <td style="padding: 10px; border-top: 1px solid #8c8c9e; color: #eaeaea;">{{ $p->alamat }}</td>
                    <td style="padding: 10px; border-top: 1px solid #8c8c9e; color: #eaeaea;">{{ $p->jenis_kelamin }}</td>
                    <td style="padding: 10px; border-top: 1px solid #8c8c9e; color: #eaeaea;">{{ $p->tempat_lahir }} / {{ $p->tgl_lahir }}</td>
                    <td style="padding: 10px; border-top: 1px solid #8c8c9e; color: #eaeaea;">
                        <a href="/dokter/input-hasil-pemeriksaan/{{ $p->id }}" class="btn-primary" style="display: inline-block; text-align: center;">Pilih Pasien</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="back-button">
            <a href="{{ route('dokter.dashboard') }}">&#8592; Kembali ke Dashboard</a>
        </div>
    </div>

    <script>
        function submitForm(event) {
            event.preventDefault();
            const formData = new FormData(document.getElementById('hasilPemeriksaanForm'));
            const namaPasien = formData.get('namaPasien');
            const diagnosa = formData.get('diagnosa');
            const tindakanFile = formData.get('tindakanFile');

            if (!namaPasien || !diagnosa || !tindakanFile) {
                alert('Semua data wajib diisi!');
                return;
            }

            alert(`Hasil pemeriksaan berhasil disimpan:
Nama Pasien: ${namaPasien}
Diagnosa: ${diagnosa}
Dokumen: ${tindakanFile.name}`);
        }
    </script>
</body>

</html>