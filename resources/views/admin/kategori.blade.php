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
            <h4 style="color: #3b3b3b">Kategori Produk</h4>
            <a href="{{route('admin.kategori.create') }}" class="btn" style="background-color: #3b3b3b; color:#e0d3ab">
                <i class="fa fa-plus"></i>Tambah Kategori
            </a>
        </div>
        <table class="table table-bordered align-middle text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($kategoris->isEmpty())
                    <tr>
                        <td colspan="2" class="text-center" style="color:#3b3b3b;">
                            Belum ada kategori yang ditambahkan.
                        </td>
                    </tr>
                @else
                @foreach($kategoris as $kategori)
                <tr>
                    <td>{{ $kategori->id_kategori }}</td>
                    <td>{{ $kategori->nama_kategori }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('admin.kategori.edit', $kategori->id_kategori) }}" class="btn sm" style="background-color:#3b3b3b; color:#e0d3ab;">
                                <i class="fa fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.kategori.destroy', $kategori->id_kategori) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn sm" style="background-color:#d9534f; color:#fff;">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
