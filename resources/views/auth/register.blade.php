<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <title>Register Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #F9B11A, #E00818);
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .register-container {
            background-color: white;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            margin: 50px 0px;
        }

        .register-container h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 2px;
            font-size: 14px;
            color: #555;
        }

        .form-group input {
            width: 94%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 14px;
            margin-bottom: -5px;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4A90E2;
        }

        .btn-register {
            background-color: #4A90E2;
            color: white;
            border: none;
            padding: 10px 20px;
            width: 100%;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-register:hover {
            background-color: #3B7BCD;
        }

        .already-registered {
            text-align: right;
            margin-top: 20px;
        }

        .already-registered a {
            font-size: 14px;
            color: #4A90E2;
            text-decoration: none;
        }

        .already-registered a:hover {
            text-decoration: underline;
        }

        .logo {
            max-width: 100px;
            margin-bottom: -20px;
            margin-top: -30px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .welcome-message {
            font-size: 14px;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <!-- Logo -->
        <img src="https://sisakti.konijateng.id/uploads/data_icon_koni_kab_kota/sukoharjo.png" alt="Logo KONI Sukoharjo" class="logo" style="height: 100px;">

        <h2>Register</h2>

        <!-- Welcome Message -->
        <div class="welcome-message">
            Selamat datang di Sistem Database KONI Sukoharjo
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name">
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username">
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
            </div>

            <button type="submit" class="btn-register">{{ __('Register') }}</button>

            <!-- Already Registered -->
            <div class="already-registered">
                <a href="{{ route('login') }}">{{ __('Sudah registrasi?') }}</a>
            </div>
        </form>
    </div>
</body>
</html>
