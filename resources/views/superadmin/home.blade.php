<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LapangId</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/logo.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYmE9iQC95/TN8E+STsYI0Lhj" crossorigin="anonymous">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        .body-wrapper {
            margin-left: 0; /* Set the margin to 0 for responsiveness */
            transition: margin-left 0.5s;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap; /* Allow cards to wrap to the next line on smaller screens */
            justify-content: space-between;
            margin: 20px; /* Adjust the margin as needed */
        }

        .card {
            width: 100%; /* Cards take full width on smaller screens */
            margin-bottom: 20px;
            border-radius: 15px;
        }

        .navbar-link {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .navbar-link .hide-menu {
            margin-top: 5px; /* Adjust the margin-top as needed */
        }
    </style>
</head>

<body>

    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <span class="text-nowrap">
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="./index.html" class="logo-img">
                        <img src="../img/logo.png" style="max-width: 70%" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                    <div style="margin-left: 50px; font-size: 20px;">Lapang.Id</div>
                </div>
            </span>
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('superadmin.home') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-layout-dashboard"></i>
                            </span>
                            <span class="hide-menu navbar-link">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('superadmin.dLapangan') }}" aria-expanded="false">
                            <span class="hide-menu navbar-link">Data Pemilik Lapangan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('superadmin.dPemesan') }}" aria-expanded="false">
                            <span class="hide-menu navbar-link">Data Pemesan</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('logout') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-login"></i>
                            </span>
                            <span class="hide-menu navbar-link">Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </aside>
        <!-- Sidebar End -->
        <!-- Main wrapper -->
        <div class="body-wrapper">
            <!-- Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- small box -->
            <div class="row">
                <div class="col-md-3 mb-3">
                    <!-- Your sidebar content goes here -->
                </div>
                <div class="card-container">
                    <div class="card pt-5 mt-3" style="max-width: 48%">
                        <div class="card-body bg-warning">
                            <h3 class="card-title">{{ $userCount }}</h3>
                            <p class="card-text">Jumlah Pengguna</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('superadmin.dPemesan') }}" class="card-link">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="card pt-5 mt-3" style="max-width: 48%">
                        <div class="card-body bg-danger">
                            <h3 class="card-title">{{ $adminCount }}</h3>
                            <p class="card-text">Jumlah Admin</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('superadmin.dLapangan') }}" class="card-link">More info <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-e3IVvh02kxMq12MYwQlO5GyA5U0oOzQunKbC1F2YOnpmqJdZLl71BCdGbrfFqC5" crossorigin="anonymous"></script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>
