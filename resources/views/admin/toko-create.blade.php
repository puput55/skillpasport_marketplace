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
        <div class="alert alert-success alert-dismissible"
             role="alert"
             style="background-color:#014288; color:white;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color:#014288;">Tambah Toko Baru</h4>
        </div>

        <form action="{{ route('admin.toko.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Nama Toko</label>
                <input type="text" name="nama_toko" id="nama_toko"
                       class="form-control"
                       placeholder="Masukkan nama toko" required>
            </div>

            <select name="id_user" class="form-control" required>
                <option value="">-- Pilih Pemilik --</option>
                @foreach($members as $member)
                    <option value="{{ $member->id_user }}">{{ $member->nama }} ({{ $member->username }})</option>
                @endforeach
            </select>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5"
                          class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Gambar</label>
                <input type="file" name="gambar" id="gambar"
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Kontak Toko</label>
                <input type="number" name="kontak_toko" id="kontak_toko"
                       class="form-control"
                       placeholder="Masukkan nomor kontak" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="5"
                          class="form-control" required></textarea>
            </div>
            <input type="hidden" name="id_user" value="{{ auth()->id() }}">

            <button type="submit"
                class="btn"
                style="background-color:#014288; color:#ffffff; border-radius:6px;">
                Tambah
            </button>

            <a href="{{ route('admin.toko.index') }}"
               class="btn"
               style="background-color:#6c757d; color:white; border-radius:6px;">
                Batal
            </a>

        </form>

    </div>
</div>

@endsection
