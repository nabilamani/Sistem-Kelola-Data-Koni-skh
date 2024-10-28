<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <title>Register Page</title>
    <!-- Tambahkan di dalam <head> -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

<!-- Tambahkan sebelum tag penutup </body> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
        .form-group {
    margin-bottom: 1.5rem; /* Space below each form group */
}

.form-label { 
    color: #333; /* Dark color for better readability */
}

.form-select {
    padding: 0.5rem; /* Inner padding */
    border-radius: 0.375rem; /* Rounded corners */
    border: 1px solid #ced4da; /* Border color */
    background-color: #fff; /* White background */
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out; /* Smooth transitions */
}

.form-select:focus {
    border-color: #80bdff; /* Border color on focus */
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Box shadow on focus */
}

.invalid-feedback {
    display: none; /* Hide feedback by default */
}

select:invalid:focus ~ .invalid-feedback {
    display: block; /* Show feedback when the select is invalid */
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
            <!-- Level -->
            <div class="form-group">
                <label for="level" class="form-label">{{ __('Level') }}</label>
                <select id="level" name="level" class="form-select" required>
                    <option value="" disabled selected>Select Level</option>
                    <option value="Admin">Admin</option>
                    <option value="Pengurus Cabor Sepak Bola">Pengurus Cabor Sepak Bola</option>
                    <option value="Pengurus Cabor Badminton">Pengurus Cabor Badminton</option>
                    <option value="Pengurus Cabor Bola Basket">Pengurus Cabor Bola Basket</option>
                    <option value="Pengurus Cabor Bola Voli">Pengurus Cabor Bola Voli</option>
                    <option value="Pengurus Cabor Atletik">Pengurus Cabor Atletik</option>
                    <option value="Pengurus Cabor Renang">Pengurus Cabor Renang</option>
                    <option value="Pengurus Cabor Tinju">Pengurus Cabor Tinju</option>
                    <option value="Pengurus Cabor Pencak Silat">Pengurus Cabor Pencak Silat</option>
                    <!-- Add more levels if needed -->
                </select>
                <div class="invalid-feedback">
                    Please select a level.
                </div>
            </div>
            

            <button type="submit" class="btn-register">{{ __('Register') }}</button>

            <!-- Already Registered -->
            <div class="already-registered">
                <a href="{{ route('login') }}">{{ __('Sudah registrasi?') }}</a>
            </div>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $('#level').select2({
                placeholder: 'Select Level',
                allowClear: true
            });
        });
    </script>
    
</body>
</html>
