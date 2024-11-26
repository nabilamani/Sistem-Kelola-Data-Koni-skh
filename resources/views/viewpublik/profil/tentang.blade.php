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

        .profile-section {
            background-color: #f8f9fa;
        }

        .profile-section h2 {
            color: #2c3e50;
        }

        .profile-section img {
            max-width: 250px;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    @include('viewpublik/layouts/navbar')

    <section class="hero-section">
        <div class="hero-overlay mt-5">
            <h1 class="hero-title text-white fst-italic">#TENTANG_KONI_SKH</h1>
            <p class="hero-subtitle">KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.</p>
            <a href="#" class="btn btn-warning">Selengkapnya</a>
        </div>
    </section>

    <section class="profile-section py-4">
        <div class="container">
            <nav class="breadcrumb bg-transparent px-2 py-3 shadow-sm">
                <a class="breadcrumb-item text-decoration-none" href="/">Home</a>
                <span class="breadcrumb-item active text-primary">Profil</span>
            </nav>
            <h2 class="fw-bold mb-4 text-center">PROFIL</h2>
            <div class="row align-items-center">
                <div class="col-md-4 text-center mb-4 mb-md-0">
                    <img src="https://via.placeholder.com/250x300" alt="Ketua KONI Sukoharjo" class="img-fluid rounded shadow">
                </div>
                
                <div class="col-md-8">
                    <p style="text-align: justify;">
                        <strong>KONI Sukoharjo</strong> adalah lembaga yang bertugas mengelola, mengembangkan, dan
                        meningkatkan prestasi olahraga di Kabupaten Sukoharjo. Sebagai wadah pembinaan olahraga, KONI
                        Sukoharjo memfasilitasi pelatihan atlet, pelatih, dan program-program yang mendukung olahraga
                        secara berkelanjutan. Melalui visi dan misinya, KONI Sukoharjo berkomitmen untuk mencetak atlet
                        yang berprestasi, baik di tingkat nasional maupun internasional, serta berkontribusi dalam
                        memperkuat persatuan bangsa melalui olahraga.
                    </p>
                    <h3 class="mt-4 text-primary">Visi</h3>
                    <p>
                        Mewujudkan prestasi olahraga yang membanggakan di tingkat dunia, membangun watak, mengangkat
                        harkat dan martabat bangsa, serta mempererat persatuan dan ketahanan nasional.
                    </p>
                    <h3 class="mt-4 text-primary">Misi</h3>
                    <ul class="custom-list">
                        <li><i class="mdi mdi-circle me-2" style="font-size: 8px;"></i>Mewujudkan Tata Kelola kelembagaan atau organisasi yang akuntabel dan profesional.</li>
                        <li><i class="mdi mdi-circle me-2" style="font-size: 8px;"></i>Mengembangkan dan meningkatkan organisasi cabang olahraga yang solid.</li>
                        <li><i class="mdi mdi-circle me-2" style="font-size: 8px;"></i>Mendukung atlet potensial dan berbakat dalam peningkatan prestasi olahraga yang lebih optimal.</li>
                        <li><i class="mdi mdi-circle me-2" style="font-size: 8px;"></i>Merancang dan melaksanakan program pembinaan olahraga yang berkesinambungan,efektif dan efisien.</li>
                        <li><i class="mdi mdi-circle me-2" style="font-size: 8px;"></i>Membangun Kerjasama yang harmonis dengan berbagai pihak dalam keterlibatan untuk peningkatan prestasi olahraga.</li>
                    </ul>

                </div>
            </div>
        </div>
    </section>





    @include('viewpublik/layouts/footer')

</body>

</html>
