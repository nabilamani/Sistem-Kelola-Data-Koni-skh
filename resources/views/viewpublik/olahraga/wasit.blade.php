<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Wasit - KONI Sukoharjo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('gambar_aset/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gambar_aset/assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        body {
            overflow-x: hidden;
            /* background-attachment: fixed; */
            background: url('/gambar_aset/background_2.png') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
        }


        .hero-section {
            height: 100vh;
            background: url('https://portal.sukoharjokab.go.id/wp-content/uploads/2024/01/20240111-peresmian-gor-dprri1.jpg') no-repeat center center;
            background-size: cover;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: white;

        }

        .hero-overlay {
            text-align: center;
            background: rgba(0, 0, 0, 0.6);
            /* Semi-transparent background */
            backdrop-filter: blur(5px);
            /* Blurring the background for the glass effect */
            padding: 50px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            /* Optional: Border to enhance glass effect */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* Optional: Adds depth */
            transition: transform 0.3s ease;
            /* Smooth zoom effect */
        }

        /* Optional: Zoom-in effect on hover */
        .hero-overlay:hover {
            transform: scale(1.05);
            /* Slight zoom-in */
        }

        .referee-card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }

        .referee-card:hover {
            transform: translateY(-10px);
        }

        .referee-photo {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .referee-details {
            padding: 20px;
        }
    </style>
</head>

<body>
    @include('viewpublik/layouts/navbar')

    <section class="hero-section">
        <div class="hero-overlay mt-5">
            <h1 class="hero-title text-white fst-italic">#WASIT_KONI_SKH</h1>
            <p class="hero-subtitle">KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.</p>
            <a href="#" class="btn btn-warning">Selengkapnya</a>
        </div>
    </section>

    <div class="container my-5">
        <h2 class="text-center mb-4 text-white">Daftar Wasit KONI Sukoharjo</h2>

        <!-- Tombol untuk mengganti tampilan -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="list-view">
                <button id="card-view-btn" class="btn btn-primary active">Card View</button>
                <button id="table-view-btn" class="btn btn-secondary">Table View</button>
            </div>

            <!-- Form Pencarian -->
            <form action="{{ route('showReferees') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari wasit atau cabor..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>

        <!-- Tampilan Card -->
        <div id="card-view" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($referees as $referee)
                <div class="col-md-3">
                    <div class="card referee-card">
                        <img src="{{ $referee->photo ? asset($referee->photo) : 'https://via.placeholder.com/300x200' }}"
                            alt="{{ $referee->name }}" class="referee-photo">
                        <div class="referee-details text-center p-3">
                            <h5 class="text-dark">{{ $referee->name }}</h5>
                            <p class="text-muted">Cabang: {{ $referee->sport_category }}</p>
                            <a href="#" class="btn btn-primary btn-sm"
                                onclick="showRefereeDetails({{ json_encode($referee) }})" data-bs-toggle="modal"
                                data-bs-target="#refereeDetailModal">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tampilan Tabel -->
        <div id="table-view" class="table-responsive rounded" style="display: none;">
            <table class="table table-bordered table-striped" style="min-width: 845px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Wasit</th>
                        <th>Cabang Olahraga</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = ($referees->currentPage() - 1) * $referees->perPage() + 1;
                    @endphp
                    @foreach ($referees as $referee)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $referee->name }}</td>
                            <td>{{ $referee->sport_category }}</td>
                            <td>
                                <img src="{{ $referee->photo ? asset($referee->photo) : 'https://via.placeholder.com/100x100' }}"
                                    alt="{{ $referee->name }}" class="img-thumbnail" width="100">
                            </td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm"
                                    onclick="showRefereeDetails({{ json_encode($referee) }})" data-bs-toggle="modal"
                                    data-bs-target="#refereeDetailModal">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $referees->links('layouts.pagination') }}
        </div>
        <!-- Modal untuk Detail Wasit -->
        <div class="modal fade mt-5 pt-2" id="refereeDetailModal" tabindex="-1"
            aria-labelledby="refereeDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white" id="refereeDetailModalLabel">Detail Wasit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img id="refereePhoto" src="" alt="Foto Wasit" class="img-fluid rounded">
                            </div>
                            <div class="col-md-8">
                                <h5 id="refereeName" class="text-dark mb-3"></h5>
                                <p class="mb-0">
                                    <strong><i class="mdi mdi-soccer mr-1 text-primary"></i> Cabang Olahraga :</strong>
                                    <span id="refereeSportCategory"></span>
                                </p>
                                <p class="mb-0">
                                    <strong><i class="mdi mdi-gender-male-female mr-1 text-primary"></i> Jenis Kelamin
                                        :</strong>
                                    <span id="refereeGender"></span>
                                </p>
                                <p class="mb-0">
                                    <strong><i class="mdi mdi-calendar mr-1 text-primary"></i> Tanggal Lahir :</strong>
                                    <span id="refereeBirthDate"></span>
                                    (<span id="refereeAge"></span> tahun)
                                </p>
                                <p class="mb-0">
                                    <strong><i class="mdi mdi-certificate mr-1 text-primary"></i> Lisensi :</strong>
                                    <span id="refereeLicense"></span>
                                </p>
                                <p class="mb-0">
                                    <strong><i class="mdi mdi-whatsapp mr-1 text-primary"></i> Whatsapp :</strong>
                                    <span id="refereeWA"></span>
                                </p>
                                <p class="mb-0">
                                    <strong><i class="mdi mdi-instagram mr-1 text-primary"></i> Instagram :</strong>
                                    <span id="refereeIG"></span>
                                </p>
                                <p class="mb-0">
                                    <strong><i class="mdi mdi-briefcase mr-1 text-primary"></i> Pengalaman :</strong>
                                    <span id="refereeExperience"></span>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer py-2">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include('viewpublik/layouts/footer')


    <script>
        // Fungsi untuk menyimpan preferensi tampilan ke localStorage
        function setView(view) {
            localStorage.setItem('refereeView', view);
        }

        // Fungsi untuk memuat preferensi tampilan dari localStorage
        function loadView() {
            const savedView = localStorage.getItem('refereeView');
            if (savedView === 'table') {
                document.getElementById('card-view').style.display = 'none';
                document.getElementById('table-view').style.display = 'block';
                document.getElementById('table-view-btn').classList.add('active');
                document.getElementById('card-view-btn').classList.remove('active');
            } else {
                document.getElementById('card-view').style.display = 'flex';
                document.getElementById('table-view').style.display = 'none';
                document.getElementById('card-view-btn').classList.add('active');
                document.getElementById('table-view-btn').classList.remove('active');
            }
        }

        // Event listeners untuk tombol tampilan
        document.getElementById('card-view-btn').addEventListener('click', function() {
            document.getElementById('card-view').style.display = 'flex';
            document.getElementById('table-view').style.display = 'none';
            setView('card');
        });

        document.getElementById('table-view-btn').addEventListener('click', function() {
            document.getElementById('card-view').style.display = 'none';
            document.getElementById('table-view').style.display = 'block';
            setView('table');
        });

        // Memuat tampilan saat halaman dimuat
        document.addEventListener('DOMContentLoaded', loadView);
    </script>
    <script>
        function showRefereeDetails(referee) {
            document.getElementById('refereePhoto').src = referee.photo ? `{{ asset('') }}${referee.photo}` :
                'https://via.placeholder.com/300x200';
            document.getElementById('refereeName').textContent = referee.name;
            document.getElementById('refereeSportCategory').textContent = referee.sport_category;
            document.getElementById('refereeGender').textContent = referee.gender || 'Tidak Diketahui';
            document.getElementById('refereeBirthDate').textContent = referee.birth_date;
            document.getElementById('refereeAge').textContent = referee.age;
            document.getElementById('refereeLicense').textContent = referee.license || 'Tidak Diketahui';
            document.getElementById('refereeWA').textContent = referee.whatsapp || 'Tidak Diketahui';
            document.getElementById('refereeIG').textContent = referee.instagram || 'Tidak Diketahui';
            document.getElementById('refereeExperience').textContent = referee.experience || 'Tidak Diketahui';
        }
    </script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


</body>

</html>
