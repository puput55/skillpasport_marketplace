@extends('admin.template')

@section('content')

<style>
    .toko-wrapper {
        background: #ffffff;
        padding: 25px;
        border-radius: 12px;
        border: 1px solid #dce3f0;
        box-shadow: 0 3px 8px rgba(0,0,0,0.1);
    }

    .toko-img-circle {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #014288;
    }

    .toko-name {
        font-size: 26px;
        font-weight: bold;
        color: #014288;
        margin-bottom: 5px;
    }

    .label-title {
        color: #014288;
        font-weight: bold;
        margin-top: 20px;
        border-left: 5px solid #014288;
        padding-left: 10px;
    }

    .btn-add-small {
        background-color: #014288;
        color: white;
        padding: 6px 14px;
        font-size: 13px;
        border-radius: 6px;
    }
    .btn-add-small:hover {
        background-color: #013569;
        color: white;
    }

    .product-card img {
        height: 170px;
        object-fit: cover;
        border-radius: 10px 10px 0 0;
    }

    .welcome-user {
        font-size: 22px;
        font-weight: bold;
        color: #014288;
        margin-bottom: 20px;
    }

    .btn-edit {
        background-color: #014288;
        color: white;
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 13px;
    }
    .btn-edit:hover {
        background-color: #013569;
        color: white;
    }

    .btn-delete {
        background-color: #d9534f;
        color: white;
        border-radius: 5px;
        padding: 5px 10px;
        font-size: 13px;
    }
    .btn-delete:hover {
        background-color: #c9302c;
        color: white;
    }
</style>

<div class="container mt-5">

    <!-- =========== NAMA USER LOGIN =========== -->
    <p class="welcome-user">Selamat datang, {{ Auth::user()->nama }} 👋</p>

    <div class="toko-wrapper">

        <!-- ================= INFO TOKO ================= -->
        <div class="row align-items-center">
            <div class="col-md-3 text-center">
               <img
                    src="{{ $toko && $toko->gambar ? asset('storage/gambar/' . $toko->gambar) : asset('storage/default.png') }}"
                    class="toko-img-circle"
                    alt="{{ $toko->nama_toko ?? 'Tidak ada toko' }}"
                >
            </div>

            <div class="col-md-9">
                <h3 class="toko-name">{{ $toko->nama_toko }}</h3>

                <p>{{ $toko->deskripsi }}</p>

                <p><strong>Kontak:</strong> {{ $toko->kontak_toko }}</p>
                <p><strong>Alamat:</strong> {{ $toko->alamat }}</p>
{{--
                <a href="{{ route('member.produk.create') }}" class="btn btn-add-small mt-2">
                    + Tambah Produk
                </a> --}}
            </div>
        </div>

        <!-- ================= PRODUK ================= -->
        <h4 class="label-title mt-4">Produk</h4>

        <div class="row mt-3">
            @if ($product->isEmpty())
                <p class="text-muted ms-3">Belum ada produk di toko ini.</p>
            @else
                @foreach ($product as $produk)
                    <div class="col-md-4 mb-4">
                        <div class="card product-card shadow-sm">
                            <img
                                src="{{ asset('storage/gambar/' . $produk->gambar_produk) }}"
                                class="card-img-top"
                                alt="{{ $produk->nama_produk }}"
                            >

                            <div class="card-body">
                                <h5 class="card-title">{{ $produk->nama_produk }}</h5>
                                <p class="card-text">Harga: Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                                <p class="card-text">Stok: {{ $produk->stok }}</p>
{{--
                                <!-- BUTTON EDIT & DELETE -->
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('member.produk.edit', $produk->id_produk) }}"
                                       class="btn btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('member.produk.destroy', $produk->id_produk) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-delete">
                                            Delete
                                        </button>
                                    </form>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection
