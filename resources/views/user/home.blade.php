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
            margin-right: 30px;
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

        .split-container {
            display: flex;
        }

        .left-side {
            flex: 1;
            padding: 20px;
            background-color: #fff;
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

        .form-inline .form-control::placeholder {
            color: #6c757d;
        }

        .form-inline .btn-outline-light {
            color: #fff;
        }

        .form-inline .btn-outline-light:hover {
            color: #007bff;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-top: 20px;
        background: linear-gradient(45deg, #8B0000, #5A0303, #630808);
        color: #fff;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .landing-btn-container {
        position: absolute;
        top: 20px;
        right: 20px;
        /* Adjust the top and right values as needed */
    }

    .landing-page {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .landing-content {
        max-width: 800px;
        /* Adjust the max-width as needed */
        text-align: left;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 0 auto;
        /* Center the content horizontally */
    }

    .landing-text {
        max-width: 400px;
        /* Adjust the max-width as needed */
        text-align: left;
        /* Add this line to align text to the left */
        margin-right: 200px;
        margin-top: 50px;
    }

    .landing-title {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 20px;
        margin-right: 50px;
        color: rgb(157, 22, 22);
    }

    .landing-description {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    .landing-img {
        max-width: 200px;
        /* Adjust the max-width as needed */
        margin-top: 80px;
        /* Adjust the top margin as needed */
    }
    .landing-text {
    display: flex;
    align-items: center; /* Posisikan elemen secara vertikal di tengah */
}

.landing-img img {
    margin-right: 100px; /* Atur margin antara gambar dan teks */
}



    .landing-btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        color: #fff;
        background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .landing-btn:hover {
        background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
        color: #fff;
    }

    .landing-content {
            max-width: 1200px; /* Tambahkan lebar maksimum untuk konten agar tetap terlihat baik */
            margin: 0 auto; /* Pusatkan konten horizontal */
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .landing-text {
            max-width: 400px; /* Sesuaikan lebar teks agar tidak terlalu lebar */
        }

        .landing-title {
            font-size: 3rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .landing-description {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .landing-img img {
            max-width: 100%;
            /* Lebar maksimum gambar agar tidak melebihi parent-nya */
            border-radius: 8px;
            margin-right: 150px; /* Atur margin kiri agar terpisah dari teks */
        }
        /* Other styles ... */

.custom-image-container {
    margin-left: 50px; /* Adjust the left margin as needed */
    margin-right: 50px; /* Adjust the right margin as needed */
    margin-top: 50px; /* Add some top margin to create space */
    margin-bottom: 50px; /* Add some bottom margin to create space */
}

/* Other styles ... */


    
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
                        <a class="nav-link" href="{{ route('user.futsal') }}"><i
                                class="fas fa-futbol"></i> Futsal</a>
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

    <div class="container mt-5">
        <h2 class="text-center">Ayo Sewa Sekarang!</h2>
    </div>

    <div class="container">
        <div id="carouselExampleDark" class="carousel carousel-dark slide mb-4">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="500">
                    <img src="../img/g6.jpg" class="d-block w-100" alt="Third Slide" style="width: 100%; height: 600px;">
                </div>
                <div class="carousel-item" data-bs-interval="500">
                    <img src="../img/g5.jpg"  class="d-block w-100" alt="Third Slide" style="width: 100%; height: 600px;">
                </div>
                <div class="carousel-item" data-bs-interval="500" >
                    <img src="../img/g6.jpg"  class="d-block w-100" alt="Third Slide" style="width: 100%; height: 600px;">
                </div>
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="landing-page">
            <div class="landing-content">
                <div class="landing-text">
                    {{-- <div class="landing-img"> --}}
                        <img src="../img/bg1.png" style="max-width: 150%" m alt="" />
                    </div>
                    <div>
                        <h1 class="landing-title">Lapang.Id</h1>
                        <p class="landing-description">
                            Ayo Sewa lapangan dengan mudah dengan Lapang.Id
                        </p>
                    </div>
                </div>
                <div class="landing-img">
                    <img src="../img/apk.png" style="max-width: 100%" alt="" />
                </div>
                <img src="../img/bg2.png" style="max-width: 30%" m alt="" />
            </div>
        </div>
        
        
        <div class="row mt-3 justify-content-center">
            <div class="custom-image-container">
                <img src="../img/bg4.png" style="max-width: 150%" alt="" />
            </div>
<div>
        </div>

        <div>
        </div>


        <div class="container">
            <div class="row mt-3 justify-content-center">
                @foreach ($data as $lapangan)
                @if ($lapangan->jenis_lapangan =='futsal')
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/' . $lapangan->gambar) }}" class="card-img-top" alt="cover lapangan">
                            <div class="card-body">
                                <p class="fw-bold">Jenis Lapangan: {{ $lapangan->jenis_lapangan }}</p>
                                <p class="fw-bold">Nama Lapangan: {{ $lapangan->nama_lapangan }}</p>
                                <p class="fw-bold">Deskripsi: {{ $lapangan->deskripsi }}</p>
                                <p class="fw-bold">Harga Sewa: {{ $lapangan->harga_sewa }}</p>
                                <p class="fw-bold">Lokasi: {{ $lapangan->lokasi }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('user.futsal',  $lapangan->id) }}" class="btn btn-primary">Booking</a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="container">
            <div class="row mt-3 justify-content-center">
                @foreach ($data as $lapangan)
                @if ($lapangan->jenis_lapangan =='badminton')
                    <div class="col-12 col-md-4 mb-4">
                        <div class="card">
                            <img src="{{ asset('images/' . $lapangan->gambar) }}" class="card-img-top" alt="cover lapangan">
                            <div class="card-body">
                                <p class="fw-bold">Jenis Lapangan: {{ $lapangan->jenis_lapangan }}</p>
                                <p class="fw-bold">Nama Lapangan: {{ $lapangan->nama_lapangan }}</p>
                                <p class="fw-bold">Deskripsi: {{ $lapangan->deskripsi }}</p>
                                <p class="fw-bold">Harga Sewa: {{ $lapangan->harga_sewa }}</p>
                                <p class="fw-bold">Lokasi: {{ $lapangan->lokasi }}</p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ route('user.badminton',  $lapangan->id) }}" class="btn btn-primary">Booking</a>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
{{--         
            @foreach ($data as $lapangan)
            @if ($lapangan->jenis_lapangan =='Futsal')
                <div class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/' . $lapangan->gambar) }}" class="card-img-top" alt="cover lapangan">
                        <div class="card-body">
                            <p class="fw-bold">Jenis Lapangan : {{ $lapangan->jenis_lapangan }}</p>
                            <p class="fw-bold">Nama Lapangan : {{ $lapangan->nama_lapangan }}</p>
                            <p class="fw-bold">Deskripsi : {{ $lapangan->deskripsi }}</p>
                            <p class="fw-bold">Harga Sewa : {{ $lapangan->harga_sewa }}</p>
                            <p class="fw-bold">Lokasi : {{ $lapangan->lokasi }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <!-- Tambahkan kelas text-center di sini -->
                            <a href="{{ route('user.futsal',  $lapangan->id) }}" class="btn btn-primary">Booking</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        <div class="row mt-3 justify-content-center">
        
            @foreach ($data as $lapangan)
            @if ($lapangan->jenis_lapangan =='Badminton')
                <div class="col-12 col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/' . $lapangan->gambar) }}" class="card-img-top" alt="cover lapangan">
                        <div class="card-body">
                            <p class="fw-bold">Jenis Lapangan : {{ $lapangan->jenis_lapangan }}</p>
                            <p class="fw-bold">Nama Lapangan : {{ $lapangan->nama_lapangan }}</p>
                            <p class="fw-bold">Deskripsi : {{ $lapangan->deskripsi }}</p>
                            <p class="fw-bold">Harga Sewa : {{ $lapangan->harga_sewa }}</p>
                            <p class="fw-bold">Lokasi : {{ $lapangan->lokasi }}</p>
                        </div>
                        <div class="card-footer text-center">
                            <!-- Tambahkan kelas text-center di sini -->
                            <a href="{{ route('user.badminton',  $lapangan->id) }}" class="btn btn-primary">Booking</a>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        
        </div>
    </div> --}}
        
        </div>
    </div>
    


        <div class="row mt-4">
            <div class="col-md-4 mx-auto">
                <div class="lapangan-card">
                    <div class="lapangan-details text-center">
                        <h5>Unduh Aplikasi</h5>
                        <a href="#" class="btn btn-primary btn-sewa"><i class="fab fa-google-play"></i> GooglePlay</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mx-auto">
                <div class="lapangan-card">
                    <div class="lapangan-details text-center">
                        <h5>Hubungi Kami</h5>
                        <p>
                            WhatsApp: <a href="https://wa.me/082287079314" target="_blank"><i
                                    class="fab fa-whatsapp"></i> 0831-9396-1035</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container">
            <p>&copy; lapangid2023@gmail.com</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
