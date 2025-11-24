@extends('template')

@section('content')

<style>
    .product-wrapper {
        padding: 20px 0;
    }

    .product-image {
        width: 100%;
        height: 330px;
        object-fit: cover;
        border-radius: 12px;
        border: 1px solid #e5e5e5;
    }

    .product-title {
        font-size: 28px;
        font-weight: bold;
        color: #333;
    }

    .product-price {
        font-size: 22px;
        font-weight: bold;
        color: #014288;
        margin-top: 5px;
    }

    .info-box {
        background: #f9f9f9;
        border-radius: 10px;
        padding: 15px;
        border: 1px solid #ececec;
    }

    .buy-btn {
        background: #25D366; /* warna WA */
        color: white;
        border-radius: 8px;
        padding: 12px;
        width: 100%;
        font-weight: bold;
        transition: 0.3s;
    }

    .buy-btn:hover {
        background: #1da851;
        color: white;
    }
</style>

<div class="container product-wrapper">

    @php
        // nomor WA tujuan
        $waNumber = "6281234567890"; // ← ganti dengan nomor kamu

        // pesan otomatis
        $message = "Halo, saya ingin membeli produk:%0A"
                 . "*{$produk->nama_produk}*%0A"
                 . "Harga: Rp " . number_format($produk->harga, 0, ',', '.') . "%0A"
                 . "Link: " . url()->current();

        // URL WhatsApp final
        $waUrl = "https://wa.me/$waNumber?text=$message";
    @endphp


    <div class="row g-4">

        {{-- ==================== GAMBAR PRODUK ==================== --}}
        <div class="col-md-5">
            <img src="{{ asset('storage/gambar/' . $produk->gambar_produk) }}"
                 alt="{{ $produk->nama_produk }}"
                 class="product-image">
        </div>

        {{-- ==================== DETAIL PRODUK ==================== --}}
        <div class="col-md-7">

            <h2 class="product-title">{{ $produk->nama_produk }}</h2>

            <div class="product-price">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </div>

            <p class="mt-3 text-muted mb-1">
                <i class="fa-solid fa-tag"></i>
                Kategori: <b>{{ $produk->kategori->nama_kategori }}</b>
            </p>

            <p class="text-muted">
                <i class="fa-solid fa-box"></i>
                Stok: <b>{{ $produk->stok }}</b>
            </p>

            <hr>

            {{-- ==================== DESKRIPSI ==================== --}}
            <h5 class="fw-bold mb-2">Deskripsi Produk</h5>

            <div class="info-box mb-4">
                <p class="mb-0" style="white-space: pre-line;">
                    {{ $produk->deskripsi }}
                </p>
            </div>

            {{-- ==================== BUTTON BELI VIA WA ==================== --}}
            <a href="{{ $waUrl }}" target="_blank" class="buy-btn text-center d-block">
                <i class="fa-brands fa-whatsapp me-2"></i> Beli Sekarang via WhatsApp
            </a>

        </div>

    </div>

    {{-- ==================== TOMBOL KEMBALI ==================== --}}
    <a href="{{ route('produk.public') }}" class="btn btn-outline-secondary mt-4">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Produk
    </a>

</div>

@endsection
