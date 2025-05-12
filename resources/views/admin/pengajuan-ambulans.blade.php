<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Ambulans</title>
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

        .form-select {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
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
        <h1>Jadwal Dokter</h1>
        <div class="button-container">
            <a href="{{ route('admin.tambah-pengajuan-ambulans') }}"><button class="button">Buat Pengajuan Ambulans</button></a>
        </div>
        <table id="patientTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Keperluan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>No HP</th>
                    <th>Waktu Jemput</th>
                    <th>Alamat</th>
                    <th>Ubah Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pengajuan as $key => $p)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $p->nama_pasien ?? '-' }}</td>
                    <td>{{ $p->jenis_keperluan }}</td>
                    <td>{{ $p->tanggal }}</td>
                    <td>{{ $p->no_hp }}</td>
                    <td>{{ $p->waktu }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>
                        <select class="form-select form-select-sm" data-id="{{ $p->id }}" name="status">
                            <option value="Diproses" {{ $p->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="Selesai" {{ $p->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Berjalan" {{ $p->status == 'Berjalan' ? 'selected' : '' }}>Berjalan</option>
                            <option value="Ditolak" {{ $p->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </td>
                    <td class="actions">
                        <a href="/admin/edit-pengajuan-ambulans/{{ $p->id }}"><button class="edit">Edit</button></a>
                        <a href="/admin/hapus-pengajuan-ambulans/{{ $p->id }}"><button class="delete">Hapus</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Script -->
    <script>
        const selects = document.querySelectorAll('.form-select');

        function ubahStatus(select) {
            const id = select.getAttribute('data-id'); // Ambil ID pasien yang terhubung dengan select
            const status = select.value;
            console.log(id, status);

            fetch("{{ route('admin.ambulans') }}", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        id,
                        status
                    })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data); // Log hasil response untuk debugging
                    // Bisa menambahkan notifikasi jika perlu
                })
                .catch(error => console.error(error)); // Menangani error jika ada
        }

        // Menambahkan event listener untuk setiap select status
        selects.forEach(select => {
            select.addEventListener('change', () => {
                ubahStatus(select); // Update status pasien di backend
            });
        });

        // function ubahStatus(id, statusBaru) {
        //     const badge = document.getElementById('status-' + id);
        //     badge.textContent = statusBaru;
        //     badge.className = "badge";

        //     if (statusBaru === "Diproses") {
        //         badge.classList.add("bg-warning", "text-dark");
        //     } else if (statusBaru === "Selesai") {
        //         badge.classList.add("bg-success");
        //     } else if (statusBaru === "Berjalan") {
        //         badge.classList.add("bg-secondary");
        //     }
        // }
    </script>
</body>

</html>