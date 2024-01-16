<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha384-..." crossorigin="anonymous">

    <title>Penyewaan Lapangan</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #495057;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding-top: 56px;
            /* Tinggi navbar */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        @media (max-width: 767px) {
            .lapang-id {
                margin-right: 0;
                margin-bottom: 10px;
                text-align: center;
            }

            .navbar-collapse {
                text-align: center;
            }

            .landing-content {
                flex-direction: column-reverse;
                align-items: center;
                text-align: center;
            }

            .landing-text,
            .landing-img {
                margin-right: 0;
                margin-bottom: 20px;
            }

            .landing-img img {
                margin-right: 0;
            }

            .custom-image-container {
                margin-left: 0;
                margin-right: 0;
                margin-top: 0;
                margin-bottom: 0;
            }
        }


        .navbar {
            background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
            /* Warna merah */
            color: #fff;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
        }

        .container {
            margin-top: 20px;
            flex-grow: 1;
        }

        .lapang-id {
            margin-left: 70px;
            /* Geser tulisan "Lapang.ID" ke kiri */
            display: flex;
            align-items: center;
            font-size: 1.5em;
            /* Ukuran font yang lebih besar */
            font-weight: bold;
            /* Tebal */
            font-family: 'Arial', sans-serif;
            /* Menggunakan font Arial atau font sans-serif sebagai cadangan */
        }

        .lapang-id i {
            margin-right: 5px;
        }

        .lapangan-card {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
            margin-top: 50px;
        }

        .lapangan-card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .lapangan-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
            margin-top: 50px;
        }

        .lapangan-details {
            padding: 20px;
        }

        .btn-sewa {
            background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
            color: #fff;
        }

        /* Tambahkan gaya untuk sisi kiri dan sisi kanan */
        .split-container {
            display: flex;
        }

        .left-side {
            flex: 1;
            padding: 20px;
            background-color: #fff;
            /* Warna latar belakang */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .right-side {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .right-side img {
            max-width: 100%;
            border-radius: 8px;
        }

        .logo-container {
            position: absolute;
            bottom: 20px;
            left: 20px;
        }

        .logo-container img {
            max-width: 100px;
        }

        .form-inline .input-group {
            width: 300px;
            /* Sesuaikan lebar formulir sesuai kebutuhan */
        }

        .form-inline .form-control {
            width: 100%;
        }

        .form-inline .input-group-append {
            display: flex;
            align-items: center;
        }

        .form-inline .btn {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        /* Gaya tambahan sesuai preferensi Anda */
        .form-inline .form-control::placeholder {
            color: #6c757d;
            /* Warna placeholder */
        }

        .form-inline .btn-outline-light {
            color: #fff;
        }

        .form-inline .btn-outline-light:hover {
            color: #007bff;
            /* Warna saat hover */
        }

        /* Style untuk footer */
        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand lapang-id" href="#">
              
                Lapang.ID
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.home') }}"><i class="fas fa-home"></i> Home</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.futsal') }}"><i
                                class="fas fa-futbol"></i> Futsal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.badminton') }}"><i
                                class="fas fa-shuttlecock"></i> Badminton</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i
                                class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    
    
        <div 
    <div class="container content">
        @if (Session::get('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::get('error'))
            <div class="alert alert-danger">
                <strong>Failed!</strong> {{ Session::get('error') }}
            </div>
        @endif
        <div class="col-md-9 main-content">
            <div class="col" style="margin-left: 10px; margin-top: 80px;">
                <h2 style="text-align: center">Transaksi</h2>
            </div>
        <div class="row mt-3">
            <div class="col"style="margin-left: 10px; margin-top: 80px;">
                <table class="table">
                    <thead>
                        <tr>
                          
                            <th scope="col">Jenis</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($p as $data)
                        @if ($data->users_id == auth()->user()->getId())
                        <tr>
                          
                            <td>{{ $data->jlapangan->nama_lapangan }}</td>
                            <td>{{ $data->tanggal }}</td>

                            <td>{{ $data->status }}</td>
                            <td>
                                @if (
                                    is_numeric($data->jam_s) &&
                                    is_numeric($data->jam_m) &&
                                    is_numeric($data->lapangan->harga_sewa)
                                )
                                    @php
                                        $durasi_booking = $data->jam_s - $data->jam_m;
                                        $total_biaya = $durasi_booking * $data->lapangan->harga_sewa;
                                    @endphp
                                    {{ $total_biaya }}
                                @else
                             {{ $data->lapangan->harga_sewa }}
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{ route('user.cetakBukti', ['id' => $data->id]) }}" target="_blank"><i class="fas fa-print"></i>Cetak</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
