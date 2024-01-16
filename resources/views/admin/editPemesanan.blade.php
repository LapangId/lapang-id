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
                    <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row dashboard">
            <div class="col-md-3 sidebar">
                <a></a>
                <a></a>
                <a href="{{ route('admin.manajemen') }}">Manajemen Lapangan</a>
                <a href="{{ route('admin.pemesanan') }}">Pemesanan</a>
               
            </div>
        </div>
    </div>

        @if (Session::get('success'))
        <br>
        <div class="alert alert-success">
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>
        @endif
        @if (Session::get('failed'))
        <br>
        <div class="alert alert-danger">
            <strong>Failed!</strong> {{ Session::get('failed') }}
        </div>
        @endif

        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <h5 class="card-title text-center">Edit Data</h5>
                        <form action="/postEditPeminjaman/{{$data->id}}" method="POST">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Penyewa</label>
                                <select class="form-control border border-secondary form-control" name="idUser"
                                    required>
                                    <option value="">Lapangan</option>
                                    @foreach ($userList as $user)
                                    <option value="{{ $user->id }}" {{ $user->id == $data->id_user ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">
                                    @error('idUser')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>

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
                                <label class="text-secondary mb-2">Tanggal Pemesanan</label>
                                <input type="text" class="form-control border border-secondary form-control"
                                    name="tanggalPeminjaman" required value="{{ $data->tanggal_pinjam }}">
                                <span class="text-danger">
                                    @error('tanggalPeminjaman')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div><br>
                            <div class="form-group mt-1">
                                <label class="text-secondary">Hari</label><br>
                                <div class="form-check form-check-inline">

                                    <div class="form-group mt-1">
                                        <label class="text-secondary">Jam mulai</label><br>
                                        <div class="form-check form-check-inline"> <div class="form-group mt-1">
                                            
                                            
                                    <div class="form-group mt-1">
                                        <label class="text-secondary">Jam selesai</label><br>
                                        <div class="form-check form-check-inline"> <div class="form-group mt-1">
                                            

                                                <div class="form-group mt-1">
                                                    <label class="text-secondary">Durasi</label><br>
                                                    <div class="form-check form-check-inline">

                                                        
                                    <input class="form-check-input" type="radio" name="status"
                                        value="Belum Dikembalikan" @if ($data->status == 'Belum Dikembalikan') checked
                                    @endif>
                                    <label class="form-check-label" for="inlineRadio1">Belum Dibayar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status"
                                        value="Sudah Dikembalikan" @if ($data->status == 'Sudah Dikembalikan') checked
                                    @endif>
                                    <label class="form-check-label" for="inlineRadio2">Sudah Dibayar</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success mt-4">Update Data Pemesanan</button>
                        </form>
                    </div>
                </div>

            </div>
        </div><br><br><br><br>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>