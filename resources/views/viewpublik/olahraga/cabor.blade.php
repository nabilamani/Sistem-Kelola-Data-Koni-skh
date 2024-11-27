<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KONI Sukoharjo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('gambar_aset/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gambar_aset/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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
        .sport-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
            border-top: solid 3px #E00818;
        }
        .sport-card:hover {
            transform: translateY(-10px);
        }
        .sport-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
        .breadcrumb {
            border-right: 5px solid #E00818;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    
    @include('viewpublik/layouts/navbar')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay mt-5">
            <h1 class="hero-title text-white fst-italic">#CABOR_KONI_SKH</h1>
            <p class="hero-subtitle">KONI Sukoharjo, wujudkan Peluang Emas untuk Para Atlet Muda Sukoharjo.</p>
            <a href="#" class="btn btn-warning">Selengkapnya</a>
        </div>
    </section>


    <section>
        <div class="container my-4">
            <nav class="breadcrumb bg-transparent px-3 py-3 shadow-sm">
                <a class="breadcrumb-item text-decoration-none" href="/">Home</a>
                <span class="breadcrumb-item active text-primary">Olahraga</span>
                <span class="breadcrumb-item active text-primary">Cabor</span>
            </nav>
            <h2 class="text-center">Ragam Cabang Olahraga</h2>
            <p class="text-center mb-4 text-dark">Temukan berbagai cabang olahraga yang tersedia untuk mendukung aktivitas dan prestasi Anda.</p>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @forelse($SportCategories as $SportCategory)
                    <div class="col-md-3">
                        <a href="{{ route('cabor.show', $SportCategory->id) }}" class="text-decoration-none">
                            <div class="card text-center p-4 sport-card">
                                <img src="{{ asset($SportCategory->logo ?? 'img/default.png') }}" 
                                     alt="{{ $SportCategory->nama_cabor }}" 
                                     class="sport-logo mx-auto mb-3" 
                                     style="width: 100px; height: 100px; object-fit: cover;">
                                <h5 class="text-dark">{{ $SportCategory->nama_cabor }}</h5>
                                <p class="text-muted">{{ $SportCategory->sport_category }}</p>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center">Tidak ada data cabang olahraga yang tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    
    

    @include('viewpublik/layouts/footer')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
