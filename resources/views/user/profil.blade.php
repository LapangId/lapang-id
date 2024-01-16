<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Profil Pengguna</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #495057;
            font-family: 'Arial', sans-serif;
            padding-top: 20px;
        }

        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 10px;
            text-align: center;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            color: #343a40;
        }

        .table th,
        .table td {
            padding: 10px;
            text-align: left;
            border-top: 1px solid #dee2e6;
        }

        .table th {
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="lapang-id" style="margin-right: 30px;">
            <i class="fas fa-tachometer-alt"></i>
            <a class="navbar-brand" href="#">Lapang.ID</a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto mr-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.futsal') }}"><i class="fas fa-user"></i> Futsal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.badminton') }}"><i class="fas fa-user"></i> Badminton</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.transaksi') }}"><i class="fas fa-user"></i> Transaksi </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="profile-container">
        <div class="profile-avatar">
            <img src="path/to/avatar.jpg" alt="User Avatar">
        </div>
        <div class="profile-name text-center">
            <h2 class="text-2xl font-extrabold text-primary">{{$user->username}}</h2>
        </div>
        <table class="table">
            <tr>
                <th>
                    <div class="my-2 px-2 py-3 border border-gray-200 rounded flex space-x-2 items-center">
                        <div>
                            <span class="text-3xl text-primary"><i class="fas fa-calendar-alt"></i></span>
                        </div>
                        <!-- ... (isi kolom pertama sesuai kebutuhan) ... -->
                    </div>
                </th>
                <th>
                    <div class="my-2 px-2 py-3 border border-gray-200 rounded flex space-x-2 items-center">
                        <div>
                            <span class="text-3xl text-primary"><i class="fas fa-envelope"></i></span>
                        </div>
                        <div>
                            <p class="text-gray-900">Email</p>
                            <p class="text-sm text-gray-500">{{ $user->email }}</p>
                        </div>
                        <div>
                            <p class="text-gray-900">No hp</p>
                            <p class="text-sm text-gray-500">{{ $user->no_hp }}</p>
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th>
                   
                        <!-- ... (isi kolom ketiga sesuai kebutuhan) ... -->
                    </div>
                </th>
                <th></th> <!-- Kolom kedua pada baris ini kosong, sesuaikan dengan kebutuhan Anda -->
            </tr>
        </table>
    </div>
</body>

</html>
