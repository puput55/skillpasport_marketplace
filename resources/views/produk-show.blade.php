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
        background: #25D366;
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

<!-- Tambah AOS CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

<div class="container product-wrapper" data-aos="fade-up">

    @php
        $waNumber = "6287786522103"; // nomor tujuan

        // Format pesan checkout
        $message =
            "🛒 *Checkout Produk TISHOPKU*%0A"
            . "--------------------------------%0A"
            . "📌 *Nama Produk:* {$produk->nama_produk}%0A"
            . "💰 *Harga:* Rp " . number_format($produk->harga, 0, ',', '.') . "%0A"
            . "🏷️ *Kategori:* {$produk->kategori->nama_kategori}%0A"
            . "🗓️ *Tanggal Upload:* " . $produk->created_at->format('d M Y') . "%0A"
            . "--------------------------------%0A"
            . "🔗 Link Produk:%0A" . url()->current() . "%0A%0A"
            . "Saya ingin memesan produk ini.";

        $waUrl = "https://wa.me/$waNumber?text=$message";
    @endphp


    <div class="row g-4">

        <div class="col-md-5" data-aos="fade-right">
            <img src="{{ asset('storage/gambar/' . $produk->gambar_produk) }}"
                 alt="{{ $produk->nama_produk }}"
                 class="product-image">
        </div>

        <div class="col-md-7" data-aos="fade-left">

            <h2 class="product-title">{{ $produk->nama_produk }}</h2>

            <div class="product-price">
                Rp {{ number_format($produk->harga, 0, ',', '.') }}
            </div>

            <p class="text-muted mb-2" style="font-size: 12px;">
                Diunggah pada: {{ $produk->tanggal_upload }}
            </p>

            <p class="text-muted mb-1">
                <i class="fa-solid fa-tag"></i>
                Kategori: <b>{{ $produk->kategori->nama_kategori }}</b>
            </p>

            <p class="text-muted">
                <i class="fa-solid fa-box"></i>
                Stok: <b>{{ $produk->stok }}</b>
            </p>

            <hr>

            <h5 class="fw-bold mb-2">Deskripsi Produk</h5>

            <div class="info-box mb-4" data-aos="fade-up">
                <p class="mb-0" style="white-space: pre-line;">
                    {{ $produk->deskripsi }}
                </p>
            </div>

            <a href="{{ $waUrl }}" target="_blank" class="buy-btn text-center d-block" data-aos="zoom-in">
                <i class="fa-brands fa-whatsapp me-2"></i> Beli Sekarang via WhatsApp
            </a>

        </div>

    </div>

    <a href="{{ route('produk.public') }}" class="btn btn-outline-secondary mt-4" data-aos="fade-up">
        <i class="fa-solid fa-arrow-left me-1"></i> Kembali ke Produk
    </a>

</div>

<!-- Tambah AOS SCRIPT -->
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init();
</script> --}}

@endsection
