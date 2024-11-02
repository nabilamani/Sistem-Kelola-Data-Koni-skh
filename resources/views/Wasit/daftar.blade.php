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
                <img class="logo-abbr" src="{{ asset('gambar_aset/images/koni.png') }}" alt=""
                    style="margin-left: 10px; border-radius: 50%; ">
                <span class="fw-bolder " style="margin-left: 10px; font-size: 18px; font-weight: 300">Sistem Kelola
                    KONI</span>
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
                            <p class="mb-1"><span class="text-success">{{ Auth::user()->name }},</span> Anda login
                                sebagai <span class="text-success">{{ Auth::user()->level }}</span></p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Wasit</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Wasit</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar Wasit</h4>
                                <form action="{{ route('referees.index') }}" method="GET" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2"
                                        placeholder="Cari wasit..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="refereeTable" class="table table-striped table-hover"
                                        style="min-width: 845px;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                {{-- <th>Foto</th> --}}
                                                <th>Nama Wasit</th>
                                                <th>Cabang Olahraga</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Usia</th>
                                                <th>Lisensi</th>
                                                <th>Pengalaman</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">
                                            @php
                                                $no = ($referees->currentPage() - 1) * $referees->perPage() + 1;
                                            @endphp
                                            @foreach ($referees as $referee)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $referee->name }}</td>
                                                    <td>{{ $referee->sport_category }}</td>
                                                    <td>{{ $referee->gender }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($referee->birth_date)->format('d-m-Y') }}
                                                    </td>
                                                    <td>{{ $referee->age }}</td>
                                                    <td>{{ $referee->license }}</td>
                                                    <td>{{ $referee->experience }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button
                                                                class="btn btn-outline-primary btn-sm dropdown-toggle"
                                                                type="button" data-toggle="dropdown"
                                                                aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href=""
                                                                    data-toggle="modal"
                                                                    data-target="#refereeDetailModal{{ $referee->id }}">
                                                                    <i class="bx bx-info-circle"></i> Lihat Detail
                                                                </a>
                                                                <a class="dropdown-item" href=""
                                                                    data-toggle="modal"
                                                                    data-target="#refereeEditModal{{ $referee->id }}">
                                                                    <i class="bx bx-edit-alt"></i> Edit
                                                                </a>
                                                                <form action="/delete-referee/{{ $referee->id }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus wasit ini?')">
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

                                    <!-- Modals for each Referee -->
                                    @foreach ($referees as $referee)
                                        <!-- Modal for Referee Details -->
                                        <div class="modal fade" id="refereeDetailModal{{ $referee->id }}" tabindex="-1" role="dialog" aria-labelledby="refereeDetailModalLabel{{ $referee->id }}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="refereeDetailModalLabel{{ $referee->id }}">Detail Wasit: {{ $referee->name }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Nama Wasit:</strong> {{ $referee->name }}</p>
                                                        <p><strong>Kategori Olahraga:</strong> {{ $referee->sport_category }}</p>
                                                        <p><strong>Jenis Kelamin:</strong> {{ $referee->gender }}</p>
                                                        <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($referee->birth_date)->format('d-m-Y') }}</p>
                                                        <p><strong>Usia:</strong> {{ $referee->age ?? '-' }}</p>
                                                        <p><strong>Lisensi:</strong> {{ $referee->license ?? '-' }}</p>
                                                        <p><strong>Pengalaman:</strong> {{ $referee->experience ?? '-' }}</p>
                                                        @if($referee->photo)
                                                            <p><strong>Foto:</strong></p>
                                                            <img src="{{ asset('storage/'.$referee->photo) }}" alt="Foto" style="width: 100px; height: 100px; border-radius: 50%;">
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal for Editing Referee -->
                                        <div class="modal fade" id="refereeEditModal{{ $referee->id }}"
                                            tabindex="-1" role="dialog"
                                            aria-labelledby="refereeEditModalLabel{{ $referee->id }}"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            id="refereeEditModalLabel{{ $referee->id }}">
                                                            Edit Wasit: {{ $referee->name }}
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/edit-referee/{{ $referee->id }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="name">Nama Wasit</label>
                                                                <input type="text" class="form-control"
                                                                    id="name" name="name"
                                                                    value="{{ $referee->name }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="sport_category">Cabang Olahraga</label>
                                                                <input type="text" class="form-control"
                                                                    id="sport_category" name="sport_category"
                                                                    value="{{ $referee->sport_category }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="license">Lisensi</label>
                                                                <input type="text" class="form-control"
                                                                    id="license" name="license"
                                                                    value="{{ $referee->license }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="experience">Pengalaman</label>
                                                                <textarea class="form-control" id="experience" name="experience">{{ $referee->experience }}</textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-primary">Simpan
                                                                    Perubahan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <!-- Pagination Links -->
                                    {{ $referees->appends(request()->except('page'))->links() }}
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="/referees/create" class="btn btn-rounded btn-primary">Tambah Wasit</a>
                                <a href="" target="_blank" class="btn btn-rounded btn-primary mx-2">Cetak
                                    Laporan</a>
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
