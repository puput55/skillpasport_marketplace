@extends('template')

@section('content')

<style>
    .btn-produk {
        background-color: #014288 !important;
        color: white !important;
        border-radius: 8px;
        font-weight: 600;
    }

    .btn-produk:hover {
        background-color: #013a75 !important;
        color: white !important;
    }

    .category-title {
        font-size: 26px;
        font-weight: 700;
        color: rgb(83, 83, 83);
    }

    .card-title {
        font-size: 17px;
        font-weight: 600;
        color: #333;
        margin-bottom: 6px;
    }

    .price-text {
        font-size: 15px;
        font-weight: 600;
        color: #014288;
    }
</style>

<div class="container mt-4">

    <!-- Judul kategori -->
    <div class="d-flex align-items-center mb-4">
        <i class="fa-solid fa-tag fa-lg me-2 text-primary"></i>
        <h3 class="m-0 category-title">{{ $kategori->nama_kategori }}</h3>
    </div>

    @if($produks->isEmpty())
        <div class="alert alert-warning">
            Tidak ada produk dalam kategori ini.
        </div>
    @endif

    <div class="row">

        @foreach($produks as $p)
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">

                    <!-- Gambar produk -->
                    <img
                        src="{{ asset('storage/gambar/' . $p->gambar_produk) }}"
                        class="card-img-top"
                        alt="{{ $p->nama_produk }}"
                        style="height: 230px; object-fit: cover;"
                    >

                    <div class="card-body">

                        <h5 class="card-title">{{ $p->nama_produk }}</h5>

                        <p class="price-text mb-3">
                            Rp {{ number_format($p->harga, 0, ',', '.') }}
                        </p>

                        <a href="{{ route('produk.show', $p->id_produk) }}"
                           class="btn btn-produk w-100">
                           Lihat Produk
                        </a>

                    </div>
                </div>
            </div>
        @endforeach

    </div>
    <a href="{{ route('kategori.public') }}" class="btn btn-outline-secondary mb-4">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Kategori
    </a>

</div>

@endsection
