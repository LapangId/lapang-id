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
        }

        .dashboard {
            display: flex;
            margin-top: 50px;
        }

        .navbar {
            z-index: 1;
            background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
        }

        .navbar-toggler {
            margin-right: 0;
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

        .sidebar ul {
            padding: 0;
            list-style: none;
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

        @media (max-width: 767px) {
            .dashboard {
                flex-direction: column;
            }

            .main-content {
                margin-left: 0;
                padding: 20px;
            }

            .sidebar {
                position: relative;
                width: 100%;
                margin-left: 0;
                margin-bottom: 20px;
            }
        }

        .col {
        margin-left: auto; /* Menyesuaikan agar geser ke samping kanan */
        margin-right: 1000px; /* Sesuaikan sesuai kebutuhan */
    }

    .card {
        width: auto;
        margin-left: -10px; /* Sesuaikan sesuai kebutuhan */
        margin-right: -10px; /* Sesuaikan sesuai kebutuhan */
    }
        .card-body {
            padding: 10px; /* Sesuaikan sesuai kebutuhan */
        }

        .table-responsive {
            margin-top: -5px; /* Sesuaikan sesuai kebutuhan */
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
                    <a class="nav-link" href="{{ route('admin.lapangan') }}"><i class=""></i> Lapangan</a>
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
                <form action="{{ route('admin.manajemen') }}" method="GET">
                    @csrf
                </form>
            </div>
            <div class="col"></div>
        </div>
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col-2">
                <a class="btn btn-success" href="{{route('admin.tambahjLapangan')}}"
                    style="text-decoration: none; margin-right: 250px">Tambah Lapangan +</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col" style="margin-right: 100px;">
                <div class="card">
                    <div class="Card-body">
                        <div class="table-responsive">
                            <table class="table" style="margin-top: 5px">
                                <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Lapangan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($data as $lapangan)
                                        @if ($lapangan->lapangan->user_id == auth()->user()->getId())
                                            <tr>
                                                <td scope="row"></td>
                                                <td>{{ $lapangan->nama_lapangan }}</td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a class="btn btn-outline-warning"
                                                            href="/admin/editjLapangan/{{ $lapangan->id }}">Edit</a>
                                                        <form
                                                            action="{{route('admin.deletejLapangan', $lapangan->id)}}"
                                                            method="post">
                                                            @csrf
                                                            <button type="submit"
                                                                class="btn btn-danger ml-2">Hapus</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div><br><br><br>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
