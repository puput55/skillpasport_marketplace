@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #e0d3ab; border-radius:10px;">

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
            <h4 style="color: #3b3b3b;">Manajemen User</h4>
            <a href="{{ route('admin.user.create') }}"
               class="btn"
               style="background-color:#3b3b3b; color:#e0d3ab;">
                <i class="fa fa-plus"></i> Tambah User
            </a>
        </div>

        <table class="table table-bordered align-middle text-center">
            <thead style="background-color: #3b3b3b; color: #e0d3ab;">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Role</th>
                    <th style="width: 180px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($users->isEmpty())
                    <tr>
                        <td colspan="9" class="text-center" style="color:#3b3b3b;">
                            Belum ada user yang ditambahkan.
                        </td>
                    </tr>
                @else
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->kontak }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->password }}</td>
                    <td>{{ $user->role }}</td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('admin.user.edit', $user->id) }}"
                               class="btn btn-sm"
                               style="background-color:#3b3b3b; color:#e0d3ab;">
                                <i class="fa fa-edit"></i> Edit
                            </a>

                            <form action="{{ route('admin.user.destroy', $user->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm"
                                        style="background-color:#8b0000; color:#e0d3ab;">
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
