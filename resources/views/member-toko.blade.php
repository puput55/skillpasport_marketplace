@extends('template')

@section('content')

<div class="card shadow p-4" style="background:white; border-radius:10px; border:2px solid #014288;">
    <h2 style="color:#014288;">Hai {{ auth()->user()->nama }}</h2>
    <p style="color:#014288;">Selamat datang di halaman toko Anda!</p>

    <a href="{{ route('logout') }}" class="btn mt-3"
       style="background:#014288; color:white; font-weight:600;">
        Logout
    </a>
</div>

@endsection
