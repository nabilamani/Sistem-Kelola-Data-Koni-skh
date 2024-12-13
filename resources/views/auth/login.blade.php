<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <title>Login Page</title>
    <!-- Tambahkan di dalam <head> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

    <!-- Tambahkan sebelum tag penutup </body> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, yellow, #E00818);
            background-size: 400% 400%;
            animation: gradientAnimation 8s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        @keyframes gradientAnimation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 40px;
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
            margin: -5px auto;
            border-radius: 50%;
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

        .toast-message {
            font-size: 11px;
            /* Sesuaikan ukuran font sesuai kebutuhan */
        }
    </style>
</head>

<body>
    <!-- Menu Lihat View Publik -->
    <div class="menu-view-publik" style="position: absolute; top: 10px; left: 10px;">
        <a href="/" style="text-decoration: none; color: #fff; font-size: 14px; font-weight: bold;">
            &#8592; Lihat View Publik
        </a>
    </div>
    <div class="login-container">
        <!-- Logo -->
        <img src="{{ asset('gambar_aset/images/koni.png') }}" alt="Logo KONI Sukoharjo" class="logo"
            style="height: 100px">

        <!-- Welcome Message -->
        <h2>Login</h2>
        <div class="welcome-message">
            Selamat datang di Sistem Database KONI Sukoharjo
        </div>

        <!-- Session Status -->
        <div class="form-group">
            <x-auth-session-status class="mb-4" :status="session('status')" />
        </div>


        <form method="POST" action="{{ route('login') }}">
            @csrf
        
            <!-- Email Address -->
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" required autofocus autocomplete="off">
            </div>
        
            <!-- Password -->
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="off">
            </div>
        
            <!-- Google reCAPTCHA -->
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LfpYJkqAAAAADJ9fO9GwH1IP-pcKvwppoeX2lDh"></div>
            </div>
        
            <!-- Submit Button -->
            <button type="submit" class="btn-login">{{ __('Log in') }}</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Untuk Error Validasi -->
    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                toastr.options = {
                    "closeButton": true,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "showDuration": "1000",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                @foreach ($errors->all() as $error)
                    toastr.error("{{ $error }}", "Error!");
                @endforeach
            });
        </script>
    @endif
</body>

</html>
