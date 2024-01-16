<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
    body {
        background: linear-gradient(45deg, #8B0000, #5A0303, #630808);
        color: #fff;
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

    .landing-btn-container {
        position: absolute;
        top: 20px;
        right: 20px;
        /* Adjust the top and right values as needed */
    }

    .landing-page {
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
    }

    .landing-content {
        max-width: 800px;
        /* Adjust the max-width as needed */
        text-align: left;
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin: 0 auto;
        /* Center the content horizontally */
    }

    .landing-text {
        max-width: 400px;
        /* Adjust the max-width as needed */
        text-align: left;
        /* Add this line to align text to the left */
        margin-right: 200px;
        margin-top: 50px;
    }

    .landing-title {
        font-size: 3rem;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .landing-description {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    .landing-img {
        max-width: 200px;
        /* Adjust the max-width as needed */
        margin-top: 50px;
        /* Adjust the top margin as needed */
    }


    .landing-btn {
        display: inline-block;
        padding: 10px 20px;
        font-size: 1.2rem;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        border-radius: 5px;
        color: #fff;
        background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
        transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    }

    .landing-btn:hover {
        background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
        color: #fff;
    }
    </style>
    <title>Landing Page</title>
</head>

<body>
    <div class="landing-btn-container">
        <a href="{{ route('auth.register')}}" class="landing-btn">Registrasi Penyewa</a>
        <a href="{{ route('auth.registerLapangan')}}" class="landing-btn">Registrasi Lapangan</a>
        <a href="{{ route('auth.login')}}" class="landing-btn">Login</a>
    </div>
    <div class="landing-page">
        <div class="landing-content">
            <div class="landing-text">
                <h1 class="landing-title">Selamat Datang di Lapang.Id</h1>
                <p class="landing-description">
                    Temukan dan booking lapangan olahraga favorit mu dengan mudah. Lapang Id memberikan kemudahan dan
                    kenyamanan dalam proses pemesanan lapangan.
                </p>
            </div>
            <div class="landing-img">
                <img src="img/apk.png" alt="Your Image" class="img-fluid">
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>