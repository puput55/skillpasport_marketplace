@extends('admin.template')
@section('content')
<div class="card shadow p-3" style="background-color:#e0d3ab; border-radius:10px;">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <h4 style="color:#3b3b3b;">Edit Gambar Produk</h4>

    <form action="{{ route('admin.gambar.update', $gambar_produk->id_gambar) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Produk</label>
            <select name="id_produk" class="form-select" required>
                <option value="">Pilih Produk</option>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->id_produk }}"
                        {{ $gambar_produk->id_produk == $produk->id_produk ? 'selected' : '' }}>
                        {{ $produk->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Gambar</label>
            <input type="text" name="nama_gambar" class="form-control"
                   value="{{ $gambar_produk->nama_gambar }}" required>
        </div>

        <button type="submit" class="btn" style="background:#3b3b3b;color:#e0d3ab;">
            Perbarui
        </button>
        <a href="{{ route('admin.gambar.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
