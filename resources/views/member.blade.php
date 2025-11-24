@extends('template')

@section('content')

<style>
.store-wrapper {
    padding: 20px;
}

/* HEADER TOKO */
.store-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 30px;
    flex-wrap: wrap;
    gap: 15px;
}

.store-info {
    display: flex;
    align-items: center;
    gap: 20px;
}

.store-avatar {
    width: 100px;
    height: 100px;
    border-radius: 12px;
    object-fit: cover;
    border: 2px solid #014288;
}

.store-name {
    font-size: 28px;
    font-weight: bold;
    color: #014288;
}

.store-contact {
    font-size: 14px;
    color: #4a6f9e;
    margin-top: 5px;
}

.store-products-title {
    font-size: 22px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #014288;
}

/* PRODUK TOKO */
.product-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 10px;
    text-align: center;
    transition: 0.25s;
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    border: 1px solid #f0f0f0;
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 18px rgba(0,0,0,0.10);
}

.product-img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 10px;
}

.product-name {
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
}

.product-price {
    color: #014288;
    font-weight: 600;
}
</style>

<div class="store-wrapper">

    {{-- HEADER TOKO --}}
    <div class="store-header">
        <div class="store-info">
            {{-- <img src="{{ asset('storage/gambar/'.$toko->gambar) }}" class="store-avatar" alt="Toko Avatar"> --}}
            <div>
                <div class="store-name">{{ $toko->nama_toko }}</div>
                <div class="store-contact">
                    <i class="fa-solid fa-phone me-2"></i>{{ $toko->kontak_toko }} <br>
                    <i class="fa-solid fa-location-dot me-2"></i>{{ $toko->alamat }}
                </div>
                @if($toko->deskripsi)
                    <p class="store-contact" style="margin-top:8px;">{{ $toko->deskripsi }}</p>
                @endif
            </div>
        </div>
    </div>

    {{-- SEARCH PRODUK --}}
    <div class="mb-4">
        <input type="text" id="memberSearchInput" class="form-control search-input" placeholder="Cari produk toko ini...">
    </div>

    {{-- PRODUK TOKO --}}
    <div class="store-products-title">Produk Toko</div>

    <div class="row g-4" id="memberProductList">
        @forelse ($toko->produks as $produk)
        <div class="col-lg-3 col-md-4 col-6 product-item">
            <a href="{{ route('produk.show', $produk->id_produk) }}" class="text-decoration-none">
                <div class="product-card">
                    <img src="{{ asset('storage/gambar/'.$produk->gambar_produk) }}" class="product-img">
                    <div class="product-name">{{ $produk->nama_produk }}</div>
                    <div class="product-price">Rp {{ number_format($produk->harga) }}</div>
                </div>
            </a>
        </div>
        @empty
        <div class="col-12">
            <p style="color:#4a6f9e; font-weight:bold;">Toko ini belum memiliki produk.</p>
        </div>
        @endforelse
    </div>

</div>

{{-- LIVE SEARCH --}}
{{-- <script>
const memberSearchInput = document.getElementById('memberSearchInput');
const memberProducts = document.querySelectorAll('#memberProductList .product-item');

if(memberSearchInput && memberProducts.length > 0){
    memberSearchInput.addEventListener('input', function() {
        const filter = memberSearchInput.value.toLowerCase();
        memberProducts.forEach(function(item) {
            const name = item.querySelector('.product-name').textContent.toLowerCase();
            if(name.includes(filter)) {
                item.style.display = '';
            } else {
                item.style.display = 'none';
            }
        });
    });
}
</script> --}}

@endsection
