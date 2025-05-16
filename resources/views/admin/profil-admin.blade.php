<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Puskesmas Binjai Estate</title>
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

        .profile-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .profile-container h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .profile-item {
            margin-bottom: 15px;
        }

        .profile-item label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .profile-item span,
        .profile-item input {
            display: block;
            font-size: 16px;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .profile-item input {
            font-size: 14px;
        }

        .edit-profile {
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        .edit-button,
        .save-button {
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

        .edit-button:hover,
        .save-button:hover {
            background-color: #0056b3;
        }

        .save-button {
            display: none;
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

        textarea {
            font-size: 16px;
            resize: none;
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
            <li><a href="{{ route('admin.dokter') }}">Dokter</a></li>
            <li><a href="{{ route('admin.jadwal-dokter') }}">Jadwal Dokter</a></li>
            <li><a href="{{ route('admin.ambulans') }}">Pengajuan Ambulance</a></li>
            <li><a href="{{ route('admin.profil') }}" class="active">Profil</a></li>
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
        <div class="profile-container">
            <h1>Profil Puskesmas Binjai Estate</h1>
            <form action="{{ route('admin.profil') }}" method="POST">
                @csrf
                <div class="profile-item">
                    <label>Nama Klinik:</label>
                    <input type="text" id="edit-clinic-name" value="{{ $profile->nama_klinik }}" name="nama_klinik">
                </div>
                <div class="profile-item">
                    <label>Alamat:</label>
                    <input type="text" id="edit-clinic-address" value="{{ $profile->alamat }}" name="alamat">
                </div>
                <div class="profile-item">
                    <label>Telepon:</label>
                    <input type="text" id="edit-clinic-phone" value="{{ $profile->no_telp }}" name="no_telp">
                </div>
                <div class="profile-item">
                    <label>Email:</label>
                    <input type="email" id="edit-clinic-email" value="{{ $profile->email }}" name="email">
                </div>
                <div class="profile-item">
                    <label>Deskripsi:</label>
                    <textarea class="form-control" name="deskripsi">{{ $profile->deskripsi }}</textarea>
                </div>
                <button class="edit-button" type="submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</body>

</html>