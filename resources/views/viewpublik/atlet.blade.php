<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Atlet - KONI Sukoharjo</title>
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
            /* Semi-transparent background */
            backdrop-filter: blur(5px);
            /* Blurring the background for the glass effect */
            padding: 50px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            /* Optional: Border to enhance glass effect */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Optional: Adds depth */
            transition: transform 0.3s ease;
            /* Smooth zoom effect */
        }

        /* Optional: Zoom-in effect on hover */
        .hero-overlay:hover {
            transform: scale(1.05);
            /* Slight zoom-in */
        }

        .athlete-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .athlete-card:hover {
            transform: translateY(-10px);
        }

        .athlete-photo {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .athlete-details {
            padding: 20px;
        }
    </style>
</head>

<body>
    @include('viewpublik/layouts/navbar')

    <section class="hero-section">
        <div class="hero-overlay mt-5">
            <h1 class="hero-title text-white fst-italic">#SUKOHARJOMAKMUR</h1>
            <p class="hero-subtitle">KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.</p>
            <a href="#" class="btn btn-warning">Selengkapnya</a>
        </div>
    </section>

    <div class="container my-5">
        <h2 class="text-center mb-4">Daftar Atlet KONI Sukoharjo</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

            @foreach ($athletes as $athlete)
                <div class="col-md-3">
                    <div class="card athlete-card">
                        <!-- Foto Atlet (Gunakan placeholder jika tidak ada gambar) -->
                        <img src="{{ $athlete->photo ? asset($athlete->photo) : 'https://via.placeholder.com/300x200' }}"
                            alt="{{ $athlete->name }}" class="athlete-photo">
                        <div class="athlete-details text-center">
                            <h5 class="text-dark">{{ $athlete->name }}</h5>
                            <p class="text-muted">Cabang: {{ $athlete->sport_category }}</p>
                            <a href="#" class="btn btn-primary btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $athletes->links() }}
    </div>
    
    
    @include('viewpublik/layouts/footer')
</body>

</html>