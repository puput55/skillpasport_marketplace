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

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color:#014288; font-weight:600;">Edit Kategori</h4>
        </div>

        <form action="{{ route('admin.kategori.update', $kategori->id_kategori) }}"
              method="POST" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Nama Kategori</label>
                <input type="text"
                       name="nama_kategori"
                       id="nama_kategori"
                       class="form-control"
                       style="border-color:#c7d7f2;"
                       value="{{ $kategori->nama_kategori }}"
                       required>
            </div>

            <button type="submit"
                class="btn"
                style="background-color:#014288; color:#ffffff; border-radius:6px;">
                Perbarui
            </button>

            <a href="{{ route('admin.kategori.index') }}"
               class="btn btn-secondary"
               style="border-radius:6px;">
                Batal
            </a>

        </form>

    </div>
</div>

@endsection
