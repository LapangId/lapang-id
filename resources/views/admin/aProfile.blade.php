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

        <!-- Header Start -->
    </nav>
    </header>

    </div>
    </nav>


    <div class="container-fluid">
        <h1 class="mb-0">My Profile</h1>
        <div class="row dashboard">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <div class="img">
                                    @php
                                        $avatar = auth()
                                            ->user()
                                            ->getAvatar();
                                        $avatarPath = asset('images/img/default') . '/' . $avatar;
                                    @endphp
                                    <img class="img-circle border-3" style="max-width:100%"
                                        src="{{ $avatar == null ? asset('images/default.png') : $avatarPath }}"
                                        alt="Profile Photo">
                                </div>
                            </div>
                            <div class="col-2">
                                <h2 class="px-2">
                                    {{ auth()->user()->getFullname() }}
                                </h2>
                                <p class="px-2" style="margin-top: 0%">
                                    {{ auth()->user()->getEmail() }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1>My Lapangan</h1>
        <div class="row">
            @foreach ($data as $lapangan)
                @if ($lapangan->user_id == auth()->user()->getId())
                <div class="col-3">
                    <div class="card">
                            <img style="" src="{{ asset('/images/' . $lapangan->gambar) }}" alt="cover buku">
                        <div class="card-body">
                            <h2>{{ $lapangan->nama_lapangan }}</h3>
                                <p>{{ $lapangan->deskripsi }}</p>
                                <p>{{ $lapangan->lokasi}}</p>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="body-wrapper">

        <div class="container-fluid">

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>
