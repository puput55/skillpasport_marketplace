@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #ffffff; border-radius:10px;">

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
            <h4 style="color: #014288;">Manajemen User</h4>
            <a href="{{ route('admin.user.create') }}"
               class="btn text-white"
               style="background-color:#014288;">
                <i class="fa fa-plus"></i> Tambah User
            </a>
        </div>

        <table class="table table-bordered align-middle text-center">
            <thead style="background-color: #014288; color: #ffffff;">
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
                        <td colspan="9" class="text-center" style="color:#014288;">
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
                    <td>
                        @if($user->role === 'member')
                            @if($user->status === 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @else
                                <span class="badge bg-success">Active</span>
                            @endif
                        @else
                            -
                        @endif
                    </td>

                    <td class="text-center">
                        <div class="d-flex justify-content-center gap-2">
                            @if($user->role === 'member' && $user->status === 'pending')
                                <a href="{{ route('user.approve', $user->id) }}"
                                class="btn btn-sm text-white"
                                style="background-color:#28a745;"
                                onclick="return confirm('Yakin ingin mengaktifkan member ini?');">
                                    <i class="fa fa-check"></i> ACC
                                </a>
                            @endif

                            <a href="{{ route('admin.user.edit', $user->id) }}"
                            class="btn btn-sm text-white"
                            style="background-color:#014288;">
                                <i class="fa fa-edit"></i> Edit
                            </a>


                            <form action="{{ route('admin.user.destroy', $user->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn btn-sm text-white"
                                        style="background-color:#8b0000;">
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
