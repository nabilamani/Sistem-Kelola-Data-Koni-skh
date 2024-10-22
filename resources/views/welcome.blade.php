<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistem Kelola Database KONI SKH</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                margin: 0;
            }
            .welcome-container {
                display: flex;
                align-items: center;
                justify-content: space-between;
                min-height: 90vh;
                padding: 50px;
                background-image: url('https://image.kemenpora.go.id/images/content/2021/08/02/787/2261Air-Mata-Sejarah-Greysia-Apriyani-Terukir-di-Olimpiade-Tokyo-2020.jpg');
                background-size: cover;
                background-position: center;
                position: relative;
            }
            /* Overlay Gelap */
            .welcome-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.8); /* Filter Gelap */
                z-index: 1;
            }
            .welcome-message, .logo-container {
                position: relative;
                z-index: 2;
            }
            .welcome-message {
                max-width: 50%;
                color: white;
            }
            .logo-container {
                max-width: 40%;
            }
            .logo-container img {
                max-width: 100%;
                height: auto;
            }
            .auth-links {
                margin-top: 20px;
            }
            .auth-links a {
                margin-right: 10px;
                color: white;
                padding: 10px 20px;
                border-radius: 5px;
                background-color: #4a5568; /* Warna abu-abu */
                text-decoration: none;
                transition: background-color 0.3s;
            }
            .auth-links a:hover {
                background-color: #FFAE00; /* Warna abu-abu lebih gelap saat hover */
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="welcome-container">
            <!-- Sisi Kiri: Kalimat Sambutan dan Login/Register -->
            <div class="welcome-message">
                <h1>Selamat Datang di Aplikasi Sistem Kelola Database KONI Sukoharjo</h1>
                <p>Kami dengan senang hati menyambut Anda dalam sistem yang memudahkan pengelolaan data atlet, pelatih, wasit, dan berbagai kegiatan olahraga yang diselenggarakan oleh KONI Sukoharjo.</p>
                
                @if (Route::has('login'))
                    <div class="auth-links">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm ml-4">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>

            <!-- Sisi Kanan: Logo KONI -->
            <div class="logo-container">
                <img src="/gambar_aset/images/koni-welcome.png" alt="Logo KONI Sukoharjo">
            </div>
        </div>
    </body>
</html>
