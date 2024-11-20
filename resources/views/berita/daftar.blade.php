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
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css" />



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
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Berita</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Daftar Berita</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar Berita</h4>
                                <form action="{{ route('beritas.index') }}" method="GET" class="form-inline">
                                    <input type="text" name="search" class="form-control mr-2"
                                        placeholder="Cari berita..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-outline-primary">Cari</button>
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($beritas as $berita)
                                        <div class="col-md-6 mb-1">
                                            <div class="card border shadow-sm mb-3">
                                                <div class="row no-gutters align-items-stretch">
                                                    <!-- Image on the left side -->
                                                    <div class="col-md-4 d-flex">
                                                        <img src="{{ asset($berita->photo) }}"
                                                            class="card-img img-fluid my-3 mx-2" alt="Foto Berita"
                                                            style="width: 100%; object-fit: cover; border-radius: 8px;">
                                                    </div>
                                                    <!-- Details on the right side -->
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title mb-0">{{ $berita->judul_berita }}
                                                            </h5>
                                                            <p class="card-text mb-0">
                                                                <small
                                                                    class="text-muted mb-0">{{ \Carbon\Carbon::parse($berita->tanggal_waktu)->format('d-m-Y H:i') }}</small>
                                                            </p>
                                                            <p class="card-text mb-0">
                                                                {!! Str::limit($berita->isi_berita, 200) !!}</p>
                                                            <p class="card-text mb-0"><strong>Lokasi:</strong>
                                                                {{ $berita->lokasi_peristiwa }}</p>
                                                            <p class="card-text"><strong>Kutipan:</strong>
                                                                {{ $berita->kutipan_sumber }}</p>
                                                            <!-- Action buttons -->
                                                            <div class="btn-group" role="group" aria-label="Aksi">
                                                                <a href="#" class="btn btn-info btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#newsDetailModal{{ $berita->id }}">
                                                                    Lihat Detail
                                                                </a>
                                                                <a href="#" class="btn btn-warning btn-sm"
                                                                    data-toggle="modal" data-target="#newsEditModal"
                                                                    data-id="{{ $berita->id }}"
                                                                    data-title="{{ $berita->judul_berita }}"
                                                                    data-date="{{ $berita->tanggal_waktu }}"
                                                                    data-location="{{ $berita->lokasi_peristiwa }}"
                                                                    data-content="{{ $berita->isi_berita }}"
                                                                    data-source="{{ $berita->kutipan_sumber }}"
                                                                    data-photo="{{ $berita->photo }}">
                                                                    Edit
                                                                </a>
                                                                <form action="/delete-berita/{{ $berita->id }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                                                                        Hapus
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Pagination -->

                                {{ $beritas->appends(request()->except('page'))->links() }}

                            </div>
                            <div class="card-footer">
                                <a href="/beritas/create" class="btn btn-rounded btn-primary">Tambah Berita</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modals for Viewing and Editing News -->
                @foreach ($beritas as $berita)
                    <!-- Modal for News Details -->
                    <div class="modal fade" id="newsDetailModal{{ $berita->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="newsDetailModalLabel{{ $berita->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newsDetailModalLabel{{ $berita->id }}">
                                        Detail Berita: {{ $berita->judul_berita }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <!-- Image Column -->
                                        <div class="col-md-5">
                                            @if ($berita->photo)
                                                <img src="{{ asset($berita->photo) }}" alt="Foto Berita"
                                                    class="img-fluid rounded mb-3"
                                                    style="width: 100%; object-fit: cover;">
                                            @else
                                                <span>No image</span>
                                            @endif
                                        </div>
                                        <!-- Text Content Column -->
                                        <div class="col-md-7">
                                            <p><strong>Judul Berita:</strong> {{ $berita->judul_berita }}</p>
                                            <p><strong>Tanggal Waktu:</strong>
                                                {{ \Carbon\Carbon::parse($berita->tanggal_waktu)->format('d-m-Y H:i') }}
                                            </p>
                                            <p><strong>Lokasi Peristiwa:</strong> {{ $berita->lokasi_peristiwa }}</p>
                                            <p><strong>Isi Berita:</strong> {!! $berita->isi_berita !!}</p>
                                            <p><strong>Kutipan Sumber:</strong> {{ $berita->kutipan_sumber }}</p>
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

                    <!-- Modal for Editing News -->
                    {{-- <div class="modal fade" id="newsEditModal{{ $berita->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="newsEditModalLabel{{ $berita->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="newsEditModalLabel{{ $berita->id }}">
                                        Edit Berita: {{ $berita->judul_berita }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/edit-berita/{{ $berita->id }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row">
                                            <!-- Image Preview Column -->
                                            <div class="col-md-5">
                                                <label for="photo">Foto</label>
                                                <input type="file" class="form-control-file" id="photo"
                                                    name="photo" accept="image/*">
                                                @if ($berita->photo)
                                                    <img src="{{ asset($berita->photo) }}" alt="Foto"
                                                        class="img-fluid rounded mt-2"
                                                        style="width: 100%; object-fit: cover;">
                                                @endif
                                            </div>
                                            <!-- Form Fields Column -->
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <label for="judul_berita">Judul Berita</label>
                                                    <input type="text" class="form-control" id="judul_berita"
                                                        name="judul_berita" value="{{ $berita->judul_berita }}"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tanggal_waktu">Tanggal Waktu</label>
                                                    <input type="datetime-local" class="form-control"
                                                        id="tanggal_waktu" name="tanggal_waktu"
                                                        value="{{ \Carbon\Carbon::parse($berita->tanggal_waktu)->format('Y-m-d\TH:i') }}"
                                                        required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lokasi_peristiwa">Lokasi Peristiwa</label>
                                                    <input type="text" class="form-control" id="lokasi_peristiwa"
                                                        name="lokasi_peristiwa"
                                                        value="{{ $berita->lokasi_peristiwa }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="isi_berita">Isi Berita</label>
                                                    <textarea class="form-control" id="editor" name="isi_berita" rows="4" required>{!! $berita->isi_berita !!}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kutipan_sumber">Kutipan Sumber</label>
                                                    <input type="text" class="form-control" id="kutipan_sumber"
                                                        name="kutipan_sumber" value="{{ $berita->kutipan_sumber }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                @endforeach


                <div class="modal fade" id="newsEditModal" tabindex="-1" role="dialog"
                    aria-labelledby="newsEditModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="newsEditModalLabel">Edit Berita</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="newsEditForm" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-5">
                                            <label for="photo">Foto</label>
                                            <input type="file" class="form-control-file" id="photo"
                                                name="photo" accept="image/*">
                                            <img id="photoPreview" src="" alt="Foto"
                                                class="img-fluid rounded mt-2"
                                                style="width: 100%; object-fit: cover;">
                                        </div>
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <label for="judul_berita">Judul Berita</label>
                                                <input type="text" class="form-control" id="judul_berita"
                                                    name="judul_berita" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_waktu">Tanggal Waktu</label>
                                                <input type="datetime" class="form-control" id="tanggal_waktu"
                                                    name="tanggal_waktu" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="lokasi_peristiwa">Lokasi Peristiwa</label>
                                                <input type="text" class="form-control" id="lokasi_peristiwa"
                                                    name="lokasi_peristiwa" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="isi_berita">Isi Berita</label>
                                                <textarea class="form-control" id="isi_berita" name="isi_berita" rows="4"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="kutipan_sumber">Kutipan Sumber</label>
                                                <input type="text" class="form-control" id="kutipan_sumber"
                                                    name="kutipan_sumber">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
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


            <script type="importmap">
                {
                    "imports": {
                        "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
                        "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
                    }
                }
            </script>
            {{-- <script type="module">
                import {
                    ClassicEditor,
                    Essentials,
                    Bold,
                    Italic,
                    Font,
                    Paragraph
                } from 'ckeditor5';
            
                ClassicEditor
                    .create( document.querySelector( '#isi_berita' ), {
                        plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                        toolbar: [
                            'undo', 'redo', '|', 'bold', 'italic', '|',
                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                        ]
                    } )
                    .then( /* ... */ )
                    .catch( /* ... */ );
            </script> --}}
            <script type="module">
                document.addEventListener('DOMContentLoaded', function() {
                    let editorInstance;

                    let form = document.getElementById('newsEditForm');
                    let photoPreview = document.getElementById('photoPreview');
                    let titleInput = document.getElementById('judul_berita');
                    let dateInput = document.getElementById('tanggal_waktu');
                    let locationInput = document.getElementById('lokasi_peristiwa');
                    let sourceInput = document.getElementById('kutipan_sumber');

                    document.querySelectorAll('[data-toggle="modal"]').forEach(function(button) {
                        button.addEventListener('click', async function() {
                            let id = button.getAttribute('data-id');
                            let title = button.getAttribute('data-title');
                            let date = button.getAttribute('data-date');
                            let location = button.getAttribute('data-location');
                            let content = button.getAttribute('data-content');
                            let source = button.getAttribute('data-source');
                            let photo = button.getAttribute('data-photo');

                            form.setAttribute('action', '/edit-berita/' + id);
                            titleInput.value = title;
                            dateInput.value = date;
                            locationInput.value = location;
                            sourceInput.value = source;
                            photoPreview.src = photo || '';

                            if (!editorInstance) {
                                const {
                                    ClassicEditor,
                                    Essentials,
                                    Bold,
                                    Italic,
                                    Font,
                                    Paragraph,
                                    Alignment
                                } = await import('ckeditor5');
                                editorInstance = await ClassicEditor.create(document.querySelector(
                                    '#isi_berita'), {
                                    plugins: [Essentials, Bold, Italic, Font, Paragraph,
                                        Alignment
                                    ],
                                    toolbar: [
                                        'undo', 'redo', '|', 'bold', 'italic', '|',
                                        'fontSize', 'fontFamily', 'fontColor',
                                        'fontBackgroundColor', '|', 'alignment'
                                    ],
                                    alignment: {
                                        options: ['left', 'center', 'right', 'justify']
                                    },
                                });
                            }

                            editorInstance.setData(content);
                        });
                    });
                });
            </script>




</body>

</html>
