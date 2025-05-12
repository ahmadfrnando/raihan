<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengajuan Ambulans</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #007bff;
            color: #fff;
            padding: 20px;
            height: 100vh;
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #fff;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar ul li a:hover {
            background-color: #0056b3;
        }

        .sidebar img {
            margin-top: 20px;
            width: 100%;
            border-radius: 10px;
        }

        .container {
            flex-grow: 1;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
        }

        .button-container {
            margin-bottom: 20px;
            text-align: right;
        }

        .button {
            padding: 10px 15px;
            font-size: 14px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table th,
        table td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f4f4f4;
        }

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background-color: #0056b3;
        }

        .actions button {
            padding: 5px 10px;
            font-size: 14px;
            margin-right: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
        }

        .actions .edit {
            background-color: #ffc107;
        }

        .actions .edit:hover {
            background-color: #e0a800;
        }

        .actions .delete {
            background-color: #dc3545;
        }

        .actions .delete:hover {
            background-color: #c82333;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
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
    <div class="sidebar">
        <h2>Puskesmas Binjai Estate</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.pasien') }}">Data Pasien</a></li>
            <li><a href="{{ route('admin.obat') }}">Data Obat</a></li>
            <li><a href="{{ route('admin.dokter') }} ">Dokter</a></li>
            <li><a href="{{ route('admin.jadwal-dokter') }}">Jadwal Dokter</a></li>
            <li><a href="{{ route('admin.ambulans') }}" class="active">Pengajuan Ambulance</a></li>
            <li><a href="{{ route('admin.profil') }}">Profil</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
        <img src="{{ asset('img/ill_sidebar.svg') }}" alt="Sistem Informasi Rekam Medis">
    </div>
    <div class="container">
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
        <h1>Buat Pengajuan Ambulans</h1>
        <form action="{{ route('admin.tambah-pengajuan-ambulans') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <div>
                    <label for="jenis_keperluan" style="margin-bottom: 5px;">Jenis Keperluan</label>
                    <select id="jenis_keperluan" name="jenis_keperluan" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>
                        <option value="">-- Pilih Keperluan --</option>
                        //'Darurat','Kontrol Medis','Lainnya'
                        <option value="Darurat" {{ old('jenis_keperluan') == 'Darurat' ? 'selected' : ''}}>Darurat</option>
                        <option value="Kontrol Medis" {{ old('jenis_keperluan') == 'Kontrol Medis' ? 'selected' : ''}}>Kontrol Medis</option>
                        <option value="Lainnya" {{ old('jenis_keperluan') == 'Lainnya' ? 'selected' : ''}}>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label for="nama_pasien" style="margin-bottom: 5px;">Nama Pasien</label>
                    <input type="text" id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien') }}" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>
                </div>
                <div>
                    <label for="no_hp" style="margin-bottom: 5px;">No Handphone/WA</label>
                    <input type="number" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>
                </div>
                <div>
                    <label for="tanggal" style="margin-bottom: 5px;">Tanggal Pengajuan</label>
                    <input type="date" id="tanggal" name="tanggal" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>
                </div>
                <div>
                    <label for="waktu" style="margin-bottom: 5px;">Waktu Jemput</label>
                    <input type="time" id="waktu" name="waktu" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>
                </div>
                <div>
                    <label for="alamat" style="margin-bottom: 5px;">Alamat</label>
                    <textarea type="text" id="alamat" name="alamat" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required></textarea>
                </div>
                <div>
                    <label for="status" style="margin-bottom: 5px;">Status</label>
                    <select id="status" name="status" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>
                        <option value="">-- Pilih Keperluan --</option>
                        <option value="Diproses" {{ old('status') == 'Diproses' ? 'selected' : ''}}>Diproses</option>
                        <option value="Berjalan" {{ old('status') == 'Berjalan' ? 'selected' : ''}}>Berjalan</option>
                        <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : ''}}>Selesai</option>
                        <option value="Ditolak" {{ old('status') == 'Ditolak' ? 'selected' : ''}}>Ditolak</option>
                    </select>
                </div>
            </div>
            <button type="submit" style="background-color: #007bff; margin-top: 20px;color: #fff; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">Buat Pengajuan Ambulans</button>
        </form>
        <a href="{{ route('admin.ambulans') }}"><button type="button" style="background-color:rgb(255, 0, 0); margin-top: 20px;color: #fff; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">Kembali</button></a>
    </div>
</body>

</html>