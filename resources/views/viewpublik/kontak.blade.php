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
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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

        .contact-section {
            background: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .contact-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .contact-info {
            margin-bottom: 30px;
        }

        .form-section {
            background-color: #f7f7f7;
            border-radius: 10px;
            padding: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }
    </style>
</head>

<body>
    @include('viewpublik/layouts/navbar')

    <section class="hero-section">
        <div class="hero-overlay mt-5">
            <h1 class="hero-title text-white fst-italic">#CONTACT_KONI_SKH</h1>
            <p class="hero-subtitle">KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.</p>
            <a href="#" class="btn btn-warning">Selengkapnya</a>
        </div>
    </section>

    <!-- Event List Section -->
    <div class="container my-5">
        <div class="row justify-content-center align-items-start">
            <!-- Contact Section -->
            <div class="col-lg-6 mb-4">
                <div class="contact-section">
                    <h2 class="contact-title text-primary">
                        <i class="mdi mdi-map-marker"></i> Hubungi KONI Kabupaten Sukoharjo
                    </h2>
                    <p class="text-dark">
                        Terima kasih telah mengunjungi website resmi KONI Kabupaten Sukoharjo. Kami siap membantu dan
                        menjawab segala pertanyaan Anda terkait program olahraga, pendaftaran atlet, dan peluang
                        kerjasama.
                    </p>

                    <div class="contact-info">
                        <p class="text-dark">
                            <strong><i class="mdi mdi-office-building text-primary"></i> Alamat Kantor :</strong><br>
                            Gedung KONI Kabupaten Sukoharjo<br>
                            Jl. Veteran, Kutorejo, Jetis, Kec. Sukoharjo, Kabupaten Sukoharjo, Jawa Tengah 57511
                        </p>

                        <p class="text-dark">
                            <strong><i class="mdi mdi-clock-outline text-primary"></i> Jam Operasional :</strong><br>
                            Senin – Jumat: 08.00 – 16.00 WIB<br>
                            Sabtu – Minggu: Libur
                        </p>

                        <p class="text-dark">
                            <strong><i class="mdi mdi-phone text-primary"></i> Nomor Telepon :</strong><br>
                            <a class="text-primary" href="tel:081227960337">081227960337</a>
                        </p>

                        <p class="text-dark">
                            <strong><i class="mdi mdi-email text-primary"></i> Email Resmi :</strong><br>
                            <a class="text-primary"
                                href="mailto:konisukoharjo@yahoo.com">konisukoharjo@yahoo.com</a><br>
                            <a class="text-primary" href="mailto:konisukoharjo@gmail.com">konisukoharjo@gmail.com</a>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Form Section -->
            <div class="col-lg-6">
                <div class="form-section">
                    <h4 class="text-primary">
                        <i class="mdi mdi-message-text"></i> Kirim Pesan atau Saran
                    </h4>
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label"><i class="mdi mdi-account-circle text-primary"></i>
                                Nama Lengkap</label>
                            <input type="text" id="name" class="form-control" placeholder="Masukkan nama Anda"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"><i class="mdi mdi-email text-primary"></i>
                                Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Masukkan email Anda"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label"><i
                                    class="mdi mdi-message-text-outline text-primary"></i> Pesan atau Saran</label>
                            <textarea id="message" class="form-control" rows="5" placeholder="Tulis pesan atau saran Anda" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-send"></i> Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @include('viewpublik/layouts/footer')
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
