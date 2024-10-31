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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar Berita</h4>
                                <form action="{{ route('berita.index') }}" method="GET" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2" placeholder="Cari berita..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="beritaTable" class="table table-striped table-hover" style="min-width: 845px;">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Judul Berita</th>
                                                <th>Lokasi Peristiwa</th>
                                                <th>Tanggal dan Waktu</th>
                                                <th>Kutipan Sumber</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-dark">
                                            @php
                                                $no = ($berita->currentPage() - 1) * $berita->perPage() + 1;
                                            @endphp
                                            @foreach ($berita as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->judul_berita }}</td>
                                                    <td>{{ $item->lokasi_peristiwa }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->tanggal_waktu)->format('d-m-Y H:i') }}</td>
                                                    <td>{{ $item->kutipan_sumber }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button class="btn btn-outline-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                                                                Aksi
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#beritaDetailModal{{ $item->id }}">
                                                                    <i class="bx bx-info-circle"></i> Lihat Detail
                                                                </a>
                                                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#beritaEditModal{{ $item->id }}">
                                                                    <i class="bx bx-edit-alt"></i> Edit
                                                                </a>
                                                                <form action="/delete-berita/{{ $item->id }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                                                        <i class="bx bx-trash"></i> Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                
                                                <!-- Modal for Berita Details -->
                                                <div class="modal fade" id="beritaDetailModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="beritaDetailModalLabel{{ $item->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="beritaDetailModalLabel{{ $item->id }}">Detail Berita: {{ $item->judul_berita }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p><strong>Judul Berita:</strong> {{ $item->judul_berita }}</p>
                                                                <p><strong>Lokasi Peristiwa:</strong> {{ $item->lokasi_peristiwa }}</p>
                                                                <p><strong>Tanggal dan Waktu:</strong> {{ \Carbon\Carbon::parse($item->tanggal_waktu)->format('d-m-Y H:i') }}</p>
                                                                <p><strong>Kutipan Sumber:</strong> {{ $item->kutipan_sumber }}</p>
                                                                <p><strong>Isi Berita:</strong> {{ $item->isi_berita }}</p>
                                                                <img src="{{ $item->foto }}" width="100%" alt="Foto Berita">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                
                                                <!-- Modal for Editing Berita -->
                                                <div class="modal fade" id="beritaEditModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="beritaEditModalLabel{{ $item->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="beritaEditModalLabel{{ $item->id }}">Edit Berita: {{ $item->judul_berita }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/edit-berita/{{ $item->id }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="form-group">
                                                                        <label for="judul_berita">Judul Berita</label>
                                                                        <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="{{ $item->judul_berita }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="lokasi_peristiwa">Lokasi Peristiwa</label>
                                                                        <input type="text" class="form-control" id="lokasi_peristiwa" name="lokasi_peristiwa" value="{{ $item->lokasi_peristiwa }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="tanggal_waktu">Tanggal dan Waktu</label>
                                                                        <input type="datetime-local" class="form-control" id="tanggal_waktu" name="tanggal_waktu" value="{{ \Carbon\Carbon::parse($item->tanggal_waktu)->format('Y-m-d\TH:i') }}" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="kutipan_sumber">Kutipan Sumber</label>
                                                                        <input type="text" class="form-control" id="kutipan_sumber" name="kutipan_sumber" value="{{ $item->kutipan_sumber }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="isi_berita">Isi Berita</label>
                                                                        <textarea class="form-control" id="isi_berita" name="isi_berita" required>{{ $item->isi_berita }}</textarea>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="foto">Foto</label>
                                                                        <input type="file" class="form-control" id="foto" name="foto">
                                                                        <img src="{{ $item->foto }}" width="100" alt="Foto Berita">
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
                                        </tbody>
                                    </table>
                                    {{ $berita->appends(request()->except('page'))->links() }}
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="/berita/create" class="btn btn-rounded btn-primary">Tambah Berita</a>
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
