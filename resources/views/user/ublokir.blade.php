<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapang ID - Selamat Datang</title>
    <!-- Link Bootstrap CSS from CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYmE9iQC95/TN8E+STsYI0Lhj" crossorigin="anonymous">

    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            height: 100vh;
            margin: 0;
        }

        .welcome-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
            color: #000;
        }

        .welcome-text {
            text-align: center;
        }

        .auth-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ecf0f1;
        }

        .auth-box {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .auth-title {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .auth-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group button {
            padding: 10px;
            background-color: #FF0000; /* Change this to your preferred shade of red */
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            display: block;
            margin: 0 auto;
        }

        .form-group button:hover {
            background-color: #A81C0C;
        }
    </style>
</head>

<body>

    <div class="welcome-container">
        <div class="welcome-text">
            <h1>Maaf anda sudah di blokir!</h1>
            <form action="{{ route('logout') }}" method="get">
                @csrf
                <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>
    </div>

    <!-- Link Bootstrap JS from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-e3IVvh02kxMq12MYwQKb7WluLIgEYzxhDz1zTztkAq6VZrlCjP3ClKtOxJSNcYK" crossorigin="anonymous"></script>
</body>

</html>
