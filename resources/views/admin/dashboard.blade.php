@extends('admin.template')
@section('content')

<div class="container-fluid mt-4">
    <div class="card shadow p-3" style="background-color: #e0d3ab; border-radius: 10px">

        {{-- ==================== HEADER ====================
        <h2 class="p-3">Dashboard {{ Auth::user()->role }}</h2> --}}

        {{-- ==================== STATISTICS CARDS ==================== --}}
        <div class="row mb-3 gap-3 justify-content-start align-items-start">

            {{-- Hanya untuk Admin --}}
            {{-- @if(Auth::user()->role == 'Admin') --}}
                {{-- Card User --}}
                <div class="col-md-3">
                    <div class="card text-white" style="background-color: #3b3b3b">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-users fa-2x m-2 me-3" style="color:#e0d3ab;"></i>
                            <div class="card-body">
                                <h5 class="card-title m-0" style="color:#e0d3ab;">User</h5>
                                <p class="card-text" style="color:#e0d3ab;">{{ $totalUser ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Card Guru
                <div class="col-md-3">
                    <div class="card text-white" style="background-color: #001f3f">
                        <div class="d-flex align-items-center">
                            <i class="fa-solid fa-chalkboard-teacher fa-2x m-2 me-3"></i>
                            <div class="card-body">
                                <h5 class="card-title m-0">Guru</h5>
                                <p class="card-text">{{ $totalGuru ?? 0 }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif --}}

            {{-- Untuk Admin & Operator --}}
            {{-- Card Siswa --}}
            <div class="col-md-3">
                <div class="card text-white" style="background-color: #3b3b3b">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-graduation-cap fa-2x m-2 me-3" style="color:#e0d3ab;"></i>
                        <div class="card-body">
                            <h5 class="card-title m-0" style="color:#e0d3ab;">Toko</h5>
                            <p class="card-text" style="color:#e0d3ab;">{{ $totalToko ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Galeri --}}
            <div class="col-md-3">
                <div class="card text-white" style="background-color: #3b3b3b">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-newspaper fa-2x m-2 me-3" style="color:#e0d3ab;"></i>
                        <div class="card-body">
                            <h5 class="card-title m-0" style="color:#e0d3ab;">Kategori</h5>
                            <p class="card-text" style="color:#e0d3ab;">{{ $totalKategori ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Ekstrakulikuler --}}
            <div class="col-md-3">
                <div class="card text-white" style="background-color: #3b3b3b">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-masks-theater fa-2x m-2 me-3" style="color:#e0d3ab;"></i>
                        <div class="card-body">
                            <h5 class="card-title m-0" style="color:#e0d3ab;">Produk</h5>
                            <p class="card-text" style="color:#e0d3ab;">{{ $totalProduk ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Berita --}}
            <div class="col-md-3">
                <div class="card text-white" style="background-color: #3b3b3b">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-file fa-2x m-2 me-3" style="color:#e0d3ab;"></i>
                        <div class="card-body">
                            <h5 class="card-title m-0" style="color:#e0d3ab;">Gambar Produk</h5>
                            <p class="card-text" style="color:#e0d3ab;">{{ $totalGambar ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div> {{-- End Row --}}
    </div>
</div>

@endsection
