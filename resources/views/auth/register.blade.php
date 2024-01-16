<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lapang ID - Selamat Datang</title>
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
        background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
        color: #fff;
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
        width: 80%;
        /* Adjusted width */
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
        background: linear-gradient(45deg, #FF4641, #9D0803, #A81C0C);
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-align: center;
        display: block;
        margin: 0 auto;
    }

    .form-group button:hover {
        background-color: #2980b9;
    }
    </style>
</head>

<body>

    <div class="welcome-container">
        <div class="welcome-text">
            <h1>Selamat Datang di Lapang ID</h1>
            <p>Temukan dan sewa lapangan dengan mudah!</p>
        </div>
    </div>

    <div class="auth-container">
        <div class="auth-box">
            <h2 class="auth-title">Register</h2>

            <!-- Registration Form -->
            <form action="{{ route('postRegister') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label class="text-secondary">Nama Anda</label>
                    <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
                    <span class="text-danger">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label class="text-secondary">Email Anda</label>
                    <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
                    <span class="text-danger">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </span>
                </div>


                <div class="form-group">
                    <label class="text-secondary">Password Anda</label>
                    <input type="password" class="form-control" name="password">
                    <span class="text-danger">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <label class="text-secondary">Konfirmasi Password Anda</label>
                    <input type="password" class="form-control" name="password_confirmation" required>
                    <span class="text-danger">
                        @error('password_confirmation')
                        {{ $message }}
                        @enderror
                    </span>
                </div>

                <div class="form-group">
                    <button onclick="registrasi()">Registrasi</button>
                </div>
            </form>

            <p class="mt-2 text-center" style="color: black;">Sudah Punya Akun?
                <a href="{{ route('auth.login')}}" style="text-decoration: none; color: red;">
                    Ayo Masuk!
                </a>
            </p>
        </div>
    </div>

</body>

</html>