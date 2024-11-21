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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Galeri</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Galeri</a></li>
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
                                        placeholder="Cari galeri..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($galeris as $galeri)
                                        <div class="col-md-6 mb-1">
                                            <div class="card border shadow-sm mb-3">
                                                <div class="row no-gutters align-items-stretch">
                                                    <!-- Pratinjau media (Gambar/Video) -->
                                                    <div class="col-md-4 d-flex">
                                                        @if ($galeri->media_type === 'photo')
                                                            <img src="{{ asset($galeri->media_path) }}"
                                                                class="card-img img-fluid my-3 mx-2" alt="Galeri Foto"
                                                                style="width: 100%; object-fit: cover; border-radius: 8px;">
                                                        @elseif($galeri->media_type === 'video')
                                                            <video controls class="card-img img-fluid my-3 mx-2"
                                                                style="width: 100%; object-fit: cover; border-radius: 8px;">
                                                                <source src="{{ asset($galeri->media_path) }}"
                                                                    type="video/mp4"> Peramban Anda tidak mendukung tag
                                                                video.
                                                            </video>
                                                        @endif
                                                    </div>
                                                    <!-- Detail di sisi kanan -->
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-0">{{ $galeri->judul_galeri }}
                                                            </h5>
                                                            <p class="card-text mb-0">
                                                                <small
                                                                    class="text-muted">{{ $galeri->tanggal }}</small>
                                                            </p>
                                                            <p class="card-text mb-0">{{ $galeri->deskripsi }}</p>
                                                            <p class="card-text"><strong>Kategori:</strong>
                                                                {{ $galeri->kategori }}</p>
                                                            <!-- Tombol tindakan -->
                                                            <div class="btn-group" role="group" aria-label="Aksi">
                                                                <a href="#" class="btn btn-info btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#galleryDetailModal{{ $galeri->id }}">Lihat
                                                                    Detail</a>
                                                                <a href="#" class="btn btn-warning btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#galleryEditModal{{ $galeri->id }}">Sunting</a>
                                                                <form action="/delete-galeri/{{ $galeri->id }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Paginasi -->
                                {{ $galeris->appends(request()->except('page'))->links() }}
                            </div>
                            <div class="card-footer">
                                <a href="/galeris/create" class="btn btn-rounded btn-primary">Tambah Galeri</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal untuk Melihat dan Mengedit Item Galeri -->
                @foreach ($galeris as $galeri)
                    <!-- Modal untuk Detail Galeri -->
                    <div class="modal fade" id="galleryDetailModal{{ $galeri->id }}" tabindex="-1"
                        role="dialog" aria-labelledby="galleryDetailModalLabel{{ $galeri->id }}"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="galleryDetailModalLabel{{ $galeri->id }}">Galeri
                                        Detail: {{ $galeri->judul_galeri }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Kolom Media -->
                                        <div class="col-md-5">
                                            @if ($galeri->media_type === 'photo')
                                                <img src="{{ asset($galeri->media_path) }}" alt="Galeri Foto"
                                                    class="img-fluid rounded mb-3"
                                                    style="width: 100%; object-fit: cover;">
                                            @elseif($galeri->media_type === 'video')
                                                <video controls class="img-fluid rounded mb-3"
                                                    style="width: 100%; object-fit: cover;">
                                                    <source src="{{ asset($galeri->media_path) }}" type="video/mp4">
                                                    Browser Anda tidak mendukung tag video.
                                                </video>
                                            @endif
                                        </div>
                                        <!-- Kolom Isi Teks -->
                                        <div class="col-md-7">
                                            <p><strong>Judul Galeri:</strong> {{ $galeri->judul_galeri }}</p>
                                            <p><strong>Tanggal:</strong> {{ $galeri->tanggal }}</p>
                                            <p><strong>Kategori:</strong> {{ $galeri->kategori }}</p>
                                            <p><strong>Deskripsi:</strong> {{ $galeri->deskripsi }}</p>
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

                    <!-- Modal untuk Mengedit Galeri -->
                    <div class="modal fade" id="galleryEditModal{{ $galeri->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="galleryEditModalLabel{{ $galeri->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="galleryEditModalLabel{{ $galeri->id }}">Edit
                                        Galeri: {{ $galeri->judul_galeri }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/edit-galeri/{{ $galeri->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <!-- Kolom Pratinjau Media -->
                                            <div class="col-md-5">
                                                <label for="media_path">Foto/Video</label>
                                                <input type="file" class="form-control-file" id="media_path"
                                                    name="media_path" accept="image/*,video/*">
                                                @if ($galeri->media_type === 'photo')
                                                    <img src="{{ asset($galeri->media_path) }}" alt="Foto"
                                                        class="img-fluid rounded mt-2"
                                                        style="width: 100%; object-fit: cover;">
                                                @elseif($galeri->media_type === 'video')
                                                    <video controls class="img-fluid rounded mt-2"
                                                        style="width: 100%; object-fit: cover;">
                                                        <source src="{{ asset($galeri->media_path) }}"
                                                            type="video/mp4"> Browser Anda tidak mendukung tag video.
                                                    </video>
                                                @endif
                                            </div>
                                            <!-- Kolom Bidang Formulir -->
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="judul_galeri">Judul Galeri</label>
                                                    <input type="text" class="form-control" id="judul_galeri"
                                                        name="judul_galeri" value="{{ $galeri->judul_galeri }}"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal">Tanggal</label>
                                                    <input type="date" class="form-control" id="tanggal"
                                                        name="tanggal" value="{{ $galeri->tanggal }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kategori">Kategori</label>
                                                    <input type="text" class="form-control" id="kategori"
                                                        name="kategori" value="{{ $galeri->kategori }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="deskripsi">Deskripsi</label>
                                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $galeri->deskripsi }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach






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
