@extends('template')

@section('content')

<div class="card shadow p-4" style="background:#e0d3ab; border-radius:10px;">
    <h2 style="color:#3b3b3b;">Hai {{ auth()->user()->nama }}</h2>
    <p style="color:#3b3b3b;">Selamat datang di halaman toko Anda!</p>

    <a href="{{ route('logout') }}" class="btn btn-dark mt-3">Logout</a>
</div>

@endsection
