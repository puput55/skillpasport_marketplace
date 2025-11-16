@extends('admin.template')
@section('content')

<div class="card shadow p-3"
     style="background-color:#ffffff; border-radius:10px; border:1px solid #dce3f0;">

    {{-- Error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color:#014288; font-weight:600;">Edit User</h4>
        </div>

        <form action="{{ route('admin.user.update', $user->id_user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control"
                       value="{{ $user->nama }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Kontak</label>
                <input type="number" name="kontak" id="kontak" class="form-control"
                       value="{{ $user->kontak }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Username</label>
                <input type="text" name="username" id="username" class="form-control"
                       value="{{ $user->username }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Password</label>
                <input type="password" name="password" id="password" class="form-control"
                       value="{{ $user->password }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label" style="color:#014288;">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="member" {{ $user->role == 'member' ? 'selected' : '' }}>Member</option>
                </select>
            </div>

            <button type="submit"
                    class="btn"
                    style="background-color:#014288; color:white;">
                Perbarui
            </button>

            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Batal</a>
        </form>

    </div>
</div>

@endsection
