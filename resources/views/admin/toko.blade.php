@extends('admin.template')
@section('content')

<div class="card shadow p-3"
     style="background-color: #ffffff; border-radius:10px; border:1px solid #dce3f0;">

    {{-- Error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Pesan sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color:#014288; font-weight:600;">Manajemen Toko</h4>

            <a href="{{ route('admin.toko.create') }}"
               class="btn"
               style="background-color:#014288; color:white;">
                <i class="fa fa-plus"></i> Tambah Toko
            </a>
        </div>

        <table class="table table-bordered align-middle text-center">
            <thead style="background-color:#014288; color:white;">
                <tr>
                    <th>ID</th>
                    <th>Nama Toko</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Kontak</th>
                    <th>Alamat</th>
                    <th style="width:180px;">Aksi</th>
                </tr>
            </thead>

            <tbody style="color:#3b3b3b;">
                @if($tokos->isEmpty())
                    <tr>
                        <td colspan="7" class="text-center">
                            Belum ada toko yang ditambahkan.
                        </td>
                    </tr>
                @else
                @foreach($tokos as $toko)
                <tr>
                    <td>{{ $toko->id_toko }}</td>
                    <td>{{ $toko->nama_toko }}</td>
                    <td>{{ $toko->deskripsi }}</td>

                    <td>
                        @if($toko->gambar)
                            <img src="{{ asset('storage/gambar/' . $toko->gambar) }}"
                                 style="width:100px; height:auto; border-radius:5px;">
                        @else
                            Tidak ada gambar
                        @endif
                    </td>

                    <td>{{ $toko->kontak_toko }}</td>
                    <td>{{ $toko->alamat }}</td>

                    <td>
                        <div class="d-flex justify-content-center gap-2">

                            <a href="{{ route('admin.toko.edit', $toko->id_toko) }}"
                               class="btn btn-sm"
                               style="background-color:#014288; color:white;">
                                <i class="fa fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('admin.toko.destroy', $toko->id_toko) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus toko ini?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm"
                                        style="background-color:#8b0000; color:white;">
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
