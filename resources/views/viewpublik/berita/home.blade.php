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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        body {
            overflow-x: hidden;
        }

        .hero-section {
            height: 100vh;
            background: url('/gambar_aset/background_berita.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: white;

        }

        .hero-overlay {
            width: 100%;
            height: 100vh;
            background: rgba(0, 0, 0, 0.6);
            /* Semi-transparent background */
            backdrop-filter: blur(5px);
            /* Blurring the background for the glass effect */
            padding: 50px 20px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            /* Optional: Border to enhance glass effect */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Optional: Adds depth */
            transition: transform 0.3s ease;
            /* Smooth zoom effect */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: bold;
        }

        .hero-subtitle {
            font-size: 16px;
        }

        .hero-overlay .btn {
            font-size: 1rem;
            border-radius: 25px;
            transition: transform 0.3s ease;
        }

        @keyframes scrollingText {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(-100%);
            }
        }

        .berita-item {
            cursor: pointer;
            /* Menampilkan cursor pointer saat hover */
        }

        .berita-item:hover {
            background-color: #f0f0f0;
            /* Menambahkan background saat hover untuk efek visual */
            transition: background-color 0.3s ease;
            /* Efek transisi halus */
        }

        .modal-backdrop {
            background-color: rgba(255, 255, 255, 0.6);
            /* Warna putih semi-transparan */
        }
    </style>
</head>

<body>

    @include('viewpublik/layouts/navbar')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay d-flex flex-column justify-content-center align-items-center text-center px-5 py-5"
            data-aos="zoom-in" data-aos-delay="0">
            <!-- Lottie Player -->
            <script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
            <div class="lottie-container mb-4">
                <dotlottie-player src="https://lottie.host/57d4c8ea-7162-4113-ab37-4b6c30135c79/R0LluXh7G3.lottie"
                    background="transparent" speed="1" style="width: 250px; height: 250px" loop
                    autoplay></dotlottie-player>
            </div>

            <!-- Hero Title -->
            <h1 class="hero-title text-white fst-italic mb-3" data-aos="zoom-in" data-aos-delay="200">
                #SEPUTAR_BERITA
            </h1>

            <!-- Subtitle -->
            <p class="hero-subtitle text-white mb-4" data-aos="zoom-in" data-aos-delay="400">
                KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.
            </p>

            <!-- Button -->
            <a href="#berita-section" class="btn btn btn-warning px-4 py-2" data-aos="zoom-in" data-aos-delay="600">
                Selengkapnya
            </a>
        </div>
    </section>


    <section id="berita-section"
        style="background-image: url('https://images.vexels.com/media/users/3/297088/raw/3ff1701de8a5291ad893656da9bfaf18-running-sports-pattern-design.jpg'); background-size: cover; background-position: center; background-attachment: fixed; position: relative;">
        <!-- Running Text -->
        <div style="position: absolute; top: 0; width: 100%; background-color: #FF6924; z-index: 3; overflow: hidden;">
            <div
                style="white-space: nowrap; animation: scrollingText 15s linear infinite; color: white; font-weight: bold; padding: 10px 0; text-align: center;">
                Selamat Datang di Portal Berita Kami! | Ikuti Berita Terbaru Seputar Olahraga dan Event Mendatang! |
                Stay Tuned untuk Update Selanjutnya!
            </div>
        </div>
        <!-- Dark overlay -->
        <div
            style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.8); z-index: 1;">
        </div>

        <!-- Content goes here -->
        <div style="position: relative; z-index: 2;">
            <div class="container">
                <div class="row">
                    <!-- Konten Utama -->
                    <div class="col-md-8" style="margin-top: 4.5rem;">
                        <nav class="breadcrumb bg-transparent p-0 mb-2">
                            <a class="breadcrumb-item text-decoration-none" href="/">Home</a>
                            <span class="breadcrumb-item active text-primary" style="color: #FF6924;">Berita</span>
                        </nav>
                        <div id="beritaUtamaContent">
                            <!-- Default content of beritaUtama -->
                            @if ($beritaUtama)
                                <h2 class="text-white">{{ $beritaUtama->judul_berita }}</h2>
                                <div class="card mb-4">
                                    <img src="{{ asset($beritaUtama->photo ?? 'https://via.placeholder.com/800x400') }}"
                                        class="card-img-top" alt="Gambar Berita">
                                    <div class="card-body">
                                        <!-- Title -->
                                        <h5 class="card-title">{{ $beritaUtama->judul_berita }}</h5>

                                        <!-- Date, Location, and Source -->
                                        <div class="d-flex align-items-center mb-3">
                                            <!-- Date -->
                                            <p class="card-text text-muted mb-0 d-flex align-items-center">
                                                <i class="mdi mdi-calendar me-2"></i> <!-- Date Icon -->
                                                {{ \Carbon\Carbon::parse($beritaUtama->tanggal_waktu)->format('d F Y') }}
                                            </p>
                                            <!-- Location -->
                                            <p class="card-text text-muted mb-0 d-flex align-items-center me-0">
                                                <span class="mx-2">|</span>
                                                <i class="mdi mdi-map-marker-outline me-2"></i> <!-- Location Icon -->
                                                <strong>Lokasi : </strong> {{ $beritaUtama->lokasi_peristiwa }}
                                            </p>
                                            {{-- <!-- Source -->
                                            <p class="card-text text-muted mb-0 d-flex align-items-center">
                                                <i class="mdi mdi-source me-2"></i> <!-- Source Icon -->
                                                <strong>Sumber:</strong> {{ $beritaUtama->kutipan_sumber }}
                                            </p> --}}
                                        </div>

                                        <!-- News Content -->
                                        <p class="card-text">
                                            {!! $beritaUtama->isi_berita !!}
                                        </p>
                                        <!-- Quote Source -->
                                        <p class="card-text font-italic text-muted">
                                            <strong>Sumber :</strong> {{ $beritaUtama->kutipan_sumber }}
                                        </p>
                                    </div>
                                </div>
                            @else
                                <p>No main news found.</p>
                            @endif

                            <!-- Section for additional actions or info -->
                            <div class="card mt-4">
                                <div class="card-body">
                                    <h5 class="card-title">Bagikan</h5>
                                    <hr>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <!-- Facebook -->
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                            target="_blank" class="me-3 text-dark">
                                            <i class="fab fa-facebook-f fa-lg"></i>
                                        </a>
                                        <!-- Twitter -->
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ $beritaUtama->judul_berita }}"
                                            target="_blank" class="me-3 text-dark">
                                            <i class="fab fa-twitter fa-lg"></i>
                                        </a>
                                        <!-- WhatsApp -->
                                        <a href="https://api.whatsapp.com/send?text={{ $beritaUtama->judul_berita }} {{ request()->fullUrl() }}"
                                            target="_blank" class="me-3 text-dark">
                                            <i class="fab fa-whatsapp fa-lg"></i>
                                        </a>
                                        <!-- Telegram -->
                                        <a href="https://telegram.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ $beritaUtama->judul_berita }}"
                                            target="_blank" class="me-3 text-dark">
                                            <i class="fab fa-telegram-plane fa-lg"></i>
                                        </a>
                                        <!-- Email -->
                                        <a href="mailto:?subject={{ $beritaUtama->judul_berita }}&body={{ request()->fullUrl() }}"
                                            target="_blank" class="me-3 text-dark">
                                            <i class="fas fa-envelope fa-lg"></i>
                                        </a>
                                        <!-- Copy Link -->
                                        <button class="btn btn-light" onclick="copyToClipboard()">
                                            <i class="fas fa-copy fa-lg"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-md-4" style="margin-top: 7.2rem;">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Berita Terbaru</h5>
                                <hr>
                                <div class="mb-4">
                                    <form>
                                        <label for="search" class="form-label">Cari</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search"
                                                placeholder="Cari...">
                                            <button class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>
                                </div>
                                @foreach ($beritaLatepost as $berita)
                                    <div class="d-flex align-items-start mb-3 berita-item p-1"
                                        data-id="{{ $berita->id }}" data-judul="{{ $berita->judul_berita }}"
                                        data-photo="{{ asset($berita->photo) }}"
                                        data-isi="{{ $berita->isi_berita }}"
                                        data-tanggal="{{ \Carbon\Carbon::parse($berita->tanggal_waktu)->format('d F Y') }}"
                                        data-lokasi="{{ $berita->lokasi_peristiwa }}"
                                        data-sumber="{{ $berita->kutipan_sumber }}">
                                        <img src="{{ asset($berita->photo ?? 'https://via.placeholder.com/80x80') }}"
                                            class="me-3 rounded" alt="Gambar Berita"
                                            style="width: 80px; height: 80px; object-fit: cover;">
                                        <div>
                                            <h6 class="mb-1 text-dark text-decoration-none">
                                                {{ $berita->judul_berita }}
                                            </h6>
                                            <small class="text-muted"><i class="mdi mdi-calendar me-2"></i>
                                                <!-- Calendar Icon -->{{ \Carbon\Carbon::parse($berita->tanggal_waktu)->format('d F Y') }}</small>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                                <a href="/berita/daftar" class="btn btn-primary w-100">
                                    Lihat Semua Berita
                                </a>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">Event Mendatang</h5>
                                <hr>
                                <div class="mb-4">
                                    <form>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="search"
                                                placeholder="Cari...">
                                            <button class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>
                                </div>

                                @foreach ($upcomingEvents as $event)
                                    <div class="d-flex align-items-start event-item p-1"
                                        data-id="{{ $event->id }}" data-name="{{ $event->name }}"
                                        data-event_date="{{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}"
                                        data-banner="{{ asset($event->banner) }}"
                                        data-location_map="{{ $event->location_map }}"
                                        data-sport_category="{{ $event->sport_category }}">

                                        <!-- Banner -->
                                        <img src="{{ asset($event->banner ?? 'https://via.placeholder.com/80x80') }}"
                                            class="me-3 rounded" alt="Banner Event"
                                            style="width: 80px; height: 80px; object-fit: cover; cursor: pointer;">

                                        <!-- Event Details -->
                                        <div>
                                            <h6 class="mb-1 text-dark text-decoration-none">
                                                {{ $event->name }}
                                            </h6>

                                            <!-- Event Date -->
                                            <small class="text-muted">
                                                <i
                                                    class="mdi mdi-calendar me-2"></i>{{ \Carbon\Carbon::parse($event->event_date)->format('d F Y') }}
                                            </small><br>

                                            <!-- Sport Category -->
                                            <small class="text-muted">
                                                <i class="mdi mdi-soccer me-2"></i>{{ $event->sport_category }}
                                            </small>
                                        </div>
                                    </div>
                                    <hr class="my-1">
                                @endforeach


                                <a href="/olahraga/event" class="btn btn-primary w-100">
                                    Lihat Semua Event
                                </a>
                            </div>
                        </div>
                        <div class="modal fade" id="imageModal" data-bs-backdrop="false" tabindex="-1"
                            aria-labelledby="imageModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <img id="modalImage" src="" alt="Full Banner"
                                            class="img-fluid rounded">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>




    @include('viewpublik/layouts/footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const beritaItems = document.querySelectorAll('.berita-item');
            const beritaUtamaContent = document.getElementById('beritaUtamaContent');

            beritaItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Extract data from the clicked item
                    const judul = this.dataset.judul;
                    const photo = this.dataset.photo;
                    const isi = this.dataset.isi;
                    const tanggal = this.dataset.tanggal;
                    const lokasi = this.dataset.lokasi;
                    const sumber = this.dataset.sumber;

                    // Update the content in beritaUtama
                    beritaUtamaContent.innerHTML = `
                    <h2 class="text-white">${judul}</h2>
                    <div class="card mb-4">
                        <img src="${photo}" class="card-img-top" alt="Gambar Berita">
                        <div class="card-body">
                            <h5 class="card-title">${judul}</h5>

                            <!-- Date, Location, and Source -->
                            <div class="d-flex align-items-center mb-3">
                                <!-- Date -->
                                <p class="card-text text-muted mb-0 d-flex align-items-center">
                                    <i class="mdi mdi-calendar me-2"></i> <!-- Date Icon -->
                                    ${tanggal}
                                </p>
                                <!-- Location -->
                                <p class="card-text text-muted mb-0 d-flex align-items-center me-3">
                                    <span class="mx-2">|</span>
                                    <i class="mdi mdi-map-marker-outline me-2"></i> <!-- Location Icon -->
                                    <strong>Lokasi :</strong> ${lokasi}
                                </p>
                            </div>

                            <!-- News Content -->
                            <p class="card-text">${isi}</p>
                            <p class="card-text font-italic text-muted">
                                <strong>Sumber : </strong> ${sumber}
                            </p>
                        </div>
                    </div>
                    <!-- Section for additional actions or info -->
                            <div class="card mt-4">
                                <div class="card-body">
                                    <h5 class="card-title">Bagikan</h5>
                                    <hr>
                                    <div class="d-flex justify-content-start align-items-center">
                                        <!-- Facebook -->
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                                            target="_blank" class="me-3 text-dark">
                                            <i class="fab fa-facebook-f fa-lg"></i>
                                        </a>
                                        <!-- Twitter -->
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ $beritaUtama->judul_berita }}"
                                            target="_blank" class="me-3 text-dark">
                                            <i class="fab fa-twitter fa-lg"></i>
                                        </a>
                                        <!-- WhatsApp -->
                                        <a href="https://api.whatsapp.com/send?text={{ $beritaUtama->judul_berita }} {{ request()->fullUrl() }}"
                                            target="_blank" class="me-3 text-dark">
                                            <i class="fab fa-whatsapp fa-lg"></i>
                                        </a>
                                        <!-- Telegram -->
                                        <a href="https://telegram.me/share/url?url={{ urlencode(request()->fullUrl()) }}&text={{ $beritaUtama->judul_berita }}"
                                            target="_blank" class="me-3 text-dark">
                                            <i class="fab fa-telegram-plane fa-lg"></i>
                                        </a>
                                        <!-- Email -->
                                        <a href="mailto:?subject={{ $beritaUtama->judul_berita }}&body={{ request()->fullUrl() }}"
                                            target="_blank" class="me-3 text-dark">
                                            <i class="fas fa-envelope fa-lg"></i>
                                        </a>
                                        <!-- Copy Link -->
                                        <button class="btn btn-light" onclick="copyToClipboard()">
                                            <i class="fas fa-copy fa-lg"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                `;
                });
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const eventItems = document.querySelectorAll('.event-item img');
            const modalImage = document.getElementById('modalImage');
            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));

            eventItems.forEach(item => {
                item.addEventListener('click', (e) => {
                    modalImage.src = e.target.src; // Set the source of the modal image
                    imageModal.show(); // Show the modal
                });
            });
        });
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
