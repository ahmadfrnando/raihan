<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard Puskesmas Binjai Estate</title>
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

    .sidebar ul li a:hover,
    .sidebar ul li a.active {
      background-color: #0056b3;
    }

    .sidebar img {
      margin-top: 20px;
      width: 100%;
      border-radius: 10px;
    }

    .main-content {
      flex-grow: 1;
      padding: 20px;
    }

    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .header h1 {
      font-size: 24px;
    }

    .header .user-info {
      font-size: 16px;
    }

    .stats {
      display: flex;
      gap: 20px;
      margin-bottom: 20px;
    }

    .stat-card {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      flex: 1;
      text-align: center;
    }

    .stat-card h2 {
      font-size: 36px;
      margin-bottom: 10px;
    }

    .table-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
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

    .status-select {
      padding: 8px 12px;
      border-radius: 6px;
      font-size: 14px;
      border: 1px solid #ccc;
      width: 100%;
      font-weight: bold;
      transition: all 0.3s ease;
    }

    .status-select:focus {
      outline: none;
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .status-select.dirawat {
      background-color: #e0f0ff;
      color: #004085;
    }

    .status-select.sembuh {
      background-color: #e6f4ea;
      color: #155724;
    }

    .status-select.operasi {
      background-color: #fff8e1;
      color: #856404;
    }

    .status-select.kritis {
      background-color: #f8d7da;
      color: #721c24;
    }

    @media (max-width: 768px) {
      .sidebar {
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
      }

      .main-content {
        padding: 10px;
      }

      .stats {
        flex-direction: column;
      }
    }
  </style>
</head>

<body>
  <div class="sidebar">
    <h2>Puskesmas Binjai Estate</h2>
    <ul>
      <li><a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a></li>
      <li><a href="{{ route('admin.pasien') }}">Data Pasien</a></li>
      <li><a href="{{ route('admin.obat') }}">Data Obat</a></li>
      <li><a href="{{ route('admin.dokter') }}">Dokter</a></li>
      <li><a href="{{ route('admin.jadwal-dokter') }}">Jadwal Dokter</a></li>
      <li><a href="{{ route('admin.ambulans') }}">Pengajuan Ambulance</a></li>
      <li><a href="{{ route('admin.profil') }}">Profil</a></li>
      <li><a href="{{ route('logout') }}">Logout</a></li>
    </ul>
    <img src="asset/logo.png" alt="Sistem Informasi Rekam Medis" />
  </div>

  <div class="main-content">
    <div class="header">
      <h1>Dashboard</h1>
      <div class="user-info">Admin</div>
    </div>

    <div class="stats">
      <div class="stat-card">
        <h2>{{ $pasien->count()}}</h2>
        <p>Total Pasien</p>
      </div>
      <div class="stat-card">
        <h2>{{ $pasien->sum('stok')}}</h2>
        <p>Total Obat</p>
      </div>
    </div>

    <div class="table-container">
      <h3>Tabel Pasien</h3>
      <table>
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Umur</th>
            <th>Jenkel</th>
            <th>Kondisi</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pasien as $key => $p)
          <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->usia }}</td>
            <td>{{ $p->jenis_kelamin }}</td>
            <td>
              <select class="status-select dirawat" data-id="{{ $p->id }}" name="status">
                <option value="" {{ $p->status == null ? 'selected' : '' }}>Pilih Status</option>
                <option value="dirawat" {{ $p->status == 'dirawat' ? 'selected' : '' }}>🏥 Dirawat</option>
                <option value="sembuh" {{ $p->status == 'sembuh' ? 'selected' : '' }}>✅ Sembuh</option>
                <option value="operasi" {{ $p->status == 'operasi' ? 'selected' : '' }}>🛠️ Operasi</option>
                <option value="kritis" {{ $p->status == 'kritis' ? 'selected' : '' }}>🚨 Kritis</option>
              </select>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <script>
    // Ambil semua elemen select dengan class .status-select
    const selects = document.querySelectorAll('.status-select');

    // Fungsi untuk memperbarui class berdasarkan nilai yang dipilih
    function updateSelectColor(select) {
      const value = select.value;
      select.className = 'status-select'; // Reset class sebelum menambahkan class baru
      select.classList.add(value); // Tambahkan kelas status sesuai dengan pilihan
    }

    // Fungsi untuk mengupdate status pasien pada backend
    function updatePasien(select) {
      const id = select.getAttribute('data-id'); // Ambil ID pasien yang terhubung dengan select
      const status = select.value;
      console.log(id, status);

      fetch("{{ route('admin.dashboard') }}", {
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
      updateSelectColor(select); // Set warna atau class awal berdasarkan status yang dipilih
      select.addEventListener('change', () => {
        updateSelectColor(select); // Update warna setelah change
        updatePasien(select); // Update status pasien di backend
      });
    });
  </script>
</body>

</html>