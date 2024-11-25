<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KONI Sukoharjo</title>
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
        .sport-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
        }
        .sport-card:hover {
            transform: translateY(-10px);
        }
        .sport-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

    </style>
</head>

<body>
    
    @include('viewpublik/layouts/navbar')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay mt-5">
            <h1 class="hero-title text-white fst-italic">#SUKOHARJOMAKMUR</h1>
            <p class="hero-subtitle">KONI Sukoharjo, wujudkan olahraga yang berprestasi dan menjunjung tinggi
                sportivitas.</p>
            <a href="#" class="btn btn-warning">Selengkapnya</a>
        </div>
    </section>


    <div class="container my-5">
        <h2 class="mb-4">{{ $SportCategory->nama_cabor }}</h2>
        <div class="card p-4">
            <div class="row">
                <div class="col-md-4 text-center">
                    <img src="{{ asset($SportCategory->logo ?? 'img/default.png') }}" 
                         alt="{{ $SportCategory->nama_cabor }}" 
                         class="img-fluid mb-3" 
                         style="width: 150px; height: 150px; object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Federasi</th>
                            <td>{{ $SportCategory->nama_cabor }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $SportCategory->sport_category }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $SportCategory->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Puslatcab</th>
                            <td>{{ $SportCategory->puslatcab }}</td>
                        </tr>
                        <tr>
                            <th>Kontak</th>
                            <td>{{ $SportCategory->kontak }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    
        <!-- Display Athlete Data -->
        
        <div class="card mt-5 p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Daftar Atlet</h4>
                
                <!-- Form Pencarian di Kanan -->
                <form action="{{ route('cabor.show', $SportCategory->id) }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" 
                           placeholder="Cari atlet..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
            </div>
            <div class="table-responsive">
                <table id="athleteTable" class="table table-bordered table-striped table-hover mt-3" style="min-width: 845px;">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Atlet</th>
                            <th>Cabang Olahraga</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Berat Badan (kg)</th>
                            <th>Tinggi Badan (cm)</th>
                            <th>Prestasi</th>
                            {{-- <th>Aksi</th> --}}
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
                                <td>{{ $athlete->sport_category }}</td> <!-- assuming the relationship is defined -->
                                <td>{{ \Carbon\Carbon::parse($athlete->birth_date)->format('d-m-Y') }}</td>
                                <td>{{ $athlete->gender }}</td>
                                <td>{{ $athlete->weight }} kg</td>
                                <td>{{ $athlete->height }} cm</td>
                                <td>{{ $athlete->achievements }}</td>
                                {{-- <td>
                                    <a href="{{ route('', $athlete->id) }}" class="btn btn-info btn-sm">Detail</a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            
            {{ $athletes->links() }} <!-- Pagination links -->
        </div>
    
        <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
    </div>
    
    
    

    @include('viewpublik/layouts/footer')

</body>

</html>
