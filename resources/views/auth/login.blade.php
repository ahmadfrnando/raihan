<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Puskesmas</title>
    <!-- Menggunakan Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            /* background: linear-gradient(135deg, #00bcd4, #0097a7); */
            background-image: url('img/bg.jpg');
            /* background-image: url('asset/Selamat datang.png'); */
            background-size: cover;
            height: 100vh;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            margin: 0;
        }

        .login-container {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: bold;
        }

        .form-control {
            border-radius: 50px;
            padding: 15px;
            margin-bottom: 15px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid #ffffff;
        }

        .form-control:focus {
            box-shadow: 0 0 5px 2px #00bcd4;
            border-color: #00bcd4;
        }

        .btn {
            background-color: #00796b;
            color: white;
            border-radius: 50px;
            padding: 15px;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn:hover {
            background-color: #004d40;
            transform: translateY(-5px);
        }

        .btn:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <div class="login-container">
        @if (session('success'))
        <div style="background-color:rgb(3, 146, 84); border-radius: 5px; padding: 10px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
        @endif
        @if (session('error'))
        <div style="background-color:rgb(236, 31, 48); border-radius: 5px; padding: 10px; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
        @endif
        <h2>Login ke Puskesmas</h2>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <input type="text" class="form-control" name="username" placeholder="Username" value="{{ old('username') }}" required>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <button type="submit" class="btn w-100">Login</button>
        </form>

        <p class="mt-3">Belum punya akun? <a href="{{ route('register') }}" class="text-white">Daftar di sini</a></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>