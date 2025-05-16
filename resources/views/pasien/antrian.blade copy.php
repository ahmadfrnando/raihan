<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR ANTRIAN ANDA</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #009688, #004d40);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
            color: white;
        }

        .form-container,
        .thank-you-container {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);
            width: 100%;
            /* max-width: 400px; */
            text-align: center;
        }

        .form-container h1,
        .thank-you-container h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            border: none;
            padding: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #333;
        }

        .btn-submit,
        .btn-dashboard {
            background-color: #007bff;
            color: white;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 15px;
        }

        /* .btn-back {
            background-color: #dc3545;
            color: white;
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-top: 15px;
            font-size: 16px;
        } */

        .btn-submit:hover,
        .btn-dashboard:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @if (session('success'))
    <div id="thank-you-section" class="thank-you-container">
        <h1>Terima Kasih</h1>
        <p>{{ session('success') }}</p>
        <a href="{{ route('pasien.dashboard') }}" class="btn-dashboard">Kembali ke Dashboard</a>
    </div>
    @else

    <div id="form-section" class="form-container" style="padding: 25px; margin-bottom: 25px;">
        @if (session('error'))
        <div style="background-color:rgb(236, 31, 48); border-radius: 5px; padding: 10px; margin-bottom: 15px;">
            {{ session('error') }}
        </div>
        @endif
        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 15px; margin-bottom: 25px;">
            @foreach($antrian as $a)
            <div class="card text-center" style="flex: 0 0 calc(50% - 7.5px); padding: 25px; border-radius: 15px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.4);">
                <h5 class="card-header" style="background-color: #0056b3; color: white; border-radius: 15px 15px 0 0;">Nomor Antrian Anda</h5>
                <div class="card-body">
                    <h5 class="card-title" style="font-size: 26px; font-weight: bold; margin-bottom: 15px;">Nomor Antrian: <span id="nomorAntrian" style="color: #0056b3; font-size: 26px; font-weight: bold;">{{ $a->nomor_antrian }}</span></h5>
                    <p class="card-text" style="font-size: 18px; margin-bottom: 5px;">Tanggal Daftar: {{ date('d-m-Y', strtotime($a->created_at)) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <a href="{{ route('pasien.dashboard') }}" class="btn btn-primary" style="width: 100%; padding: 10px; border-radius: 5px; font-size: 16px; margin-top: 15px;">Kembali ke Dashboard</a>
    </div>
    @endif
</body>

</html>