@extends('admin.template')
@section('content')

<div class="card shadow p-3"
     style="background-color:#ffffff; border-radius:10px; border:1px solid #dce3f0;">

    {{-- Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Success --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- HEADER --}}
    <h4 style="color:#014288; font-weight:600;">Edit Gambar Produk</h4>

    <form action="{{ route('admin.gambar.update', $gambar_produk->id_gambar) }}"
          method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        {{-- Produk --}}
        <div class="mb-3">
            <label class="form-label" style="color:#014288;">Produk</label>
            <select name="id_produk" class="form-select" style="border-color:#c7d7f2;" required>
                <option value="">Pilih Produk</option>
                @foreach ($produks as $produk)
                    <option value="{{ $produk->id_produk }}"
                        {{ $gambar_produk->id_produk == $produk->id_produk ? 'selected' : '' }}>
                        {{ $produk->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nama Gambar --}}
        <div class="mb-3">
            <label class="form-label" style="color:#014288;">Nama Gambar</label>
            <input type="text"
                   name="nama_gambar"
                   class="form-control"
                   style="border-color:#c7d7f2;"
                   value="{{ $gambar_produk->nama_gambar }}"
                   required>
        </div>

        {{-- BUTTONS --}}
        <button type="submit"
                class="btn"
                style="background:#014288; color:#ffffff; border-radius:6px;">
            Perbarui
        </button>

        <a href="{{ route('admin.gambar.index') }}"
           class="btn btn-secondary"
           style="border-radius:6px;">
            Batal
        </a>

    </form>
</div>

@endsection
