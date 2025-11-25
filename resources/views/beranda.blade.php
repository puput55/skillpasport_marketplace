@extends('template')

@section('content')

<style>
    .landing-wrapper { padding: 20px; }

    /* HERO */
    .left-big { position: relative; width: 100%; }
    .left-img { width: 100%; height: 360px; object-fit: cover; border-radius: 12px; }
    .left-text { position: absolute; top: 30px; left: 30px; color: #4a4a4a; }
    .left-text h1 { font-size: 42px; font-weight: bold; margin: 0; }
    .left-btn { margin-top: 15px; border: 2px solid #4a4a4a; padding: 10px 20px; border-radius: 6px; font-weight: bold; background: transparent; color: #4a4a4a; display: inline-block; text-decoration: none; }
    .left-btn:hover { background: #4a4a4a; color: white; }

    .right-img-box { position: relative; border-radius: 12px; overflow: hidden; width: 100%; }
    .right-img { width: 100%; height: 170px; object-fit: cover; }
    .right-text { position: absolute; bottom: 15px; left: 15px; color: #4a4a4a; }
    .see-more { font-size: 13px; color: #014288; font-weight: bold; text-decoration: none; }
    .see-more:hover { text-decoration: underline; }

    /* CATEGORY */
    .category-card { background: #ffffff; border-radius: 18px; padding: 25px 10px; text-align: center; transition: 0.25s; box-shadow: 0 4px 12px rgba(0,0,0,0.06); border: 1px solid #f0f0f0; }
    .category-card:hover { transform: translateY(-5px); box-shadow: 0 6px 18px rgba(0,0,0,0.10); }
    .category-icon { width: 55px; height: 55px; border-radius: 14px; margin: 0 auto 12px; display: flex; justify-content: center; align-items: center; font-size: 26px; font-weight: bold; color: #555; background: #f7f7f7; }
    .category-title { font-size: 15px; font-weight: bold; color: #333; }

    /* PRODUK TERBARU */
    .product-latest-img { width: 100%; height: 170px; object-fit: cover; border-radius: 12px; }

    /* LINK SEE ALL */
    .link-see-all { font-size: 14px; font-weight: bold; color: #014288; text-decoration: none; }
    .link-see-all:hover { text-decoration: underline; }
</style>

<div class="landing-wrapper">

    <div class="row g-4">

        {{-- HERO LEFT --}}
        <div class="col-md-8 col-12" data-aos="fade-right" data-aos-duration="1000">
            <div class="left-big">
                <img src="{{ asset('storage/gambar/minum.png') }}" class="left-img">
                <div class="left-text">
                    <p style="margin:0;">100% Natural</p>
                    <h1>Produk Terbaik<br>Untuk Kebutuhan Anda</h1>
                    <p style="margin:5px 0;">Belanja lebih mudah, cepat, dan hemat hanya di SSPLACESHOP</p>
                    <a href="{{ route('produk.public') }}" class="left-btn">Lihat Produk</a>
                </div>
            </div>
        </div>

        {{-- HERO RIGHT --}}
        <div class="col-md-4 col-12 d-flex flex-column gap-4" data-aos="fade-left" data-aos-duration="1000">

            <div class="right-img-box" data-aos="zoom-in" data-aos-duration="900">
                <img src="{{ asset('storage/gambar/snack.png') }}" class="right-img">
                <div class="right-text">
                    <h5>Snack & Camilan</h5>
                    <p>Pilihan makanan ringan terbaik</p>
                    <a href="{{ route('kategori.show', 2) }}" class="see-more">Lihat Selengkapnya →</a>
                </div>
            </div>

            <div class="right-img-box" data-aos="zoom-in" data-aos-duration="900">
                <img src="{{ asset('storage/gambar/roti.png') }}" class="right-img">
                <div class="right-text">
                    <h5>Roti & Sarapan</h5>
                    <p>Mulai hari dengan yang enak</p>
                    <a href="{{ route('kategori.show', 1) }}" class="see-more">Lihat Selengkapnya →</a>
                </div>
            </div>

        </div>

    </div>

</div>

{{-- CATEGORY --}}
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold">Category</h4>
        <a href="{{ route('kategori.public') }}" class="link-see-all">
            Lihat Semua Kategori
        </a>
    </div>

    @php
        $icons = [
            'minuman' => ['🥤', '#FFE9F3'],
            'makanan_ringan' => ['🍪', '#FFF4DE'],
            'makanan_berat' => ['🥐', '#E6F7FF'],
            'buah' => ['🍎', '#E7FFE9'],
            'sayur' => ['🥦', '#F1FFF0'],
            'bumbu' => ['🧂', '#FFF3F0'],
            'daging' => ['🍗', '#FFF0F0'],
            'seafood' => ['🐟', '#E8F5FF'],
        ];
        $defaultIcon = ['🛒', '#F5F5F5'];
    @endphp

    <div class="row g-4">
        @foreach ($kategoris as $kategori)
            @php
                $key = str_replace(' ', '_', strtolower($kategori->nama_kategori));
                $icon = $icons[$key][0] ?? $defaultIcon[0];
                $bg   = $icons[$key][1] ?? $defaultIcon[1];
            @endphp

            <div class="col-lg-2 col-md-3 col-6" data-aos="fade-up" data-aos-duration="800">
                <a href="{{ route('kategori.show', $kategori->id_kategori) }}" class="text-decoration-none">
                    <div class="category-card">
                        <div class="category-icon" style="background: {{ $bg }};">{{ $icon }}</div>
                        <div class="category-title">{{ $kategori->nama_kategori }}</div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

{{-- PRODUK TERBARU --}}
<div class="d-flex justify-content-between align-items-center mt-5 mb-3">
    <h3 class="fw-bold">Produk Terbaru</h3>
    <a href="{{ route('produk.public') }}" class="link-see-all">
        Lihat Semua Produk
    </a>
</div>

<div class="row g-4 mt-2">
    @foreach ($produksTerbaru as $p)
    <div class="col-lg-2 col-md-3 col-6 product-item" data-aos="fade-up" data-aos-duration="900">
        <a href="{{ route('produk.show', $p->id_produk) }}" class="text-decoration-none text-dark">
            <div class="category-card">
                <img src="{{ asset('storage/gambar/' . $p->gambar_produk) }}" class="product-latest-img mb-2">
                <div class="fw-bold product-name">{{ $p->nama_produk }}</div>
                <div class="text" style="color: #014288">Rp {{ number_format($p->harga) }}</div>
            </div>
        </a>
    </div>
    @endforeach
</div>

@endsection
