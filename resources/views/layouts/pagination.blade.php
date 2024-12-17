<style>
    .pagination {
        margin: 0;
        gap: 5px;
    }

    .text-center {
        text-align: left;
    }
    /* Responsif untuk layar kecil */
    @media (max-width: 576px) {
        .d-flex.justify-content-between {
            flex-direction: column;
            align-items: flex-start;
        }

        .results-info {
            margin-bottom: 10px;
        }

        .pagination {
            justify-content: flex-start;
        }

        .page-link {
            font-size: 12px;
            padding: 4px 6px;
        }
    }
</style>
@if ($paginator->hasPages())
    <div class="d-flex justify-content-between align-items-center mt-2">
        {{-- Teks Menampilkan Jumlah Data --}}
        <div class="results-info">
            Showing {{ ($paginator->currentPage() - 1) * $paginator->perPage() + 1 }}
            to {{ min($paginator->currentPage() * $paginator->perPage(), $paginator->total()) }}
            of {{ $paginator->total() }} result
        </div>

        {{-- Navigasi Paginasi --}}
        <nav>
            <ul class="pagination mb-0">
                {{-- Tombol Previous --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled"><span class="page-link text-white rounded">&laquo;</span></li>
                @else
                    <li class="page-item"><a class="page-link text-white rounded" href="{{ $paginator->previousPageUrl() }}"
                            rel="prev">&laquo;</a></li>
                @endif

                {{-- Nomor Halaman --}}
                @foreach ($elements as $element)
                    {{-- Tanda Elipsis --}}
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <span class="page-link bg-secondary text-white rounded">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Link Halaman --}}
                    @if (is_array($element))
                        @php
                            $current = $paginator->currentPage();
                            $lastPage = $paginator->lastPage();
                        @endphp

                        {{-- Halaman Awal --}}
                        @if ($current > 4)
                            <li class="page-item">
                                <a class="page-link text-white rounded"
                                    href="{{ $paginator->url(1) }}">1</a>
                            </li>
                            @if ($current > 5)
                                <li class="page-item disabled">
                                    <span class="page-link text-white rounded">...</span>
                                </li>
                            @endif
                        @endif

                        {{-- Halaman Tengah (± 2 dari halaman aktif) --}}
                        @for ($i = max(1, $current - 2); $i <= min($lastPage, $current + 2); $i++)
                            @if ($i == $current)
                                <li class="page-item active">
                                    <span class="page-link text-white rounded">{{ $i }}</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link text-white rounded"
                                        href="{{ $paginator->url($i) }}">{{ $i }}</a>
                                </li>
                            @endif
                        @endfor

                        {{-- Halaman Akhir --}}
                        @if ($current < $lastPage - 3)
                            @if ($current < $lastPage - 4)
                                <li class="page-item disabled">
                                    <span class="page-link text-white rounded">...</span>
                                </li>
                            @endif
                            <li class="page-item">
                                <a class="page-link text-white  rounded"
                                    href="{{ $paginator->url($lastPage) }}">{{ $lastPage }}</a>
                            </li>
                        @endif
                    @endif
                @endforeach



                {{-- Tombol Next --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item"><a class="page-link text-white rounded" href="{{ $paginator->nextPageUrl() }}"
                            rel="next">&raquo;</a></li>
                @else
                    <li class="page-item disabled"><span class="page-link text-white rounded">&raquo;</span></li>
                @endif
            </ul>
        </nav>
    </div>
@endif
