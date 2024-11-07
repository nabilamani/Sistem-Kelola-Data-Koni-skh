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
<style>
    .card {
        border-bottom: 3px solid orange;
        /* You can adjust the width (3px) as needed */
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
                            <li class="breadcrumb-galeri"><a href="javascript:void(0)">Struktural Koni</a></li>
                            <li class="breadcrumb-galeri active"><a href="javascript:void(0)">Daftar Struktural</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Daftar Galeri</h4>
                                    <form action="{{ route('galeris.index') }}" method="GET" class="form-inline">
                                        <input type="text" name="search" class="form-control mr-2"
                                            placeholder="Cari judul atau kategori..." value="{{ $search }}">
                                        <button type="submit" class="btn btn-outline-primary">Cari</button>
                                    </form>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover" style="min-width: 845px;">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul Galeri</th>
                                                    <th>Kategori</th>
                                                    <th>Tanggal</th>
                                                    <th>Media</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-dark">
                                                @php
                                                    $no = ($galeris->currentPage() - 1) * $galeris->perPage() + 1;
                                                @endphp
                                                @foreach ($galeris as $galeri)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $galeri->judul_galeri }}</td>
                                                        <td>{{ $galeri->kategori }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($galeri->tanggal)->format('d-m-Y') }}
                                                        </td>
                                                        <td>
                                                            @if ($galeri->media_type == 'photo')
                                                                <img src="{{ asset($galeri->media_path) }}" width="50"
                                                                    alt="Media">
                                                            @else
                                                                <video width="50" controls>
                                                                    <source src="{{ asset($galeri->media_path) }}"
                                                                        type="video/mp4">
                                                                    Your browser does not support the video tag.
                                                                </video>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="dropdown">
                                                                <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                    Aksi
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <!-- View Details -->
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#galeriDetailModal{{ $galeri->id }}">
                                                                        <i class="bx bx-info-circle"></i> Lihat Detail
                                                                    </a>
                                                                    <!-- Edit -->
                                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#galeriEditModal{{ $galeri->id }}">
                                                                        <i class="bx bx-edit-alt"></i> Edit
                                                                    </a>
                                                                    <!-- Delete -->
                                                                    <form action="{{ route('galeris.destroy', $galeri->id) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                                            <i class="bx bx-trash"></i> Hapus
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>


                                                    <div class="modal fade" id="galeriDetailModal{{ $galeri->id }}" tabindex="-1" role="dialog" aria-labelledby="galeriDetailModalLabel{{ $galeri->id }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary text-white">
                                                                    <h5 class="modal-title" id="galeriDetailModalLabel{{ $galeri->id }}">Detail Galeri: {{ $galeri->title }}</h5>
                                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-4 text-center">
                                                                            <img src="{{ asset($galeri->photo) }}" class="img-fluid rounded" alt="Foto" style="max-height: 300px; object-fit: cover;">
                                                                        </div>
                                                                        <div class="col-md-8">
                                                                            <p><strong>Judul:</strong> {{ $galeri->title }}</p>
                                                                            <p><strong>Keterangan:</strong> {{ $galeri->description }}</p>
                                                                            <p><strong>Tanggal:</strong> {{ $galeri->created_at->format('d M Y') }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <!-- galeri Edit Modal -->
                                                    <div class="modal fade" id="galeriEditModal{{ $galeri->id }}" tabindex="-1" role="dialog" aria-labelledby="galeriEditModalLabel{{ $galeri->id }}" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-primary text-white">
                                                                    <h5 class="modal-title" id="galeriEditModalLabel{{ $galeri->id }}">Edit Galeri: {{ $galeri->title }}</h5>
                                                                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('galeris.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="title">Judul</label>
                                                                                    <input type="text" class="form-control" id="title" name="title" value="{{ $galeri->title }}" required>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="description">Keterangan</label>
                                                                                    <textarea class="form-control" id="description" name="description" required>{{ $galeri->description }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="photo">Foto</label>
                                                                                    <input type="file" class="form-control-file" id="photo" name="photo">
                                                                                    <div class="mt-2">
                                                                                        <img src="{{ asset($galeri->photo) }}" class="img-fluid rounded" width="100" alt="Foto">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
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
                                            </tbody>
                                        </table>
                                        {{ $galeris->appends(request()->except('page'))->links() }}
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('galeris.create') }}" class="btn btn-rounded btn-primary">Tambah
                                        Galeri</a>
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
