<!-- Tampilan Card -->
<div id="card-view" class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" style="display: {{ $activeView == 'card' ? 'flex' : 'none' }}">
    @foreach ($athletes as $athlete)
        <div class="col-md-3">
            <div class="card athlete-card">
                <!-- Foto Atlet (Gunakan placeholder jika tidak ada gambar) -->
                <img src="{{ $athlete->photo ? asset($athlete->photo) : 'https://via.placeholder.com/300x200' }}"
                    alt="{{ $athlete->name }}" class="athlete-photo">
                <div class="athlete-details text-center p-3">
                    <h5 class="text-dark">{{ $athlete->name }}</h5>
                    <p class="text-muted">Cabang: {{ $athlete->sport_category }}</p>
                    <a href="#" class="btn btn-primary btn-sm"
                        onclick="showAthleteDetails({{ json_encode($athlete) }})" data-bs-toggle="modal"
                        data-bs-target="#athleteDetailModal">Detail</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Tampilan Tabel -->
<div id="table-view" class="table-responsive rounded" style="display: {{ $activeView == 'table' ? 'block' : 'none' }}">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Atlet</th>
                <th>Cabang Olahraga</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = ($athletes->currentPage() - 1) * $athletes->perPage() + 1;
            @endphp
            @foreach ($athletes as $index => $athlete)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $athlete->name }}</td>
                    <td>{{ $athlete->sport_category }}</td>
                    <td>
                        <img src="{{ $athlete->photo ? asset($athlete->photo) : 'https://via.placeholder.com/100x100' }}"
                            alt="{{ $athlete->name }}" class="img-thumbnail" width="100">
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm"
                            onclick="showAthleteDetails({{ json_encode($athlete) }})" data-bs-toggle="modal"
                            data-bs-target="#athleteDetailModal">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<!-- Pagination -->
<div class="mt-4">
    {{ $athletes->links('layouts.pagination') }}
</div>