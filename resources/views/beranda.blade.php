@extends('template')

@section('content')

<style>
    .landing-wrapper {
        padding: 20px;
    }

    .hero-section {
        background: white;
        border-radius: 12px;
        padding: 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        border-left: 10px solid #014288;
    }

    .hero-title {
        font-size: 42px;
        font-weight: bold;
        color: #014288;
    }

    .hero-sub {
        color: #477bbf;
        font-size: 15px;
    }

    .hero-btn {
        border: 2px solid #014288;
        padding: 10px 22px;
        border-radius: 6px;
        font-weight: bold;
        color: #014288;
        background: white;
    }

    .hero-btn:hover {
        background: #014288;
        color: white;
    }

    .promo-card {
        background: white;
        border-radius: 12px;
        padding: 25px;
        height: 200px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.12);
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-left: 8px solid #014288;
    }

    .promo-title {
        font-size: 26px;
        font-weight: bold;
        color: #014288;
    }

    .promo-sub {
        font-size: 14px;
        color: #477bbf;
    }

    .promo-link {
        font-weight: bold;
        color: #014288;
        text-decoration: none;
    }

    .promo-link:hover {
        text-decoration: underline;
        color: #012f66;
    }
</style>

<div class="landing-wrapper">

    <div class="hero-section mb-4">
        <div>
            <p class="hero-sub">100% Natural</p>
            <h1 class="hero-title">Produk Terbaik<br>Untuk Kebutuhan Anda</h1>
            <p style="color:#477bbf;">Belanja lebih mudah, cepat, dan hemat hanya di SSPLACESHOP</p>

            <a href="/produk" class="hero-btn mt-3">Lihat Produk</a>
        </div>

        <img src="{{ asset('storage/gambar/banner1.webp') }}"
             style="height:260px; border-radius:12px;">
    </div>

    <div class="row g-4">

        <div class="col-md-6">
            <div class="promo-card">
                <div>
                    <h2 class="promo-title">Diskon 20%</h2>
                    <p class="promo-sub">Untuk Semua Produk Segar</p>
                    <a href="/produk" class="promo-link">Lihat Koleksi →</a>
                </div>

                <img src="{{ asset('storage/gambar/banner2.webp') }}"
                     style="height:150px; border-radius:12px;">
            </div>
        </div>

        <div class="col-md-6">
            <div class="promo-card">
                <div>
                    <h2 class="promo-title">Promo Mingguan</h2>
                    <p class="promo-sub">Belanja hemat setiap minggu</p>
                    <a href="/produk" class="promo-link">Belanja Sekarang →</a>
                </div>

                <img src="{{ asset('storage/gambar/banner1.webp') }}"
                     style="height:150px; border-radius:12px;">
            </div>
        </div>

    </div>

</div>

@endsection
