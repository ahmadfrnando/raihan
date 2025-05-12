<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Pengajuan Ambulance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background-color: #007bff;
            color: white;
            padding: 20px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar a {
            display: block;
            padding: 10px 15px;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #0056b3;
            padding-left: 20px;
        }

        .logo {
            width: 100%;
            text-align: center;
            margin-top: 40px;
        }

        .logo img {
            width: 80%;
        }

        .content {
            margin-left: 250px;
            padding: 30px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        .table-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ddd;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
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
        <div class="logo">
            <img src="{{ asset('img/ill_sidebar.svg') }}" alt="Sistem Informasi Rekam Medis">
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Laporan Pengajuan Ambulance</h2>
            <span>M. Fila Shaufiq</span>
        </div>

        <div class="table-container">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Umur</th>
                        <th>Alamat</th>
                        <th>Waktu Pengajuan</th>
                        <th>Status</th>
                        <th>Ubah Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Budi</td>
                        <td>45</td>
                        <td>Jl. Mawar No.10</td>
                        <td>2025-04-20 10:30</td>
                        <td><span class="badge bg-warning text-dark" id="status-1">Diproses</span></td>
                        <td>
                            <select class="form-select form-select-sm" onchange="ubahStatus(1, this.value)">
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Menunggu">Menunggu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Siti</td>
                        <td>30</td>
                        <td>Jl. Melati No.5</td>
                        <td>2025-04-20 09:15</td>
                        <td><span class="badge bg-success" id="status-2">Selesai</span></td>
                        <td>
                            <select class="form-select form-select-sm" onchange="ubahStatus(2, this.value)">
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai" selected>Selesai</option>
                                <option value="Menunggu">Menunggu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Agus</td>
                        <td>60</td>
                        <td>Jl. Kenanga No.2</td>
                        <td>2025-04-19 15:00</td>
                        <td><span class="badge bg-secondary" id="status-3">Menunggu</span></td>
                        <td>
                            <select class="form-select form-select-sm" onchange="ubahStatus(3, this.value)">
                                <option value="Diproses">Diproses</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Menunggu" selected>Menunggu</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Script -->
    <script>
        function ubahStatus(id, statusBaru) {
            const badge = document.getElementById('status-' + id);
            badge.textContent = statusBaru;
            badge.className = "badge";

            if (statusBaru === "Diproses") {
                badge.classList.add("bg-warning", "text-dark");
            } else if (statusBaru === "Selesai") {
                badge.classList.add("bg-success");
            } else if (statusBaru === "Menunggu") {
                badge.classList.add("bg-secondary");
            }
        }
    </script>

</body>

</html>