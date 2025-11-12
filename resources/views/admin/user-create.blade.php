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
        <div class="d-flex justify-content-between align-items-center">
            <h4>Tambah User Baru</h4>
        </div>
        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kontak</label>
                <input type="number" id="kontak" name="kontak" class="form-control" placeholder="Masukkan nomor kontak" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Masukan username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan password" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" id="role" class="form-control" required>
                    <option value="" disabled selected hidden>Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select>
            </div>
            <button type="submit"
                class="btn" style="background-color:#3b3b3b; color:#e0d3ab;">Tambah</button>
            <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>

@endsection
