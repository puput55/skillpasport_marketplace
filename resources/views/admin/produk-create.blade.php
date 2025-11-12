@extends('admin.template')
@section('content')
<div class="card shadow p-3" style="background-color: #e0d3ab; border-radius:10px;">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color: #3b3b3b;">Tambah Produk Baru</h4>
        </div>
            <form action="{{route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select name="id_kategori" id="id_kategori" class="form-select" required>
                        <option value="">Pilih Kategori</option>
                         @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id_kategori }}">{{ $kategori->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Produk</label>
                    <input type="text" name="nama_produk" id="nama_produk" class="form-control" placeholder="Masukkan nama produk" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" placeholder="Masukkan harga produk" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Stok</label>
                    <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukkan stok produk" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Upload</label>
                    <input type="date" name="tanggal_upload" id="tanggal_upload" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Toko</label>
                    <select name="id_toko" id="id_toko" class="form-select" required>
                        <option value="">Pilih Toko</option>
                        @foreach ($tokos as $toko)
                            <option value="{{ $toko->id_toko }}">{{ $toko->nama_toko }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit"
                    class="btn" style="background-color:#3b3b3b; color:#e0d3ab;">Tambah</button>
                <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
