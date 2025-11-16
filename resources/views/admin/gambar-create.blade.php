@extends('admin.template')
@section('content')

<div class="card shadow p-2"
     style="background-color: #ffffff; border-radius:10px; border:1px solid #dce3f0;">

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
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color:#014288; font-weight:600;">Tambah Gambar Produk</h4>
        </div>

        <form action="{{ route('admin.gambar.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Produk --}}
            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Produk</label>
                <select name="id_produk" id="id_produk" class="form-select"
                        style="border-color:#c7d7f2;" required>
                    <option value="">Pilih Produk</option>
                    @foreach ($produks as $produk)
                        <option value="{{ $produk->id_produk }}">{{ $produk->nama_produk }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Nama Gambar --}}
            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Nama Gambar</label>
                <input type="text"
                       name="nama_gambar"
                       id="nama_gambar"
                       class="form-control"
                       style="border-color:#c7d7f2;"
                       placeholder="Masukkan nama gambar produk"
                       required>
            </div>

            {{-- BUTTONS --}}
            <button type="submit"
                class="btn"
                style="background-color:#014288; color:#ffffff; border-radius:6px;">
                Tambah
            </button>

            <a href="{{ route('admin.gambar.index') }}"
               class="btn btn-secondary"
               style="border-radius:6px;">
                Batal
            </a>

        </form>
    </div>
</div>

@endsection
