@extends('admin.template')
@section('content')
<div class="card shadow p-2" style="background-color: #e0d3ab; border-radius:10px;">
    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li> {{-- Menampilkan pesan error validasi --}}
                    @endforeach
                </ul>
            </div>
        @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }} {{-- Menampilkan pesan sukses --}}
        </div>
    @endif

    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Edit User</h4>
        </div>

        <form action="{{ route('admin.user.update', $user->id_user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') {{-- penting agar update berjalan dengan benar --}}

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $user->nama }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kontak</label>
                <input type="number" name="kontak" id="kontak" class="form-control" value="{{ $user->kontak }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ $user->username }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" value="{{ $user->password }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                </select>
            </div>

            <button type="submit" class="btn text-white" style="background-color: #3b3b3b;">Perbarui</button>
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
