<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Event - KONI Sukoharjo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('gambar_aset/images/koni.png') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('gambar_aset/vendor/owl-carousel/css/owl.theme.default.min.css') }}">
    <link href="{{ asset('gambar_aset/vendor/jqvmap/css/jqvmap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('gambar_aset/vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('gambar_aset/assets/vendor/fonts/boxicons.css') }}" />
    <style>
        body {
            overflow-x: hidden;
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
            backdrop-filter: blur(5px);
            padding: 50px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .hero-overlay:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    @include('viewpublik/layouts/navbar')

    <section class="hero-section">
        <div class="hero-overlay mt-5">
            <h1 class="hero-title text-white fst-italic">#PRESTASI_KONI_SKH</h1>
            <p class="hero-subtitle">KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.</p>
            <a href="#" class="btn btn-warning">Selengkapnya</a>
        </div>
    </section>

    <div class="container my-5">
        <h2 class="text-center mb-4 text-white">Daftar Prestasi Atlet KONI Sukoharjo</h2>
    
        <!-- Tombol untuk mengganti tampilan -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Tombol untuk mengganti tampilan -->
            <div>
                <button id="card-view-btn" class="btn btn-primary active">Card View</button>
                <button id="table-view-btn" class="btn btn-secondary">Table View</button>
            </div>
    
            <!-- Form Pencarian -->
            <form action="{{ route('showPrestasi') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2"
                    placeholder="Cari prestasi atau cabang olahraga..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
    
        <!-- Tampilan Card -->
        <div id="card-view" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($achievements as $achievement)
                <div class="col-md-3">
                    <div class="card achievement-card">
                        <div class="achievement-details text-center p-3">
                            <h5 class="text-dark">{{ $achievement->athlete_name }}</h5>
                            <p class="text-muted">Cabang: {{ $achievement->sport_category }}</p>
                            <p class="text-muted">Event: {{ $achievement->event_type }}</p>
                            <a href="#" class="btn btn-primary btn-sm"
                                onclick="showAchievementDetails({{ json_encode($achievement) }})" data-bs-toggle="modal"
                                data-bs-target="#achievementDetailModal">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    
        <!-- Tampilan Tabel -->
        <div id="table-view" class="table-responsive rounded" style="display: none;">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Atlet</th>
                        <th>Cabang Olahraga</th>
                        <th>Event</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = ($achievements->currentPage() - 1) * $achievements->perPage() + 1;
                    @endphp
                    @foreach ($achievements as $achievement)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $achievement->athlete_name }}</td>
                            <td>{{ $achievement->sport_category }}</td>
                            <td>{{ $achievement->event_type }}</td>
                            <td>{{ Str::limit($achievement->description, 50) }}</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm"
                                    onclick="showAchievementDetails({{ json_encode($achievement) }})" data-bs-toggle="modal"
                                    data-bs-target="#achievementDetailModal">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
        <!-- Pagination -->
        <div class="mt-4">
            {{ $achievements->links('layouts.pagination') }}
        </div>
    </div>
    
    <!-- Modal Detail -->
    <div class="modal fade" id="achievementDetailModal" tabindex="-1" aria-labelledby="achievementDetailModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="achievementDetailModalLabel">Detail Prestasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Nama Atlet:</strong> <span id="modal-athlete-name"></span></p>
                    <p><strong>Cabang Olahraga:</strong> <span id="modal-sport-category"></span></p>
                    <p><strong>Event:</strong> <span id="modal-event-type"></span></p>
                    <p><strong>Deskripsi:</strong> <span id="modal-description"></span></p>
                </div>
            </div>
        </div>
    </div>



    @include('viewpublik/layouts/footer')

</body>
<script>
    function showAchievementDetails(achievement) {
        document.getElementById('modal-athlete-name').textContent = achievement.athlete_name;
        document.getElementById('modal-sport-category').textContent = achievement.sport_category;
        document.getElementById('modal-event-type').textContent = achievement.event_type;
        document.getElementById('modal-description').textContent = achievement.description;
    }
</script>
<script>
    // Fungsi untuk menyimpan preferensi tampilan ke localStorage
    function setAchievementView(view) {
        localStorage.setItem('achievementView', view);
    }

    // Fungsi untuk memuat preferensi tampilan dari localStorage
    function loadAchievementView() {
        const savedView = localStorage.getItem('achievementView');
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
        setAchievementView('card');
    });

    document.getElementById('table-view-btn').addEventListener('click', function() {
        document.getElementById('card-view').style.display = 'none';
        document.getElementById('table-view').style.display = 'block';
        setAchievementView('table');
    });

    // Memuat tampilan saat halaman dimuat
    document.addEventListener('DOMContentLoaded', loadAchievementView);
</script>


</html>
