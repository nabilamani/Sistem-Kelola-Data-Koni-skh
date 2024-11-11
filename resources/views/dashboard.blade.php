<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sistem Kelola Database KONI</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('gambar_aset/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gambar_aset/assets/vendor/fonts/boxicons.css') }}" />


</head>
<style>
    .card {
        border-bottom: 3px solid orange;
        /* You can adjust the width (3px) as needed */
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .icon-block {
        width: 60px;
        height: 60px;
    }

    .count {
        font-size: 2.5rem;
        font-weight: bold;
    }

    .text-primary {
        color: #007bff !important;
    }

    .text-secondary {
        color: #6c757d !important;
    }

    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 8px;
    }

    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .card-title {
        font-weight: bold;
        color: #343a40;
        transition: color 0.3s ease;
    }

    .hover-card:hover .card-title {
        color: #007bff;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3);
    }
</style>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="/coba" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('gambar_aset/images/koni.png') }}" alt=""
                    style="margin-left: 10px; border-radius: 50%;">
                <span class="fw-bolder brand-text" style="margin-left: 10px; font-size: 18px; font-weight: 300">Sistem
                    Kelola KONI</span>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        @include('layouts/header')
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('layouts/sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row page-titles mx-0 mb-0 shadow-sm">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, Selamat Datang Kembali!</h4>
                            <p class="mb-1"><span class="text-success">{{ Auth::user()->name }},</span> Anda login
                                sebagai <span class="text-success">{{ Auth::user()->level }}</span></p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">View</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <!-- Basic Layout -->
                    <div class="container">

                        <!-- Row 1: Summary Statistics -->
                        <div class="row">
                            <!-- Total Athletes -->
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="card mb-3 shadow-lg rounded card-hover">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <!-- Bagian Kiri: Teks dan Count -->
                                        <div>
                                            <h2 class="count mb-1 text-primary" data-count="{{ $athleteCount }}">0</h2>
                                            <p class="text-secondary mb-0">Total Atlet</p>
                                        </div>

                                        <!-- Bagian Kanan: Icon -->
                                        <div
                                            class="icon-block bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="mdi mdi-account-multiple font-size-40"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Total Events -->
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="card mb-3 shadow-lg rounded card-hover">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <!-- Bagian Kiri: Teks dan Count -->
                                        <div>
                                            <h2 class="count mb-1 text-primary" data-count="{{ $eventCount }}">0</h2>
                                            <p class="text-secondary mb-0">Total Event</p>
                                        </div>

                                        <!-- Bagian Kanan: Icon -->
                                        <div
                                            class="icon-block bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bx-calendar font-size-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h2 class="mb-0 count" data-count="{{ $eventCount }}">0</h2>
                                                <p class="text-muted mb-0">Total Events</p>
                                            </div>
                                            <div class="icon-block">
                                                <i class="bx bx-calendar font-size-50"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Total Achievements -->
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="card mb-3 shadow-lg rounded card-hover">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <!-- Bagian Kiri: Teks dan Count -->
                                        <div>
                                            <h2 class="count mb-1 text-primary" data-count="{{ $achievementCount }}">0
                                            </h2>
                                            <p class="text-secondary mb-0">Total Prestasi</p>
                                        </div>

                                        <!-- Bagian Kanan: Icon -->
                                        <div
                                            class="icon-block bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bx-trophy font-size-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h2 class="mb-0 count" data-count="{{ $achievementCount }}">0</h2>
                                                <p class="text-muted mb-0">Total Prestasi</p>
                                            </div>
                                            <div class="icon-block">
                                                <i class="bx bx-trophy font-size-50"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Total Coaches -->
                            <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="card mb-3 shadow-lg rounded card-hover">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <!-- Bagian Kiri: Teks dan Count -->
                                        <div>
                                            <h2 class="count mb-1 text-primary" data-count="{{ $coachCount }}">0</h2>
                                            <p class="text-secondary mb-0">Total Pelatih</p>
                                        </div>

                                        <!-- Bagian Kanan: Icon -->
                                        <div
                                            class="icon-block bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bx bx-user-circle font-size-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-xl-3 col-lg-6 col-sm-6">
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <div class="media align-items-center">
                                            <div class="media-body">
                                                <h2 class="mb-0 count" data-count="{{ $coachCount }}">0</h2>
                                                <p class="text-muted mb-0">Total Pelatih</p>
                                            </div>
                                            <div class="icon-block">
                                                <i class="bx bx-user-circle font-size-50"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            <!-- Toggle More Info -->
                            <div class="col-12 text-center mb-2">
                                <a href="#" id="toggle-more-info" class="pt-0 mt-0"
                                    style="width: 50px; height: 50px;">
                                    <i class="bx bx-chevron-down font-size-30"></i>
                                </a>
                            </div>



                            <!-- Additional Stats (Hidden by Default) -->
                            <div id="more-info" class="row col-12 mx-0 px-0" style="display: none;">
                                <!-- Total Referees -->
                                <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card mb-3 shadow-lg rounded card-hover">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <!-- Bagian Kiri: Teks dan Count -->
                                            <div>
                                                <h2 class="count mb-1 text-primary"
                                                    data-count="{{ $refereeteCount }}">0</h2>
                                                <p class="text-secondary mb-0">Total Wasit</p>
                                            </div>

                                            <!-- Bagian Kanan: Icon -->
                                            <div
                                                class="icon-block bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bx bx-id-card font-size-50"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <h2 class="mb-0 count" data-count="{{ $refereeteCount }}">0</h2>
                                                    <p class="text-muted mb-0">Total Wasit</p>
                                                </div>
                                                <div class="icon-block">
                                                    <i class="bx bx-id-card font-size-50"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Total Venues -->
                                <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card mb-3 shadow-lg rounded card-hover">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <!-- Bagian Kiri: Teks dan Count -->
                                            <div>
                                                <h2 class="count mb-1 text-primary" data-count="{{ $venueCount }}">
                                                    0</h2>
                                                <p class="text-secondary mb-0">Total Venue</p>
                                            </div>

                                            <!-- Bagian Kanan: Icon -->
                                            <div
                                                class="icon-block bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bx bx-map font-size-50"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <h2 class="mb-0 count" data-count="{{ $venueCount }}">0</h2>
                                                    <p class="text-muted mb-0">Total Lokasi</p>
                                                </div>
                                                <div class="icon-block">
                                                    <i class="bx bx-map font-size-50"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Total Sports -->
                                <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card mb-3 shadow-lg rounded card-hover">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <!-- Bagian Kiri: Teks dan Count -->
                                            <div>
                                                <h2 class="mb-1 count text-primary" data-count=""
                                                    id="sportCategoryCount">0</h2>
                                                <p class="text-secondary mb-0">Total Cabor</p>
                                            </div>

                                            <!-- Bagian Kanan: Icon -->
                                            <div
                                                class="icon-block bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bx bx-basketball font-size-50"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <h2 class="mb-0 count" data-count="" id="sportCategoryCount">0</h2>
                                                    <p class="text-muted mb-0">Total Cabor</p>
                                                </div>
                                                <div class="icon-block">
                                                    <i class="bx bx-basketball font-size-50"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <!-- Total Accounts -->
                                <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card mb-3 shadow-lg rounded card-hover">
                                        <div class="card-body d-flex justify-content-between align-items-center">
                                            <!-- Bagian Kiri: Teks dan Count -->
                                            <div>
                                                <h2 class="count mb-1 text-primary" data-count="{{ $userCount }}">
                                                    0</h2>
                                                <p class="text-secondary mb-0">Total Akun</p>
                                            </div>

                                            <!-- Bagian Kanan: Icon -->
                                            <div
                                                class="icon-block bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="bx bx-user font-size-50"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-xl-3 col-lg-6 col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="media align-items-center">
                                                <div class="media-body">
                                                    <h2 class="mb-0 count" data-count="{{ $userCount }}">0</h2>
                                                    <p class="text-muted mb-0">Total Akun</p>
                                                </div>
                                                <div class="icon-block">
                                                    <i class="bx bx-user font-size-50"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            </div>
                        </div>


                        <!-- Row 3: Latest berita -->
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Berita Terbaru</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($beritas as $berita)
                                                <div class="col-lg-4 col-md-6 mb-4">
                                                    <div
                                                        class="card border shadow-sm h-100 position-relative hover-card">
                                                        <img src="{{ asset($berita->photo) }}"
                                                            class="card-img-top img-fluid"
                                                            alt="{{ $berita->judul_berita }}"
                                                            style="object-fit: cover; height: 200px; border-radius: 8px 8px 0 0;">
                                                        <div class="card-body d-flex flex-column">
                                                            <h5 class="card-title">{{ $berita->judul_berita }}
                                                            </h5>
                                                            <p class="card-text">
                                                                <small
                                                                    class="text-muted">{{ \Carbon\Carbon::parse($berita->tanggal_waktu)->format('d-m-Y H:i') }}</small>
                                                            </p>
                                                            <p class="card-text">
                                                                {{ Str::limit($berita->isi_berita, 100) }}
                                                            </p>
                                                            <p class="card-text"><strong>Lokasi :</strong>
                                                                {{ $berita->lokasi_peristiwa }}</p>
                                                            <p class="card-text"><strong>Sumber :</strong>
                                                                {{ $berita->kutipan_sumber }}</p>
                                                            <button type="button"
                                                                class="btn btn-primary btn-sm mt-auto"
                                                                data-toggle="modal"
                                                                data-target="#newsDetailModal{{ $berita->id }}">
                                                                Selengkapnya
                                                            </button>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!-- Modal for News Details -->
                                                <div class="modal fade" id="newsDetailModal{{ $berita->id }}"
                                                    tabindex="-1" role="dialog"
                                                    aria-labelledby="newsDetailModalLabel{{ $berita->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="newsDetailModalLabel{{ $berita->id }}">
                                                                    Berita Selengkapnya :
                                                                    {{ $berita->judul_berita }}</h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        @if ($berita->photo)
                                                                            <img src="{{ asset($berita->photo) }}"
                                                                                alt="Foto Berita"
                                                                                class="img-fluid rounded mb-3"
                                                                                style="width: 100%; object-fit: cover;">
                                                                        @else
                                                                            <span>No image</span>
                                                                        @endif
                                                                    </div>
                                                                    <div class="col-md-7">
                                                                        <p><strong>Judul Berita :</strong>
                                                                            {{ $berita->judul_berita }}</p>
                                                                        <p><strong>Tanggal Waktu :</strong>
                                                                            {{ \Carbon\Carbon::parse($berita->tanggal_waktu)->format('d-m-Y H:i') }}
                                                                        </p>
                                                                        <p><strong>Lokasi Peristiwa :</strong>
                                                                            {{ $berita->lokasi_peristiwa }}</p>
                                                                        <p><strong>Isi Berita :</strong>
                                                                            {{ $berita->isi_berita }}</p>
                                                                        <p><strong>Kutipan Sumber :</strong>
                                                                            {{ $berita->kutipan_sumber }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Row 2: Rekapan Prestasi Cabang Olahraga -->
                        <div class="row">
                            <!-- Rekapan Prestasi Cabor -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Rekapan Prestasi Cabang Olahraga</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Cabang Olahraga</th>
                                                    <th>Jenis Event</th>
                                                    <th>Nama Atlet/Team</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: rgb(114, 114, 114)">
                                                @foreach ($achievements as $achievement)
                                                    <tr>
                                                        <td>{{ $achievement->sport_category }}</td>
                                                        <td>{{ $achievement->event_type }}</td>
                                                        <td>{{ $achievement->athlete_name }}</td>
                                                        <td>{{ $achievement->description }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>


                            <!-- Tabel Event Mendatang -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title">Upcoming Events</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Nama Event</th>
                                                    <th>Tanggal</th>
                                                    <th>Lokasi</th>
                                                </tr>
                                            </thead>
                                            <tbody style="color: rgb(114, 114, 114)">
                                                @foreach ($upcomingEvents as $event)
                                                    <tr>
                                                        <td>{{ $event->name }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}
                                                        </td>
                                                        <td>{{ $event->location }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--**********************************
            Content body end
        ***********************************-->



                        <!--**********************************
           Support ticket button start
        ***********************************-->

                        <!--**********************************
           Support ticket button end
        ***********************************-->


                    </div>
                    <!--**********************************
        Main wrapper end
    ***********************************-->

                    <!--**********************************
        Scripts
    ***********************************-->
                    <!-- Required vendors -->
                    <script src="{{ asset('gambar_aset/vendor/global/global.min.js') }}"></script>
                    <script src="{{ asset('gambar_aset/js/quixnav-init.js') }}"></script>
                    <script src="{{ asset('gambar_aset/js/custom.min.js') }}"></script>


                    <!-- Vectormap -->
                    <script src="{{ asset('gambar_aset/vendor/raphael/raphael.min.js') }}"></script>
                    <script src="{{ asset('gambar_aset/vendor/morris/morris.min.js') }}"></script>


                    <script src="{{ asset('gambar_aset/vendor/circle-progress/circle-progress.min.js') }}"></script>
                    <script src="{{ asset('gambar_aset/vendor/chart.js') }}/Chart.bundle.min.js') }}"></script>

                    <script src="{{ asset('gambar_aset/vendor/gaugeJS/dist/gauge.min.js') }}"></script>

                    <!--  flot-chart js -->
                    <script src="{{ asset('gambar_aset/vendor/flot/jquery.flot.js') }}"></script>
                    <script src="{{ asset('gambar_aset/vendor/flot/jquery.flot.resize.js') }}"></script>

                    <!-- Owl Carousel -->
                    <script src="{{ asset('gambar_aset/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

                    <!-- Counter Up -->
                    <script src="{{ asset('gambar_aset/vendor/jqvmap/js/jquery.vmap.min.js') }}"></script>
                    <script src="{{ asset('gambar_aset/vendor/jqvmap/js/jquery.vmap.usa.js') }}"></script>
                    <script src="{{ asset('gambar_aset/vendor/jquery.counterup/jquery.counterup.min.js') }}"></script>


                    <script src="{{ asset('gambar_aset/js/dashboard/dashboard-1.js') }}"></script>

                    <!-- Datatable -->
                    <script src="{{ asset('gambar_aset/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
                    <script src="{{ asset('gambar_aset/js/plugins-init/datatables.init.js') }}"></script>

                    <!-- Counting Animation Script -->
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            const counters = document.querySelectorAll('.count');
                            const animationDuration = 2000; // Duration in milliseconds (2 seconds)

                            counters.forEach(counter => {
                                const target = +counter.getAttribute('data-count');
                                const frameRate = 20; // Update the count every 20ms
                                const totalFrames = animationDuration / frameRate;
                                const increment = target / totalFrames;

                                let currentCount = 0;

                                const updateCount = () => {
                                    currentCount += increment;

                                    if (currentCount < target) {
                                        counter.innerText = Math.ceil(currentCount);
                                        setTimeout(updateCount, frameRate);
                                    } else {
                                        counter.innerText = target; // Set the final count
                                    }
                                };

                                updateCount();
                            });
                        });
                    </script>
                    <script>
                        document.getElementById("toggle-more-info").addEventListener("click", function(event) {
                            event.preventDefault();
                            const moreInfoSection = document.getElementById("more-info");
                            if (moreInfoSection.style.display === "none") {
                                moreInfoSection.style.display = "flex";
                                this.innerHTML = '<i class="bx bx-chevron-up font-size-30"></i> Sembunyikan';
                            } else {
                                moreInfoSection.style.display = "none";
                                this.innerHTML = '<i class="bx bx-chevron-down font-size-30"></i> Selengkapnya';
                            }
                        });
                    </script>
                    <script src="{{ asset('gambar_aset/js/sport-category.js') }}"></script>



</body>

</html>
