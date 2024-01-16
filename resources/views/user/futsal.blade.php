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
            margin-left: 15px;
            /* Mengurangi margin */
            display: flex;
            align-items: center;
            font-size: 1.5em;
            font-weight: bold;
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
        }

        .lapangan-details {
            padding: 20px;
        }

        .btn-sewa {
            background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
            color: #fff;
        }

        .content {
            margin-top: 70px;
        }

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
                    <a class="nav-link" href="{{ route('user.badminton') }}"><i
                            class="fas fa-shuttlecock"></i> Badminton</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.transaksi') }}"><i
                            class="fas fa-file-invoice-dollar"></i> Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><i
                            class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



    <div class="container content">
        <div class="row mt-3">
            <div class="col">
                <h4 class="text-secondary">Selamat Datang <span class="fw-semibold">{{ Auth::user()->name }}</span></h4>
            </div>
        </div>

        <div class="row mt-3 justify-content-center">
            @foreach ($data as $lapangan)
            @if ($lapangan->jenis_lapangan =='futsal')
                <div class="col-12 col-md-4 mb-4">
                    <div class="card lapangan-card">
                        <img src="{{ asset('images/' . $lapangan->gambar) }}" class="card-img-top lapangan-img"
                            alt="cover lapangan">
                        <div class="card-body lapangan-details">
                            <p class="fw-bold">Jenis Lapangan: {{ $lapangan->jenis_lapangan }}</p>
                            <p class="fw-bold">Nama Lapangan: {{ $lapangan->nama_lapangan }}</p>
                            <p class="fw-bold">Deskripsi: {{ $lapangan->deskripsi }}</p>
                            <p class="fw-bold">Harga Sewa: {{ $lapangan->harga_sewa }}</p>
                            <p class="fw-bold">Lokasi: {{ $lapangan->lokasi }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{ route('user.booking',  $lapangan->id) }}" class="btn btn-primary btn-sewa">Booking</a>
                        </div>
                    </div>
                </div>
            @endif
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
