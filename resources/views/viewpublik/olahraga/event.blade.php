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
            <h1 class="hero-title text-white fst-italic">#EVENT_KONI_SKH</h1>
            <p class="hero-subtitle">KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.</p>
            <a href="#" class="btn btn-warning">Selengkapnya</a>
        </div>
    </section>

    <!-- Event List Section -->
    <section class="container my-5">
        <h2 class="text-center mb-4 text-white">Daftar Event</h2>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- Tombol untuk mengganti tampilan -->
            <div>
                <button id="card-view-btn" class="btn btn-primary active">Card View</button>
                <button id="table-view-btn" class="btn btn-secondary">Table View</button>
            </div>
    
            <!-- Form Pencarian -->
            <form action="{{ route('showEvents') }}" method="GET" class="d-flex">
                <input type="text" name="search" class="form-control me-2" placeholder="Cari event atau lokasi..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Event</th>
                    <th>Tanggal Mulai</th>
                    <th>Cabang Olahraga</th>
                    <th>Lokasi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</td>
                        <td>{{ $event->sport_category }}</td>
                        <td>{{ $event->location }}</td>
                        <td>
                            @if ($event->location_map)
                                <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal"
                                    data-bs-target="#viewMapModal{{ $event->id }}">
                                    <i class="mdi mdi-map-marker"></i> Lihat Peta
                                </button>
                            @else
                                <span>No Map</span>
                            @endif
                            <!-- View Banner Modal Trigger -->
                            <button type="button" class="btn btn-info ms-1" data-bs-toggle="modal"
                                data-bs-target="#bannerModal{{ $event->id }}">
                                Lihat Banner
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="bannerModal{{ $event->id }}" tabindex="-1"
                                aria-labelledby="bannerModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="bannerModalLabel">Banner Event -
                                                {{ $event->name }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            @if ($event->banner)
                                                <img src="{{ asset($event->banner) }}" alt="Banner"
                                                    class="img-fluid">
                                            @else
                                                <p>No banner available for this event.</p>
                                            @endif
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal for Viewing Map -->
                            @foreach ($events as $event)
                                <div class="modal fade" id="viewMapModal{{ $event->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="viewMapModalLabel{{ $event->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header bg-info text-white">
                                                <h5 class="modal-title" id="viewMapModalLabel{{ $event->id }}">Peta
                                                    Lokasi :
                                                    {{ $event->name }}</h5>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($event->location_map)
                                                    <iframe src="{{ $event->location_map }}" width="100%"
                                                        height="400" style="border: 0;" allowfullscreen=""
                                                        loading="lazy"></iframe>
                                                @else
                                                    <p>Tidak ada peta lokasi yang tersedia.</p>
                                                @endif
                                            </div>
                                            <div class="modal-footer py-3">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination (if applicable) -->
        {{ $events->links() }}
    </section>

    @include('viewpublik/layouts/footer')

</body>

</html>
