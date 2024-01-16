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
                    <a class="nav-link" href="{{ route('admin.home') }}"><i class="fas fa-home"></i> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.aProfile') }}"><i class="fas fa-home"></i> Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
        <div class="body-wrapper">
            <!-- Header Start -->
           
                      
                </nav>
            </header>
            
        </div>
    </nav>

 
                  
               
    

    <div class="container-fluid">
        <div class="row dashboard">
            <div class="col-md-3 sidebar">
                <a></a>
                <a></a>
                <a></a>
                <a href="#"></a>
                <a href="{{ route('admin.lapangan') }}">Lapangan</a>
                <a href="{{ route('admin.manajemen') }}">Manajemen Lapangan</a>
                <a href="{{ route('admin.pemesanan') }}">Pemesanan</a>
    
            </div>

            <div class="col-md-9 main-content">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered mt-3">
                        <thead class=" ">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Level</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $users)
                            <tr>
                                <th scope="row">{{ $index + $data->firstItem() }}</th>
                                <td>{{ $users->name }}</td>
                                <td>{{ $users->email }}</td>
                                <td>{{ $users->level }}</td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="/editAdmin/{{ $users->id }}">Edit</a>
                                    <a class="btn btn-danger btn-sm" href="/deleteAdmin/{{ $users->id }}">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">No users found</td>
                            </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>