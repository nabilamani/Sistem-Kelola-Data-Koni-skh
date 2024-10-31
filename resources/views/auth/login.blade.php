<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #F9B11A, #E00818);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #555;
        }

        .form-group input {
            width: 95%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4A90E2;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-group input {
            margin-right: 10px;
        }

        .checkbox-group label {
            font-size: 14px;
            color: #555;
        }

        .forgot-password {
            text-align: right;
            margin-bottom: 20px;
        }

        .forgot-password a {
            font-size: 14px;
            color: #4A90E2;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .btn-login {
            background-color: #4A90E2;
            color: white;
            border: none;
            padding: 10px 20px;
            width: 100%;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-login:hover {
            background-color: #3B7BCD;
        }

        .logo {
            max-width: 100px;
            display: block;
            margin: -20px auto;
        }

        .welcome-message {
            font-size: 14px;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        .register-link {
            display: flex;
            align-items: center;
        }

        .register-link a {
            font-size: 14px;
            color: #4A90E2;
            text-decoration: none;
            margin-left: 5px;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .alert {
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
            font-size: 12px
        }

        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Logo -->
        <img src="https://sisakti.konijateng.id/uploads/data_icon_koni_kab_kota/sukoharjo.png" alt="Logo KONI Sukoharjo"
            class="logo" style="height: 100px">

        <!-- Welcome Message -->
        <h2>Login</h2>
        <div class="welcome-message">
            Selamat datang di Sistem Database KONI Sukoharjo
        </div>

        <!-- Session Status -->
        <div class="form-group">
            <x-auth-session-status class="mb-4" :status="session('status')" />
        </div>

        <!-- Error Alert for Login Failure -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-warning">
                {{ session('message') }}
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus
                    autocomplete="username">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </div>


            <!-- Remember Me -->
            <div class="checkbox-group">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">{{ __('Remember me') }}</label>
            </div>

            <!-- Forgot Password -->
            <div class="forgot-password">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">{{ __('Lupa kata sandi Anda?') }}</a>
                @endif
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-login">{{ __('Log in') }}</button>

            <!-- Register Link -->
            <div class="register-link">
                <p>Belum punya akun ?</p>
                <a href="{{ route('register') }}">{{ __('Register') }}</a>
            </div>
        </form>
    </div>
</body>

</html>
