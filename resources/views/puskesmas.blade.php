<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puskesmas Landing Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-image: url('asset/Selamat datang.png'); /* Ganti dengan path foto background */
            background-size: cover;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            text-align: center;
            padding: 40px;
            background-color: rgba(0, 0, 0, 0.6); /* Transparan hitam untuk menambah kontras dengan background */
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #58a6ff;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            margin: 10px;
            font-size: 1.1em;
            color: white;
            background-color: #00aaff;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #0099cc;
            transform: scale(1.05);
        }

        .btn:active {
            background-color: #0088b3;
            transform: scale(0.98);
        }

        .footer {
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
            font-size: 0.9em;
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Puskesmas</h1>
        <p>Untuk melanjutkan, silakan masuk atau daftar.</p>
        <a href="login.html" class="btn">Login</a>
        <a href="daftar.html" class="btn">Daftar</a>
    </div>
    <div class="footer">
        <p>&copy; 2025 Puskesmas - Semua Hak Dilindungi</p>
    </div>
</body>
</html>
