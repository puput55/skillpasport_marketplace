@extends('admin.template')
@section('content')

<div class="card shadow p-3"
     style="background-color:#ffffff; border-radius:10px; border:1px solid #dce3f0;">

    <div class="card-body">

        {{-- Pesan sukses --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible"
                 role="alert"
                 style="background-color:#014288; color:white;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Header --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color:#014288;">Manajemen Produk</h4>

            <a href="{{ route('member.produk.create') }}"
               class="btn"
               style="background-color:#014288; color:#ffffff; border-radius:6px;">
                <i class="fa fa-plus"></i> Tambah Produk
            </a>
        </div>

        {{-- Tabel --}}
        <table class="table table-bordered align-middle text-center"
               style="border-color:#c7d7f2;">
            <thead style="background-color:#f4f8ff;">
                <tr style="color:#014288;">
                    <th>ID</th>
                    <th>Kategori</th>
                    <th>Nama Produk</th>
                    <th>Gambar Produk</th>
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
                        <td colspan="9" class="text-center" style="color:#014288;">
                            Belum ada produk yang ditambahkan.
                        </td>
                    </tr>
                @else
                    @foreach ($produks as $produk)
                        <tr style="color:#014288;">
                            <td>{{ $produk->id_produk }}</td>
                            <td>{{ $produk->kategori->nama_kategori ?? '-' }}</td>
                            <td>{{ $produk->nama_produk }}</td>
                            <td>
                                @if($produk->gambar_produk)
                                    <img src="{{ asset('storage/gambar/' . $produk->gambar_produk) }}"
                                        style="width:120px; height:120px; border-radius:5px;">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                            <td>{{ $produk->stok }}</td>
                            <td>{{ Str::limit($produk->deskripsi, 50,'...') }}</td>
                            <td>{{ \Carbon\Carbon::parse($produk->tanggal_upload)->format('d-m-Y') }}</td>
                            <td>{{ $produk->toko->nama_toko ?? '-' }}</td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('member.produk.edit', $produk->id_produk) }}"
                                       class="btn sm"
                                       style="background-color:#014288; color:#ffffff; border-radius:6px;">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('member.produk.destroy', $produk->id_produk) }}"
                                          method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn sm"
                                                style="background-color:#d9534f; color:white; border-radius:6px;">
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
