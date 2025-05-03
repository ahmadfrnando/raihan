<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat</title>
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

        .sidebar ul li a:hover,
        .sidebar ul li a.active {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Puskesmas Binjai Estate</h2>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('admin.pasien') }}">Data Pasien</a></li>
            <li><a href="{{ route('admin.obat') }}" class="active">Data Obat</a></li>
            <li><a href="{{ route('admin.dokter') }}">Dokter</a></li>
            <li><a href="{{ route('admin.jadwal-dokter') }}">Jadwal Dokter</a></li>
            <li><a href="{{ route('admin.ambulans') }}">Pengajuan Ambulance</a></li>
            <li><a href="{{ route('admin.profil') }}">Profil</a></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
        <img src="https://via.placeholder.com/200x150" alt="Sistem Informasi Rekam Medis">
    </div>
    <div class="container">
        <h1>Data Obat</h1>
        <div class="button-container">
            <button class="button" onclick="addRow()">Tambah Obat</button>
        </div>
        <table id="medicineTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Obat</th>
                    <th>Stok</th>
                    <th>Jenis</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Paracetamol</td>
                    <td>100</td>
                    <td>Tablet</td>
                    <td class="actions">
                        <button class="edit" onclick="editRow(this)">Edit</button>
                        <button class="delete" onclick="deleteRow(this)">Hapus</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Amoxicillin</td>
                    <td>50</td>
                    <td>Kapsul</td>
                    <td class="actions">
                        <button class="edit" onclick="editRow(this)">Edit</button>
                        <button class="delete" onclick="deleteRow(this)">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script>
        function addRow() {
            const table = document.getElementById("medicineTable").getElementsByTagName("tbody")[0];
            const newRow = table.insertRow();

            const noCell = newRow.insertCell(0);
            const nameCell = newRow.insertCell(1);
            const stockCell = newRow.insertCell(2);
            const typeCell = newRow.insertCell(3);
            const actionsCell = newRow.insertCell(4);

            noCell.textContent = table.rows.length;
            nameCell.textContent = "Nama Obat Baru";
            stockCell.textContent = "0";
            typeCell.textContent = "Jenis";

            actionsCell.innerHTML = `
                <button class="edit" onclick="editRow(this)">Edit</button>
                <button class="delete" onclick="deleteRow(this)">Hapus</button>
            `;
        }

        function editRow(button) {
            const row = button.parentElement.parentElement;
            const cells = row.getElementsByTagName("td");

            for (let i = 1; i < cells.length - 1; i++) {
                const cell = cells[i];
                const input = document.createElement("input");
                input.value = cell.textContent;
                input.type = "text";
                cell.textContent = "";
                cell.appendChild(input);
            }

            button.textContent = "Simpan";
            button.onclick = function() {
                saveRow(button);
            };
        }

        function saveRow(button) {
            const row = button.parentElement.parentElement;
            const cells = row.getElementsByTagName("td");

            for (let i = 1; i < cells.length - 1; i++) {
                const cell = cells[i];
                const input = cell.getElementsByTagName("input")[0];
                if (input) {
                    cell.textContent = input.value;
                }
            }

            button.textContent = "Edit";
            button.onclick = function() {
                editRow(button);
            };
        }

        function deleteRow(button) {
            const row = button.parentElement.parentElement;
            row.remove();

            // Update numbering
            const table = document.getElementById("medicineTable").getElementsByTagName("tbody")[0];
            for (let i = 0; i < table.rows.length; i++) {
                table.rows[i].cells[0].textContent = i + 1;
            }
        }
    </script>
</body>

</html>