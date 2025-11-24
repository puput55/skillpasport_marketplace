<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #ffffff; /* putih */
            color: #014288; /* teks biru */
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #F2F2F2; /* abu muda hampir putih */
            position: fixed;
            top: 0;
            left: 0;
            color: #014288; /* biru */
            border-right: 1px solid #dadada;
        }

        .sidebar h4 {
            padding: 20px;
            font-weight: bold;
            border-bottom: 1px solid #dcdcdc;
            color: #014288;
            text-align: center;
        }

        .sidebar a {
            color: #014288;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: background 0.2s ease;
        }

        .sidebar a:hover {
            background-color: #e3f2fd; /* biru sangat muda */
        }

        .sidebar .active {
            background-color: #bbdefb; /* biru muda */
        }

        .sidebar i {
            width: 20px;
            margin-right: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="sidebar">

    {{-- ================= TAMPILAN ADMIN ================= --}}
    @if(Auth::user()->role == 'admin')

        <h4>Admin Panel</h4>

        <a href="{{route('admin.dashboard')}}">
            <i class="fa-solid fa-gauge"></i> Dashboard
        </a>

        <a href="{{route('admin.user.index')}}">
            <i class="fa-solid fa-users"></i> Manajemen User
        </a>

        <a href="{{route('admin.toko.index')}}">
            <i class="fa-solid fa-store"></i> Manajemen Toko
        </a>

        <a href="{{route('admin.kategori.index')}}">
            <i class="fa-solid fa-tags"></i> Kategori Produk
        </a>

        {{-- <a href="{{route('admin.produk.index')}}">
            <i class="fa-solid fa-box-open"></i> Manajemen Produk
        </a> --}}

        <a href="{{route('admin.gambar.index')}}">
            <i class="fa-solid fa-image"></i> Gambar Produk
        </a>

        <a href="{{route('logout')}}" onclick="return confirm('Yakin ingin keluar?')">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>

    {{-- ================= TAMPILAN MEMBER ================= --}}
    @elseif(Auth::user()->role == 'member')

        <h4>Member Area</h4>

        <a href="{{route('member.member')}}">
            <i class="fa-solid fa-gauge"></i> Dashboard Member
        </a>

        <a href="{{route('member.toko')}}">
            <i class="fa-solid fa-store"></i> Toko Saya
        </a>

        <a href="{{route('member.produk.index')}}">
            <i class="fa-solid fa-box-open"></i> Produk Saya
        </a>

        <a href="{{route('logout')}}">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>

    @endif

</div>


    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
