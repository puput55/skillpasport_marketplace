@extends('template')

@section('content')

<style>
    .product-card {
        border-radius: 12px;
        transition: 0.3s;
        border: 1px solid #e5e5e5;
        overflow: hidden;
        background: #fff;
    }

    .product-card:hover {
        transform: scale(1.03);
        box-shadow: 0 4px 14px rgba(0,0,0,0.1);
    }

    .product-image {
        width: 100%;
        height: 220px;
        object-fit: cover;
    }

    .product-title {
        font-size: 18px;
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
    }

    .product-price {
        color: #014288;
        font-size: 17px;
        font-weight: bold;
    }

    .btn-detail {
        background: #014288;
        color: white;
        border-radius: 8px;
        padding: 8px 12px;
        font-size: 14px;
        transition: 0.3s;
        width: 100%;
        font-weight: bold;
    }

    .btn-detail:hover {
        background: #013266;
        color: white;
    }
</style>


<div class="container py-4">

    <h2 class="fw-bold mb-4 text-center">Semua Produk</h2>

    <div class="row g-4">

        @foreach ($produks as $produk)
        <div class="col-6 col-md-4 col-lg-3">

            <div class="product-card">

                {{-- Gambar produk --}}
                <img src="{{ asset('storage/gambar/' . $produk->gambar_produk) }}"
                     class="product-image"
                     alt="{{ $produk->nama_produk }}">

                <div class="p-3">

                    {{-- Nama Produk --}}
                    <div class="product-title">
                        {{ $produk->nama_produk }}
                    </div>

                    {{-- Harga --}}
                    <div class="product-price mb-2">
                        Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </div>

                    {{-- Kategori --}}
                    <p class="text-muted mb-2" style="font-size: 13px;">
                        {{ $produk->kategori->nama_kategori }}
                    </p>

                    {{-- Tombol Detail --}}
                    <a href="{{ route('produk.show', $produk->id_produk) }}"
                        class="btn-detail text-center">
                        Lihat Produk
                    </a>

                </div>

            </div>

        </div>
        @endforeach

    </div>

</div>

@endsection
