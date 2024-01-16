<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            /* Add this to remove default margin */
        }

        .dashboard {
            display: flex;
            margin-top: 50px;
        }

        .navbar {
            z-index: 1;
            background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
        }
        .navbar.fixed-top {
            position: fixed;
            top: 0;
            width: 100%;
        }

       
        .main-content {
            flex: 1;
            padding: 20px;
            margin-left: 250px;
        }

        .card {
            margin-bottom: 20px;
        }

        .logout-btn {
            margin-top: 20px;
        }

        /* Custom Styles for the Form */
        .form-container {
            max-width: 800px;
            margin: 50px auto;
            margin-top: 10%
        }

        /* Optional: Add some spacing to form elements */
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
              
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    

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
            <div class="col">
                <div class="form-container">
                    <div class="card mx-auto">
                        <div class="card-body">
                            <h5 class="card-title text-center">Tambah Data
                                Lapangan</h5>
                            <form action="{{ route('posttambahLapangan') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-4">
                                    <label hidden class="text-secondary mb-2">Pemilik Lapangan</label>
                                    <input hidden type="text" class="form-control border border-secondary form-control"
                                        name="nama" required value="{{ auth()->user()->getId() }}">
                                    <span class="text-danger">
                                        @error('nama_lapangan')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    
                                </div><br>
                                <div class="form-group mt-4">
                                    <label class="text-secondary mb-2">Jenis Lapangan</label>
                                    <select class="form-control border border-secondary form-control" name="jenis_lapangan" required>
                                        <option value="badminton" @if(old('jenis_lapangan') == 'badminton') selected @endif>Badminton</option>
                                        <option value="futsal" @if(old('jenis_lapangan') == 'futsal') selected @endif>Futsal</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('jenis_lapangan')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                                
                                <div class="form-group mt-1">
                                    <label class="text-secondary mb-2">Nama Lapangan</label>
                                    <input type="text" class="form-control border border-secondary form-control"
                                        name="nama_lapangan" required value="{{ old('nama_lapangan') }}">
                                    <span class="text-danger">
                                        @error('nama_lapangan')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div><br>
                                <div class="form-group mt-1">
                                    <label class="text-secondary mb-2">Deskripsi</label>
                                    <input type="text" class="form-control border border-secondary form-control"
                                        name="deskripsi" required value="{{ old('deskripsi') }}">
                                    <span class="text-danger">
                                        @error('deskripsi')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div><br>
                                <div class="form-group mt-1">
                                    <label class="text-secondary mb-2">Harga Sewa</label>
                                    <input type="text" class="form-control border border-secondary form-control"
                                        name="harga_sewa" required value="{{ old('harga_sewa') }}">
                                    <span class="text-danger">
                                        @error('harga_sewa')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div><br>
                                <div class="form-group mt-1">
                                    <label class="text-secondary mb-2">Lokasi</label>
                                    <input type="text" class="form-control border border-secondary form-control"
                                        name="lokasi" required value="{{ old('lokasi') }}">
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

                                <button type="submit" class="btn btn-success mt-5">Tambah Data Lapangan</button>
                            </form>

                        </div>


                    </div>
                </div>
            </div><br><br><br><br>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
