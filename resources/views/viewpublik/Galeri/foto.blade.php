<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event - KONI Sukoharjo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('gambar_aset/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gambar_aset/assets/vendor/fonts/boxicons.css') }}" />
    <style>
        body {
            overflow-x: hidden;
            background: url('/gambar_aset/background_2.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }

        .hero-section {
            height: 100vh;
            background: url('https://portal.sukoharjokab.go.id/wp-content/uploads/2024/01/20240111-peresmian-gor-dprri1.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: white;
        }

        .hero-overlay {
            text-align: center;
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            padding: 50px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .hero-overlay:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    @include('viewpublik/layouts/navbar')

    <section class="hero-section">
        <div class="hero-overlay mt-5">
            <h1 class="hero-title text-white fst-italic">#DOKUMENTASI_KONI_SKH</h1>
            <p class="hero-subtitle">KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.</p>
            <a href="#" class="btn btn-warning">Selengkapnya</a>
        </div>
    </section>

    <section class="container my-5">
        <h2 class="text-center text-uppercase mb-4 text-white">Galeri Dokumentasi</h2>
        <div class="row">
            @foreach ($galleries as $gallery)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm border-0 d-flex flex-column h-100">
                        @if ($gallery->media_type === 'photo')
                            <img src="{{ asset($gallery->media_path) }}" class="card-img-top"
                                alt="{{ $gallery->title }}">
                        @elseif ($gallery->media_type === 'video')
                            <video class="card-img-top" controls>
                                <source src="{{ asset($gallery->media_path) }}" type="video/mp4">
                                Browser Anda tidak mendukung video.
                            </video>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold">{{ $gallery->title }}</h5>
                            <p class="card-text text-muted small">
                                <span class="badge bg-primary">{{ $gallery->sport_category }}</span>
                                <br>{{ $gallery->date }} | {{ $gallery->location }}
                            </p>
                            <p class="card-text">{{ Str::limit($gallery->description, 100, '...') }}</p>
                            <a href="#" class="btn btn-warning btn-sm mt-auto">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach 
        </div>
    </section>



    @include('viewpublik/layouts/footer')

</body>

</html>
