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
            background-color:  #FF4641;
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
                    <a class="nav-link" href="{{ route('admin.manajemen') }}"><i class=""></i> Manajemen Lapangan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.lapangan') }}"><i class=""></i> Lapangan</a>
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

   

    {{-- <div class="container-fluid">
        <div class="row dashboard">
            <div class="col-md-3 sidebar">
                <a></a>
                <a></a>
                <a href="#"></a>
                <a href="{{ route('admin.manajemen') }}">Manajemen Lapangan</a>
                <a href="{{ route('admin.lapangan') }}">Lapangan</a>
              
            
            </div>
        </div>
    </div> --}}
    <div class="container mt-5" style="text-align: center">
        <div class="col" style="margin-right: 5px;">
            <h2 class="mb-4">Data Booking</h2>
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card mt-3">

            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                           
                            <th scope="col">Penyewa</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam Mulai</th>
                            <th scope="col">Jam Selesai</th>
                            <th scope="col">Status</th>
                            <th scope="col">Total Biaya</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($pemesanans as $data) 
                        @if ($data->lapangan->user_id == auth()->user()->getId())
                        <tr>
                           
                            <td>{{$data->nama_p}}</td>
                           
                            <td>{{$data->jlapangan->nama_lapangan}}</td>
                            <td>{{$data->tanggal}}</td>
                            
                            <td>{{$data->jam_m}}</td>
                            <td>{{$data->jam_s}}</td>
                           
                            <td>{{$data->status}}</td>
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
                                <form action="{{route('konfirmasi', $data->id)}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{route('hapus', $data->id)}}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>

        </html>