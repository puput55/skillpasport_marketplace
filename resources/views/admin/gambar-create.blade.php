@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #e0d3ab; border-radius:10px;">
    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Tampilkan pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color: #3b3b3b;">Tambah Gambar Produk</h4>
        </div>
        <form action="{{route('admin.gambar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Produk</label>
                <select name="id_produk" id="id_produk" class="form-select" required>
                    <option value="">Pilih Produk</option>
                        @foreach ($produks as $produk)
                            <option value="{{ $produk->id_produk }}">{{ $produk->nama_produk }}</option>
                        @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Nama Gambar</label>
                <input type="text" name="nama_gambar" id="nama_gambar" class="form-control" placeholder="Masukkan nama gambar produk" required>
            </div>
            <button type="submit"
                class="btn" style="background-color:#3b3b3b; color:#e0d3ab;">Tambah</button>
            <a href="{{ route('admin.gambar.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
