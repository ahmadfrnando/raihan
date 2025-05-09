<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pasien</title>
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
            <li><a href="{{ route('admin.pasien') }}" class="active">Data Pasien</a></li>
            <li><a href="{{ route('admin.obat') }}">Data Obat</a></li>
            <li><a href="{{ route('admin.dokter') }}">Dokter</a></li>
            <li><a href="{{ route('admin.jadwal-dokter') }}">Jadwal Dokter</a></li>
            <li><a href="{{ route('admin.ambulans') }}">Pengajuan Ambulance</a></li>
            <li><a href="{{ route('admin.profil') }}">Profil</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
        <img src="https://via.placeholder.com/200x150" alt="Sistem Informasi Rekam Medis">
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
        <h1>Tambah Pasien</h1>
        <form action="{{ route('admin.tambah-pasien') }}" method="POST">
            @csrf
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px;">
                <div>
                    <label for="nama" style="margin-bottom: 5px;">Nama</label>
                    <input type="text" id="nama" name="nama" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" value="{{ old('nama') }}" required>
                </div>
                <div>
                    <label for="nik" style="margin-bottom: 5px;">NIK</label>
                    <input type="text" id="nik" name="nik" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" value="{{ old('nik') }}" required>
                </div>
                <div>
                    <label for="alamat" style="margin-bottom: 5px;">Alamat</label>
                    <textarea id="alamat" name="alamat" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;"  value="{{ old('alamat') }}" required></textarea>
                </div>
                <div>
                    <label for="no_telp" style="margin-bottom: 5px;">Nomor Telepon</label>
                    <input type="number" id="no_telp" name="no_telp" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" value="{{ old('no_telp') }}" required>
                </div>
                <div>
                    <label for="jenis_kelamin" style="margin-bottom: 5px;">Jenis Kelamin</label>
                    <select id="jenis_kelamin" name="jenis_kelamin" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" required>
                        <option value="" {{ old('jenis_kelamin') == '' ? 'selected' : '' }}>-- Pilih --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="tgl_lahir" style="margin-bottom: 5px;">Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" value="{{ old('tgl_lahir') }}" required>
                </div>
                <div>
                    <label for="tempat_lahir" style="margin-bottom: 5px;">Tempat Lahir</label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc;" value="{{ old('tempat_lahir') }}" required>
                </div>
            </div>
            <button type="submit" style="background-color: #007bff; margin-top: 20px;color: #fff; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">Simpan Data Pasien</button>
        </form>
        <a href="{{ route('admin.pasien') }}"><button type="button" style="background-color:rgb(255, 0, 0); margin-top: 20px;color: #fff; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">Kembali</button></a>
    </div>
</body>

</html>