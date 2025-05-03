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

        .profile-item span, .profile-item input {
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

        .edit-button, .save-button {
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

        .edit-button:hover, .save-button:hover {
            background-color: #0056b3;
        }

        .save-button {
            display: none;
        }
    </style>
</head>
<body>
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
        <img src="https://via.placeholder.com/200x150" alt="Sistem Informasi Rekam Medis">
    </div>
    <div class="container">
        <div class="profile-container">
            <h1>Profil Puskesmas Binjai Estate</h1>
            <div class="profile-item">
                <label>Nama Klinik:</label>
                <span id="clinic-name">Klinik Sehat Sentosa</span>
                <input type="text" id="edit-clinic-name" value="Klinik Sehat Sentosa" style="display: none;">
            </div>
            <div class="profile-item">
                <label>Alamat:</label>
                <span id="clinic-address">Jl. Merdeka No. 123, Jakarta</span>
                <input type="text" id="edit-clinic-address" value="Jl. Merdeka No. 123, Jakarta" style="display: none;">
            </div>
            <div class="profile-item">
                <label>Telepon:</label>
                <span id="clinic-phone">021-12345678</span>
                <input type="text" id="edit-clinic-phone" value="021-12345678" style="display: none;">
            </div>
            <div class="profile-item">
                <label>Email:</label>
                <span id="clinic-email">info@kliniksehat.com</span>
                <input type="text" id="edit-clinic-email" value="info@kliniksehat.com" style="display: none;">
            </div>
            <div class="profile-item">
                <label>Deskripsi:</label>
                <span id="clinic-description">Klinik Sehat Sentosa adalah pusat layanan kesehatan yang berkomitmen memberikan pelayanan terbaik untuk pasien.</span>
                <textarea id="edit-clinic-description" style="display: none;">Klinik Sehat Sentosa adalah pusat layanan kesehatan yang berkomitmen memberikan pelayanan terbaik untuk pasien.</textarea>
            </div>
            <div class="edit-profile">
                <button class="edit-button" onclick="editProfile()">Edit Profil</button>
                <button class="save-button" onclick="saveProfile()">Simpan Perubahan</button>
            </div>
        </div>
    </div>

    <script>
        function editProfile() {
            // Menyembunyikan teks dan menampilkan input fields
            document.getElementById('clinic-name').style.display = 'none';
            document.getElementById('clinic-address').style.display = 'none';
            document.getElementById('clinic-phone').style.display = 'none';
            document.getElementById('clinic-email').style.display = 'none';
            document.getElementById('clinic-description').style.display = 'none';

            document.getElementById('edit-clinic-name').style.display = 'block';
            document.getElementById('edit-clinic-address').style.display = 'block';
            document.getElementById('edit-clinic-phone').style.display = 'block';
            document.getElementById('edit-clinic-email').style.display = 'block';
            document.getElementById('edit-clinic-description').style.display = 'block';

            // Menampilkan tombol simpan dan menyembunyikan tombol edit
            document.querySelector('.edit-button').style.display = 'none';
            document.querySelector('.save-button').style.display = 'block';
        }

        function saveProfile() {
            // Menyimpan data yang diperbarui
            document.getElementById('clinic-name').textContent = document.getElementById('edit-clinic-name').value;
            document.getElementById('clinic-address').textContent = document.getElementById('edit-clinic-address').value;
            document.getElementById('clinic-phone').textContent = document.getElementById('edit-clinic-phone').value;
            document.getElementById('clinic-email').textContent = document.getElementById('edit-clinic-email').value;
            document.getElementById('clinic-description').textContent = document.getElementById('edit-clinic-description').value;

            // Menyembunyikan input fields dan menampilkan teks profil
            document.getElementById('edit-clinic-name').style.display = 'none';
            document.getElementById('edit-clinic-address').style.display = 'none';
            document.getElementById('edit-clinic-phone').style.display = 'none';
            document.getElementById('edit-clinic-email').style.display = 'none';
            document.getElementById('edit-clinic-description').style.display = 'none';

            document.getElementById('clinic-name').style.display = 'block';
            document.getElementById('clinic-address').style.display = 'block';
            document.getElementById('clinic-phone').style.display = 'block';
            document.getElementById('clinic-email').style.display = 'block';
            document.getElementById('clinic-description').style.display = 'block';

            // Menyembunyikan tombol simpan dan menampilkan tombol edit kembali
            document.querySelector('.edit-button').style.display = 'block';
            document.querySelector('.save-button').style.display = 'none';
        }
    </script>
</body>
</html>
