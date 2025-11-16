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
        <div class="alert alert-success alert-dismissible" role="alert"
             style="background-color:#014288; color:white;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color:#014288;">Kategori Produk</h4>

            <a href="{{ route('admin.kategori.create') }}"
               class="btn"
               style="background-color:#014288; color:#ffffff; border-radius:6px;">
                <i class="fa fa-plus"></i> Tambah Kategori
            </a>
        </div>

        <table class="table table-bordered align-middle text-center"
               style="border-color:#c7d7f2;">
            <thead style="background-color:#f4f8ff;">
                <tr style="color:#014288;">
                    <th>ID</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @if($kategoris->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center" style="color:#014288;">
                            Belum ada kategori yang ditambahkan.
                        </td>
                    </tr>
                @else
                    @foreach($kategoris as $kategori)
                        <tr style="color:#014288;">
                            <td>{{ $kategori->id_kategori }}</td>
                            <td>{{ $kategori->nama_kategori }}</td>

                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">

                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('admin.kategori.edit', $kategori->id_kategori) }}"
                                       class="btn sm"
                                       style="background-color:#014288; color:#ffffff; border-radius:6px;">
                                        <i class="fa fa-edit"></i> Edit
                                    </a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('admin.kategori.destroy', $kategori->id_kategori) }}"
                                          method="POST"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
