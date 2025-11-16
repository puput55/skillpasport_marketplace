@extends('admin.template')
@section('content')
<div class="card shadow p-3" style="background-color: #ffffff; border-radius:10px; border:1px solid #dce3f0;">

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
            <h4 style="color: #014288; font-weight:600;">Edit Toko</h4>
        </div>

        <form action="{{ route('admin.toko.update', $toko->id_toko) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Nama Toko</label>
                <input type="text" name="nama_toko" id="nama_toko" class="form-control"
                       value="{{ $toko->nama_toko }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"
                          class="form-control" required>{{ $toko->deskripsi }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-control">
                <small>Biarkan kosong jika tidak ingin mengganti gambar.</small>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Kontak Toko</label>
                <input type="number" name="kontak_toko" id="kontak_toko"
                       class="form-control" value="{{ $toko->kontak_toko }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="5"
                          class="form-control" required>{{ $toko->alamat }}</textarea>
            </div>

            <button type="submit" class="btn"
                style="background-color:#014288; color:white;">Perbarui</button>

            <a href="{{ route('admin.toko.index') }}" class="btn btn-secondary">Batal</a>

        </form>
    </div>
</div>
@endsection
