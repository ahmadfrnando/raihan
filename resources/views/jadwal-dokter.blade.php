<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Dokter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
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
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
        }
        .sidebar ul li {
            margin: 15px 0;
        }
        .sidebar ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }
        .sidebar ul li a.active, .sidebar ul li a:hover {
            text-decoration: underline;
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
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Puskesmas Binjai Estate</h2>
        <ul>
            <li><a href="dashboard Admin.html">Dashboard</a></li>
            <li><a href="data pasien.html">Data Pasien</a></li>
            <li><a href="data obat.html">Data Obat</a></li>
            <li><a href="jadwal dokter.html" class="active">Jadwal Dokter</a></li>
            <li><a href="Laporan pengajuan ambulance.html">Pengajuan Ambulance</a></li>
            <li><a href="profil admin.html">Profil</a></li>
            <li><a href="logout.html">Logout</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navbar -->
        <div class="navbar d-flex justify-content-between">
            <h1>Jadwal Dokter</h1>
            <p>M. Fila Shaufiq</p>
        </div>

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
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Dr. Shaufiq</td>
                        <td>Umum</td>
                        <td>Senin</td>
                        <td>08:00 - 12:00</td>
                        <td><span class="table-status status-hadir">Hadir</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Dr. Esty</td>
                        <td>Anak</td>
                        <td>Selasa</td>
                        <td>09:00 - 13:00</td>
                        <td><span class="table-status status-tidak-hadir">Tidak Hadir</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Dr. Fiqe</td>
                        <td>Kandungan</td>
                        <td>Rabu</td>
                        <td>10:00 - 14:00</td>
                        <td><span class="table-status status-hadir">Hadir</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
