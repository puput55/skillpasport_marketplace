@extends('admin.template')
@section('content')

<div class="container-fluid mt-4">

    <div class="card shadow p-3" style="background-color: #ffffff; border-radius: 10px; border: 1px solid #dce3f0">

        {{-- ==================== CARDS ==================== --}}
        <div class="row mb-3 gap-3 justify-content-start align-items-start">

            {{-- Card User --}}
            <div class="col-md-3">
                <div class="card" style="background-color: #f7f9fc; border: 1px solid #c7d7f2;">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-users fa-2x m-2 me-3" style="color:#014288;"></i>
                        <div class="card-body">
                            <h5 class="card-title m-0" style="color:#014288;">User</h5>
                            <p class="card-text" style="color:#014288;">{{ $totalUser ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Toko --}}
            <div class="col-md-3">
                <div class="card" style="background-color: #f7f9fc; border: 1px solid #c7d7f2;">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-store fa-2x m-2 me-3" style="color:#014288;"></i>
                        <div class="card-body">
                            <h5 class="card-title m-0" style="color:#014288;">Toko</h5>
                            <p class="card-text" style="color:#014288;">{{ $totalToko ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Kategori --}}
            <div class="col-md-3">
                <div class="card" style="background-color: #f7f9fc; border: 1px solid #c7d7f2;">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-tags fa-2x m-2 me-3" style="color:#014288;"></i>
                        <div class="card-body">
                            <h5 class="card-title m-0" style="color:#014288;">Kategori</h5>
                            <p class="card-text" style="color:#014288;">{{ $totalKategori ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Produk --}}
            <div class="col-md-3">
                <div class="card" style="background-color: #f7f9fc; border: 1px solid #c7d7f2;">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-box-open fa-2x m-2 me-3" style="color:#014288;"></i>
                        <div class="card-body">
                            <h5 class="card-title m-0" style="color:#014288;">Produk</h5>
                            <p class="card-text" style="color:#014288;">{{ $totalProduk ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Card Gambar --}}
            <div class="col-md-3">
                <div class="card" style="background-color: #f7f9fc; border: 1px solid #c7d7f2;">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-image fa-2x m-2 me-3" style="color:#014288;"></i>
                        <div class="card-body">
                            <h5 class="card-title m-0" style="color:#014288;">Gambar Produk</h5>
                            <p class="card-text" style="color:#014288;">{{ $totalGambar ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div> {{-- End Row --}}
    </div>
</div>

@endsection
