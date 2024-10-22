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
    border-bottom: 3px solid orange; /* You can adjust the width (3px) as needed */
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
            <img class="logo-abbr" src="{{ asset('gambar_aset/images/koni.png') }}" alt="" style="margin-left: 10px; border-radius: 50%; ">
                <span class="fw-bolder " style="margin-left: 10px; font-size: 18px; font-weight: 300">Sistem Kelola KONI</span>
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
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-1">Anda login sebagai <span class="text-success">{{ Auth::user()->name }}</span></p>
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
                <div class="container-fluid">
            
                    <!-- Row 1: Summary Statistics -->
                    <div class="row">
                        <!-- Total Athletes -->
                        <div class="col-xl-3 col-lg-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h2 class="mb-0">300</h2>
                                            <p class="text-muted mb-0">Total Atlet</p>
                                        </div>
                                        <div class="icon-block">
                                            <i class="bx bxs-group font-size-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Total Events -->
                        <div class="col-xl-3 col-lg-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h2 class="mb-0">50</h2>
                                            <p class="text-muted mb-0">Total Events</p>
                                        </div>
                                        <div class="icon-block">
                                            <i class="bx bx-calendar font-size-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Total Achievements -->
                        <div class="col-xl-3 col-lg-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h2 class="mb-0">200</h2>
                                            <p class="text-muted mb-0">Total Achievements</p>
                                        </div>
                                        <div class="icon-block">
                                            <i class="bx bx-trophy font-size-50"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Total Coaches -->
                        <div class="col-xl-3 col-lg-6 col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media align-items-center">
                                        <div class="media-body">
                                            <h2 class="mb-0">75</h2>
                                            <p class="text-muted mb-0">Total Pelatih</p>
                                        </div>
                                        <div class="icon-block">
                                            <i class="bx bx-user-circle font-size-50"></i>
                                        </div>
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
                                            <th>Emas</th>
                                            <th>Perak</th>
                                            <th>Perunggu</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: rgb(114, 114, 114)">
                                        <tr>
                                            <td>Football</td>
                                            <td>10</td>
                                            <td>8</td>
                                            <td>5</td>
                                        </tr>
                                        <tr>
                                            <td>Badminton</td>
                                            <td>7</td>
                                            <td>6</td>
                                            <td>4</td>
                                        </tr>
                                        <tr>
                                            <td>Swimming</td>
                                            <td>15</td>
                                            <td>10</td>
                                            <td>7</td>
                                        </tr>
                                        <tr>
                                            <td>Basketball</td>
                                            <td>8</td>
                                            <td>5</td>
                                            <td>6</td>
                                        </tr>
                                        <tr>
                                            <td>Volleyball</td>
                                            <td>6</td>
                                            <td>9</td>
                                            <td>3</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Event Mendatang -->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Event Mendatang</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Event</th>
                                            <th>Tanggal</th>
                                            <th>Lokasi</th>
                                        </tr>
                                    </thead>
                                    <tbody style="color: rgb(114, 114, 114)">
                                        <tr>
                                            <td>Football Championship</td>
                                            <td>2024-11-10</td>
                                            <td>2024-11-10</td>
                                        </tr>
                                        <tr>
                                            <td>Badminton Tournament</td>
                                            <td>2024-12-05</td>
                                            <td>2024-12-05</td>
                                        </tr>
                                        <tr>
                                            <td>Swimming Gala</td>
                                            <td>2025-01-15</td>
                                            <td>2025-01-15</td>
                                        </tr>
                                        <tr>
                                            <td>Basketball Cup</td>
                                            <td>2025-02-20</td>
                                            <td>2025-02-20</td>
                                        </tr>
                                        <tr>
                                            <td>Volleyball League</td>
                                            <td>2025-03-10</td>
                                            <td>2025-03-10</td>
                                        </tr>
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

</body>

</html>