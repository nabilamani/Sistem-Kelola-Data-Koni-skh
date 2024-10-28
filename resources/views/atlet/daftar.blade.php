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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Atlet</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Atlet</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <!-- Basic Layout -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar Atlet</h4>
                                <form action="{{ route('athletes.index') }}" method="GET" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2"
                                        placeholder="Cari atlet..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="athleteTable" class="table table-striped table-hover" style="min-width: 845px;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Atlet</th>
                                                <th>Cabang Olahraga</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Berat Badan (kg)</th>
                                                <th>Tinggi Badan (cm)</th>
                                                <th>Prestasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">
                                            @php
                                                $no = ($athletes->currentPage() - 1) * $athletes->perPage() + 1;
                                            @endphp
                                            @foreach ($athletes as $athlete)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $athlete->name }}</td>
                                                    <td>{{ $athlete->sport_category }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($athlete->birth_date)->format('d-m-Y') }}</td>
                                                    <td>{{ $athlete->gender }}</td>
                                                    <td>{{ $athlete->weight }} kg</td>
                                                    <td>{{ $athlete->height }} cm</td>
                                                    <td>{{ $athlete->achievements }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#athleteDetailModal{{ $athlete->id }}">
                                                                    <i class="bx bx-info-circle"></i> Lihat Detail
                                                                </a>
                                                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#athleteEditModal{{ $athlete->id }}">
                                                                    <i class="bx bx-edit-alt"></i> Edit
                                                                </a>
                                                                <form action="/delete-athlete/{{ $athlete->id }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus atlet ini?')">
                                                                        <i class="bx bx-trash"></i> Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                
                                                <!-- Modal for Athlete Details -->
                                                <div class="modal fade" id="athleteDetailModal{{ $athlete->id }}" tabindex="-1" role="dialog" aria-labelledby="athleteDetailModalLabel{{ $athlete->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="athleteDetailModalLabel{{ $athlete->id }}">Detail Atlet: {{ $athlete->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <img src="{{ $athlete->photo }}" width="100%"
                                                            alt="Foto Atlet">
                                                                <p><strong>Nama Atlet:</strong> {{ $athlete->name }}</p>
                                                                <p><strong>Cabang Olahraga:</strong> {{ $athlete->sport_category }}</p>
                                                                <p><strong>Tanggal Lahir:</strong> {{ \Carbon\Carbon::parse($athlete->birth_date)->format('d-m-Y') }}</p>
                                                                <p><strong>Jenis Kelamin:</strong> {{ $athlete->gender }}</p>
                                                                <p><strong>Berat Badan:</strong> {{ $athlete->weight }} kg</p>
                                                                <p><strong>Tinggi Badan:</strong> {{ $athlete->height }} cm</p>
                                                                <p><strong>Prestasi:</strong> {{ $athlete->achievements }}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <!-- Modal for Editing Athlete -->
                                                <div class="modal fade" id="athleteEditModal{{ $athlete->id }}" tabindex="-1" role="dialog" aria-labelledby="athleteEditModalLabel{{ $athlete->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="athleteEditModalLabel{{ $athlete->id }}">Edit Atlet: {{ $athlete->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form Edit Atlet -->
                                                                <form action="/edit-athlete/{{ $athlete->id }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group">
                                                                        <label for="name">Nama Atlet</label>
                                                                        <input type="text" class="form-control" id="name" name="name" value="{{ $athlete->name }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="sport_category">Cabang Olahraga</label>
                                                                        <input type="text" class="form-control" id="sport_category" name="sport_category" value="{{ $athlete->sport_category }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="birth_date">Tanggal Lahir</label>
                                                                        <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{ \Carbon\Carbon::parse($athlete->birth_date)->format('Y-m-d') }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="gender">Jenis Kelamin</label>
                                                                        <select name="gender" class="form-control" required>
                                                                            <option value="Laki-laki" {{ $athlete->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                                            <option value="Perempuan" {{ $athlete->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="weight">Berat Badan (kg)</label>
                                                                        <input type="number" class="form-control" id="weight" name="weight" value="{{ $athlete->weight }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="height">Tinggi Badan (cm)</label>
                                                                        <input type="number" class="form-control" id="height" name="height" value="{{ $athlete->height }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="achievements">Prestasi</label>
                                                                        <textarea class="form-control" id="achievements" name="achievements" required>{{ $athlete->achievements }}</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="photo">Foto</label>
                                                                        <input type="file" class="form-control"
                                                                            id="photo" name="photo">
                                                                        <img src="{{ $athlete->photo }}" width="100"
                                                                            alt="Foto Atlet">
                                                                            <small>Biarkan kosong jika tidak ingin mengubah foto.</small>
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
                
                                            {{ $athletes->appends(request()->except('page'))->links() }}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="/athletes/create" class="btn btn-rounded btn-primary">Tambah Atlet</a>
                                <a href="" target="_blank" class="btn btn-rounded btn-primary mx-2">Cetak Laporan</a>
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
