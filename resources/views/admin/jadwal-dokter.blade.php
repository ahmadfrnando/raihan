<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Dokter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
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

        .ol, ul{
            padding-left: 0px !important;
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

         .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background-color: #0056b3;
        }

        .main-content {
            flex: 1;
            padding: 20px;
        }

        .navbar {
            background-color: #f8f9fa;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .table-status span {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .status-hadir {
            background-color: #28a745;
            color: #fff;
        }

        .status-tidak-hadir {
            background-color: #dc3545;
            color: #fff;
        }

        .button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .alert-success {
            background-color: #28a745;
            color: #ffffff;
        }

        .alert-error {
            background-color: #dc3545;
            color: #ffffff;
        }

        .edit {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 7px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .hapus {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 7px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Puskesmas Binjai Estate</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.pasien') }}">Data Pasien</a></li>
            <li><a href="{{ route('admin.obat') }}">Data Obat</a></li>
            <li><a href="{{ route('admin.dokter') }} ">Dokter</a></li>
            <li><a href="{{ route('admin.jadwal-dokter') }}" class="active">Jadwal Dokter</a></li>
            <li><a href="{{ route('admin.ambulans') }}">Pengajuan Ambulance</a></li>
            <li><a href="{{ route('admin.profil') }}">Profil</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <div class="navbar d-flex justify-content-between">
            <h1>Jadwal Dokter</h1>
            <a href="{{ route('admin.tambah-jadwal-dokter') }}"><button class="button">Tambah Jadwal</button></a>
        </div>
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

        <!-- Tabel Jadwal Dokter -->
        <div class="mt-4">
            <table class="table table-bordered">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Dokter</th>
                        <th>Spesialis</th>
                        <th>Hari Praktek</th>
                        <th>Jam Praktek</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($jadwal as $key => $d)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $d->dokter->nama_dokter ?? '-' }}</td>
                        <td>{{ $d->dokter->spesialis ?? '-' }}</td>
                        <td>{{ $d->hari() }}</td>
                        <td>{{ $d->waktu_mulai }} - {{ $d->waktu_selesai }}</td>
                        <td class="table-status">
                            <span class="status-hadir">{{ $d->is_hadir ? 'Hadir' : 'Tidak Hadir' }}</span>
                        </td>
                        <td>
                            <a href="/admin/edit-jadwal-dokter/{{ $d->id }}"><button class="edit">Edit</button></a>
                            <a href="/admin/hapus-jadwal-dokter/{{ $d->id }}"><button class="hapus">Hapus</button></a>
                        </td>
                        @endforeach
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>