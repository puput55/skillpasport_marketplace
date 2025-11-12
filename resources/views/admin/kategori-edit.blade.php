@extends('admin.template')
@section('content')
    <div class="card shadow p-3" style="background-color: #e0d3ab; border-radius:10px;">

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
            <h4 style="color: #3b3b3b;">Edit Kategori</h4>
        </div>
        <form action="{{route('admin.kategori.update',$kategori->id_kategori) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="{{$kategori->nama_kategori}}" required>
            </div>
            <button type="submit"
                class="btn" style="background-color:#3b3b3b; color:#e0d3ab;">Perbarui</button>
            <a href="{{ route('admin.kategori.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
