@extends('admin.template')
@section('content')

<div class="card shadow p-3"
     style="background-color:#ffffff; border-radius:10px; border:1px solid #dce3f0;">

    {{-- Error Validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Pesan Sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color:#014288; font-weight:600;">Edit Produk</h4>
        </div>

        <form action="{{ route('member.produk.update', $produk->id_produk) }}"
              method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Kategori</label>
                <select name="id_kategori" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id_kategori }}"
                            {{ $produk->id_kategori == $kategori->id_kategori ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Nama Produk</label>
                <input type="text" name="nama_produk" class="form-control"
                       value="{{ $produk->nama_produk }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Gambar</label>
                <input type="file" name="gambar_produk" id="gambar_produk" class="form-control">
                <small>Biarkan kosong jika tidak ingin mengganti gambar.</small>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Harga</label>
                <input type="number" name="harga" class="form-control"
                       value="{{ $produk->harga }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Stok</label>
                <input type="number" name="stok" class="form-control"
                       value="{{ $produk->stok }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Deskripsi</label>
                <textarea name="deskripsi" class="form-control"
                          rows="6" required>{{ $produk->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Tanggal Upload</label>
                <input type="date" name="tanggal_upload" class="form-control"
                       value="{{ $produk->tanggal_upload }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Toko</label>
                <select name="id_toko" class="form-select" required>
                    <option value="">Pilih Toko</option>
                    @foreach ($tokos as $toko)
                        <option value="{{ $toko->id_toko }}"
                            {{ $produk->id_toko == $toko->id_toko ? 'selected' : '' }}>
                            {{ $toko->nama_toko }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="btn"
                style="background-color:#014288; color:#ffffff; border-radius:6px;">
                Perbarui
            </button>

            <a href="{{ route('member.produk.index') }}"
               class="btn btn-secondary"
               style="border-radius:6px;">
                Batal
            </a>

        </form>

    </div>
</div>

@endsection
