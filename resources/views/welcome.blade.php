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
    <style>
        body {
            overflow-x: hidden;
        }

        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1030;
            transition: transform 0.4s ease, background-color 0.4s ease;
        }

        /* Tambahkan background pada saat scroll */
        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Efek transisi untuk navbar saat muncul dan tersembunyi */
        .navbar.hidden {
            transform: translateY(-100%);
        }

        /* Hero Section with Parallax Effect */
        .hero-section {
            height: 100vh;
            background: url('https://image.kemenpora.go.id/images/content/2021/08/02/787/2261Air-Mata-Sejarah-Greysia-Apriyani-Terukir-di-Olimpiade-Tokyo-2020.jpg') no-repeat center center;
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
            background-color: rgba(0, 0, 0, 0.6);
            padding: 50px;
            border-radius: 10px;
        }

        .hero-title {
            font-weight: bold;
            font-size: 4rem;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        /* Cards Styling */
        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .mdi {
            color: #f39c12;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('gambar_aset/images/koni.png') }}" alt="KONI Sukoharjo" style="height: 50px;"
                    class="me-3">
                <span class="fw-bold">KONI KABUPATEN SUKOHARJO</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Berita</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Profil
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tentang</a></li>
                            <li><a class="dropdown-item" href="#">Visi dan Misi</a></li>
                            <li><a class="dropdown-item" href="#">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="#">Program</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="olahragaDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Olahraga
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Cabor</a></li>
                            <li><a class="dropdown-item" href="#">Atlet</a></li>
                            <li><a class="dropdown-item" href="#">Pelatih</a></li>
                            <li><a class="dropdown-item" href="#">Wasit</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="galeriDropdown" role="button"
                            data-bs-toggle="dropdown">
                            Galeri
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Foto</a></li>
                            <li><a class="dropdown-item" href="#">Video</a></li>
                            <li><a class="dropdown-item" href="#">Prestasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#">Kontak</a></li>
                    <li class="nav-item">
                        <a class="btn btn-warning text-white ms-3 px-3" href="{{ route('login') }}"
                            style="border-radius: 20px;">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay mt-5">
            <h1 class="hero-title text-white fst-italic">#SUKOHARJOMAKMUR</h1>
            <p class="hero-subtitle">KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.</p>
            <a href="#" class="btn btn-warning">Selengkapnya</a>
        </div>
    </section>
    <section class="py-5 bg-light" style="position: relative; background-image: url('https://images.vexels.com/media/users/3/297088/raw/3ff1701de8a5291ad893656da9bfaf18-running-sports-pattern-design.jpg'); background-size: cover; background-position: center; background-attachment: fixed;">
        <!-- Dark overlay effect -->
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 1;"></div>
        
        <div class="container text-center" style="position: relative; z-index: 2;">
            <h2 class="fw-bold mb-4 text-white">KONI Sukoharjo</h2>
            <p class="text-white mb-5 px-5">KONI (Komite Olahraga Nasional Indonesia) Sukoharjo adalah organisasi yang
                bertanggung jawab untuk mengkoordinasikan kegiatan olahraga dan pembinaan atlet di Kabupaten Sukoharjo.
            </p>
    
            <div class="row gy-4">
                <!-- Card 1: Cabor -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 h-100">
                        <i class="mdi mdi-basketball display-4 mb-3"></i>
                        <h5 class="fw-bold">Cabor</h5>
                    </div>
                </div>
    
                <!-- Card 2: Atlet -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 h-100">
                        <i class="mdi mdi-account-outline display-4 mb-3"></i>
                        <h5 class="fw-bold">Atlet</h5>
                    </div>
                </div>
    
                <!-- Card 3: Pelatih -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 h-100">
                        <i class="mdi mdi-account-multiple-outline display-4 mb-3"></i>
                        <h5 class="fw-bold">Pelatih</h5>
                    </div>
                </div>
    
                <!-- Card 4: Berita Terkini -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 h-100">
                        <i class="mdi mdi-newspaper display-4 mb-3"></i>
                        <h5 class="fw-bold">Berita Terkini</h5>
                    </div>
                </div>
    
                <!-- Card 5: Prestasi Atlet -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 h-100">
                        <i class="mdi mdi-trophy-outline display-4 mb-3"></i>
                        <h5 class="fw-bold">Prestasi Atlet</h5>
                    </div>
                </div>
    
                <!-- Card 6: Wasit -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm text-center p-4 h-100">
                        <i class="mdi mdi-whistle display-4 mb-3"></i>
                        <h5 class="fw-bold">Wasit</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="py-5 bg-dark text-white">
        <div class="container text-center">
            <h2 class="fw-bold mb-4 text-white">Berita Terbaru</h2>
            <div class="row gy-4">
                <!-- Berita 1 -->
                <div class="col-md-4">
                    <div class="card border-0 text-white">
                        <img src="https://via.placeholder.com/350x200" class="card-img" alt="Berita 1">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title fw-bold">Judul Berita 1</h5>
                            <p class="card-text">Deskripsi singkat berita 1...</p>
                            <a href="#" class="btn btn-warning text-white">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
    
                <!-- Berita 2 -->
                <div class="col-md-4">
                    <div class="card border-0 text-white">
                        <img src="https://via.placeholder.com/350x200" class="card-img" alt="Berita 2">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title fw-bold">Judul Berita 2</h5>
                            <p class="card-text">Deskripsi singkat berita 2...</p>
                            <a href="#" class="btn btn-warning text-white">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
    
                <!-- Berita 3 -->
                <div class="col-md-4">
                    <div class="card border-0 text-white">
                        <img src="https://via.placeholder.com/350x200" class="card-img" alt="Berita 3">
                        <div class="card-img-overlay d-flex flex-column justify-content-end">
                            <h5 class="card-title fw-bold">Judul Berita 3</h5>
                            <p class="card-text">Deskripsi singkat berita 3...</p>
                            <a href="#" class="btn btn-warning text-white">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FAQ Section -->
<section id="faq" class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold">PERTANYAAN UMUM</h2>
        <div class="accordion" id="faqAccordion">
            <!-- FAQ 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Apa itu KONI?
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Komite Olahraga Nasional Indonesia (KONI) adalah organisasi yang memiliki wewenang dan tanggung jawab dalam mengelola, membina, mengembangkan, dan mengkoordinasikan seluruh kegiatan olahraga prestasi di Indonesia. KONI bertujuan untuk meningkatkan prestasi atlet nasional di berbagai cabang olahraga.
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Bagaimana cara bergabung dengan program pembinaan atlet KONI?
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Untuk bergabung dengan program pembinaan atlet KONI, calon atlet atau orang tua/wali dapat mengunjungi halaman "Program" di situs kami dan mengisi formulir pendaftaran yang tersedia. Tim KONI akan meninjau aplikasi dan menghubungi calon atlet untuk langkah selanjutnya.
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Apa saja cabang olahraga yang berada di bawah naungan KONI?
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        KONI menaungi berbagai cabang olahraga seperti atletik, renang, bulu tangkis, dan banyak lagi. Untuk informasi lengkap mengenai cabang olahraga, kunjungi situs resmi KONI.
                    </div>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Bagaimana cara mendapatkan informasi mengenai kompetisi yang diselenggarakan oleh KONI?
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Informasi mengenai kompetisi dapat ditemukan di situs resmi KONI pada bagian “Kompetisi” atau melalui pengumuman yang diberikan oleh KONI secara berkala.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    



    <!-- JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Sticky Header dengan efek smooth scroll
        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');
    
        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
            // Menambahkan background saat scroll
            if (scrollTop > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
    
            // Sembunyikan navbar saat scroll down, tampilkan saat scroll up
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                navbar.classList.add('hidden');
            } else {
                navbar.classList.remove('hidden');
            }
            lastScrollTop = scrollTop;
        });
    </script>
    
</body>

</html>
