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
        <div class="body-wrapper">
            <!-- Header Start -->
           
                     
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </header>
            
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
        <div class="row mt-5">
            <div class="col"></div>
            <div class="col"></div>
            <div class="col-2">
                <a class="btn btn-success" href="{{route('admin.tambahLapangan') }}"
                    style="text-decoration: none; margin-right: 100px">Tambah Data +</a>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col" style="margin-right: 90px;">
                <div class="card" style="width: 50rem;">
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- Tambahkan kelas table-responsive di atas -->
                            <table class="table" style="margin-top: 10px">
                                <thead>
                                    <tr>
                                       
                                        <th scope="col">Jenis Lapangan</th>
                                        <th scope="col">Nama Lapangan</th>
                                        <th scope="col">Harga Sewa</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    @foreach ($data as $index => $lapangan)
                                    @if ($lapangan->user_id == auth()->user()->getId())
                                        
                                    <tr>
                                        
                                        <td>{{ $lapangan->jenis_lapangan }}</td>
                                        <td>{{ $lapangan->nama_lapangan }}</td>
                                        <td>{{ $lapangan->harga_sewa }}</td>

                                        <td>
                                            <a class="btn btn-outline-warning"
                                                href="/admin/editLapangan/{{ $lapangan->id }}">Edit</a>
                                            <a class="btn btn-outline-danger"
                                                href="/admin/deleteLapangan/{{ $lapangan->id }}">Delete</a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
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