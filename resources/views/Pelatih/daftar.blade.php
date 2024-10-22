{{-- @dd($coaches) --}}

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
                            <h4>Hi, Selamat Datang!</h4>
                            <p class="mb-1">{{ Auth::user()->name }}</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Pelatih</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Pelatih</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                <!-- Basic Layout -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pelatih</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="coachTable" class="table table-striped table-hover" style="min-width: 845px;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>No</th>
                                            <th>ID</th>
                                            <th>Nama</th>
                                            <th>Umur</th>
                                            <th>Alamat</th>
                                            <th>Cabang Olahraga</th>
                                            <th style="width: 20%">Deskripsi</th>
                                            {{-- <th>Domisili</th> --}}
                                            {{-- <th>Club</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-dark">
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach($coaches as $coach)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $coach->id }}</td>
                                                <td><img src="{{ $coach->photo }}" width="50" alt=""> {{ $coach->name }}</td>
                                                <td>{{ $coach->age }}</td>
                                                <td>{{ $coach->address }}</td>
                                                <td>{{ $coach->sport_category }}</td>
                                                <td>{{ $coach->description }}</td>
                                                {{-- <td>{{ $coach['club'] }}</td> --}}
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#coachDetailModal{{ $coach->id }}"><i class="bx bx-info-circle"></i> Lihat Detail</a>
                                                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#coachEditModal{{ $coach->id }}"><i class="bx bx-edit-alt"></i> Edit</a>
                                                            <form action="/delete-pelatih/{{ $coach->id }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus data pelatih ini?')">
                                                                    <i class="bx bx-trash"></i> Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @foreach($coaches as $coach)
<!-- Modal -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="modal fade" id="coachDetailModal{{ $coach->id }}" tabindex="-1" role="dialog" aria-labelledby="coachDetailModalLabel{{ $coach->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coachDetailModalLabel{{ $coach->id }}">Detail Pelatih: {{ $coach->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Isi detail pelatih -->
                <img src="{{ $coach->photo }}" width="100%" alt="Foto Pelatih">
                <p><strong>Nama:</strong> {{ $coach->name }}</p>
                <p><strong>Umur:</strong> {{ $coach->age }}</p>
                <p><strong>Alamat:</strong> {{ $coach->address }}</p>
                <p><strong>Cabang Olahraga:</strong> {{ $coach->sport_category }}</p>
                <p><strong>Deskripsi:</strong> {{ $coach->description }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="coachEditModal{{ $coach->id }}" tabindex="-1" role="dialog" aria-labelledby="coachEditModalLabel{{ $coach->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="coachEditModalLabel{{ $coach->id }}">Edit Pelatih: {{ $coach->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form Edit Pelatih -->
                <form action="/edit-pelatih/{{ $coach->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $coach->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Umur</label>
                        <input type="number" class="form-control" id="age" name="age" value="{{ $coach->age }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $coach->address }}" required>
                    </div>
                    <div class="form-group">
                        <label for="sport_category">Cabang Olahraga</label>
                        <input type="text" class="form-control" id="sport_category" name="sport_category" value="{{ $coach->sport_category }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $coach->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="photo">Foto</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                        <img src="{{ $coach->photo }}" width="100" alt="Foto Pelatih">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

                                {{ $coaches->links()}}
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/coaches/create" class="btn btn-rounded btn-primary">Tambah Pelatih</a>
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