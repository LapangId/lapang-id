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
                            <form action="{{ route('posttambahjLapangan') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mt-4">
                                    <label class="text-secondary mb-2">Nama Lapangan</label>
                                    <select name="lapangan_id" class="form-control border border-secondary">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->nama_lapangan }}</option>
                                        @endforeach
                                    </select>
                                </div><br>
                                <div class="form-group mt-4">
                                    <label class="text-secondary mb-2">Lapangan</label>
                                    <input type="text" class="form-control border border-secondary form-control"
                                        name="nama_lapangan" required="{{ old('nama_lapangan') }}">
                                    <span class="text-danger">
                                        @error('nama_lapangan')
                                            {{ $message }}
                                        @enderror
                                    </span>
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
