@extends('admin.template')
@section('content')

<div class="card shadow p-3"
     style="background-color: #ffffff; border-radius:10px; border:1px solid #dce3f0;">

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
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">

        {{-- Tombol Tambah --}}
        <div class="d-flex justify-content-end align-items-center mb-3">
            <a href="{{ route('admin.gambar.create') }}"
               class="btn"
               style="background-color:#014288; color:#ffffff; border-radius:6px;">
                <i class="fa fa-plus"></i> Tambah Gambar Produk
            </a>
        </div>

        <table class="table table-bordered align-middle text-center"
               style="border-color:#c7d7f2;">
            <thead style="background-color:#f4f8ff;">
                <tr style="color:#014288;">
                    <th>ID</th>
                    <th>Produk</th>
                    <th>Nama Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @if($gambar_produks->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center" style="color:#014288;">
                            Belum ada gambar produk yang ditambahkan.
                        </td>
                    </tr>
                @else
                    @foreach ($gambar_produks as $gambar_produk)
                        <tr>
                            <td style="color:#014288;">{{ $gambar_produk->id_gambar }}</td>
                            <td style="color:#014288;">{{ $gambar_produk->produk->nama_produk ?? '-' }}</td>
                            <td style="color:#014288;">{{ $gambar_produk->nama_gambar }}</td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('admin.gambar.edit', $gambar_produk->id_gambar) }}"
                                       class="btn sm"
                                       style="background-color:#014288; color:#ffffff; border-radius:6px;">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('admin.gambar.destroy', $gambar_produk->id_gambar) }}"
                                          method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus gambar produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn sm"
                                            style="background-color:#d9534f; color:#ffffff; border-radius:6px;">
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
