@extends('admin.template')
@section('content')
<div class="card shadow p-3" style="background-color:#e0d3ab; border-radius:10px;">
    <div class="card-body">
        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color:#3b3b3b;">Manajemen Produk</h4>
            <a href="{{ route('admin.produk.create') }}"
               class="btn"
               style="background-color:#3b3b3b; color:#e0d3ab;">
               <i class="fa fa-plus"></i> Tambah Produk
            </a>
        </div>

        {{-- Tabel --}}
        <table class="table table-bordered align-middle text-center">
            <thead style="background-color:#3b3b3b; color:#e0d3ab;">
                <tr>
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Upload</th>
                    <th>Toko</th>
                    <th style="width:180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($produks->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center" style="color:#3b3b3b;">
                            Belum ada produk yang ditambahkan.
                        </td>
                    </tr>
                @else
                    @foreach ($produks as $produk)
                        <tr>
                            <td>{{ $produk->id_produk }}</td>
                            <td>{{ $produk->kategori->nama_kategori ?? '-' }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ $produk->deskripsi }}</td>
                            <td>{{ \Carbon\Carbon::parse($produk->tanggal_upload)->format('d-m-Y') }}</td>
                            <td>{{ $produk->toko->nama_toko ?? '-' }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('admin.produk.edit', $produk->id_produk) }}"
                                       class="btn sm"
                                       style="background-color:#3b3b3b; color:#e0d3ab;">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.produk.destroy', $produk->id_produk) }}"
                                          method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn sm"
                                                style="background-color:#a83232; color:#e0d3ab;">
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
