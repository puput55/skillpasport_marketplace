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
        <div class="d-flex justify-content-end align-items-center mb-3">
            <a href="{{ route('admin.gambar.create') }}" class="btn" style="background-color: #3b3b3b; color:#e0d3ab;">
                <i class="fa fa-plus"></i> Tambah Gambar Produk
            </a>
        </div>
        <table class="table table-bordered align-middle text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produk</th>
                    <th>Nama Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($gambar_produks->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center" style="color:#3b3b3b;">
                            Belum ada gambar produk yang ditambahkan.
                        </td>
                    </tr>
                @else
                    @foreach ($gambar_produks as $gambar_produk)
                        <tr>
                            <td>{{ $gambar_produk->id_gambar }}</td>
                            <td>{{ $gambar_produk->produk->nama_produk ?? '-' }}</td>
                            <td>{{ $gambar_produk->nama_gambar }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.gambar.edit', $gambar_produk->id_gambar) }}" class="btn sm" style="background-color:#3b3b3b; color:#e0d3ab;">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.gambar.destroy', $gambar_produk->id_gambar) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar produk ini?');">
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
