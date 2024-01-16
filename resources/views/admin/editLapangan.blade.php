<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        @media (max-width: 767px) {
            .dashboard {
                flex-direction: column;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar {
                position: relative;
                width: 100%;
                margin-left: 0;
                margin-bottom: 20px;
            }

            .navbar-toggler {
                margin-right: 15px;
            }

            .navbar {
                padding-right: 0;
            }

            .card {
                margin-right: 0;
            }

            .btn-success {
                margin-right: 0;
                margin-left: 0;
            }
        }

        body {
            background-color: #f8f9fa;
            margin: 0;
        }

        .dashboard {
            display: flex;
            margin-top: 50px;
        }

        .navbar {
            z-index: 1;
            background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
            color: white;
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            top: 0;
            bottom: 0;
        }

        .sidebar h2 {
            margin-bottom: 50px;
            text-align: center;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #FF4641
        }

        .main-content {
            flex: 1;
            padding: 20px;
            margin-left: 250px;
        }

        .card {
            margin-bottom: 20px;
            margin-right: 250px;
        }

        .logout-btn {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.lapangan') }}"><i class=""></i>Lapangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.manajemen') }}"><i class=""></i>Manajemen Lapangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.pemesanan') }}"><i class=""></i> Pemesanan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="col">
        <div class="row mt-4">
            <div class="col"></div>
            <div class="col-6">
                <form action="{{ route('admin.lapangan') }}" method="GET">
                    @csrf
                   
                </form>
            </div>
            <div class="col"></div>
        </div>
       
   
        @if (Session::get('success'))
        <div class="alert alert-success">
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::get('failed'))
        <div class="alert alert-danger">
            <strong>Failed!</strong> {{ Session::get('failed') }}
        </div>
    @endif

    <div class="row">
        <div class="col" style="margin-left: 300px;">
            <div class="card mt-4" style="width: 800px">
                <div class="card-body">
                    <h5 class="card-title text-center">Update Data Lapangan</h5>
                    <form action="{{ route('posteditLapangan', ['id' => $data->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Jenis Lapangan</label>
                            <input type="text" class="form-control border border-secondary form-control"
                                name="jenis_lapangan" required value="{{ $data->jenis_lapangan }}">
                            <span class="text-danger">
                                @error('jenis_lapangan')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div><br>
                        <div class="form-group mt-1">
                            <label class="text-secondary mb-2">Nama Lapangan</label>
                            <input type="text" class="form-control border border-secondary form-control"
                                name="nama_lapangan" required value="{{ $data->nama_lapangan }}">
                            <span class="text-danger">
                                @error('nama_lapangan')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div><br>
                        <div class="form-group mt-1">
                            <label class="text-secondary mb-2">Deskripsi</label>
                            <input type="text" class="form-control border border-secondary form-control"
                                name="deskripsi" required value="{{ $data->deskripsi }}">
                            <span class="text-danger">
                                @error('deskripsi')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div><br>
                        <div class="form-group mt-1">
                            <label class="text-secondary mb-2">Harga Sewa</label>
                            <input type="text" class="form-control border border-secondary form-control"
                                name="harga_sewa" required value="{{ $data->harga_sewa }}">
                            <span class="text-danger">
                                @error('harga_sewa')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div><br>
                        <div class="form-group mt-1">
                            <label class="text-secondary mb-2">Lokasi</label>
                            <input type="text" class="form-control border border-secondary form-control"
                                name="lokasi" required value="{{ $data->lokasi }}">
                            <span class="text-danger">
                                @error('lokasi')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div><br>
                        <div class="form-group mt-1">
                            <label class="text-secondary mb-2">Gambar</label>
                            <input class="form-control" type="file" name="gambar">
                            <div class="form-text">Maksimal ukuran
                                gambar lapangan 5MB
                            </div>
                        </div><br>
                        <img class="mt-3" style="width: 100px" src="{{ asset('/images/' . $data->gambar) }}"
                            alt="cover lapangan">
                </div><button type="submit" class="btn btn-success mt-5">Update Data Lapangan</button>
                </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>