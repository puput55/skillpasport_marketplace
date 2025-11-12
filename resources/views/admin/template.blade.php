<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            /* background-color: #F4EEDC; krem lembut */
            color: #2F2F2F; /* teks abu tua */
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            background-color: #4B4A46; /* abu gelap kehijauan */
            position: fixed;
            top: 0;
            left: 0;
            color: #F4EEDC;
        }
        .sidebar a {
            color: #F4EEDC;
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: background 0.3s ease;
        }
        .sidebar a:hover {
            background-color: #60605B; /* sedikit lebih terang dari sidebar */
        }
        .sidebar .active {
            background-color: #607D8B; /* aksen abu kebiruan */
        }
        .content {
            margin-left: 250px;
            padding: 20px;
        }
        .sidebar h4 {
            padding: 20px;
            border-bottom: 1px solid #60605B;
            font-weight: bold;
        }
        .sidebar i {
            width: 20px;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h4 class="text-center">Admin Toko</h4>
        <a href="{{route('dashboard')}}" class="">
            <i class="fa-solid fa-gauge"></i> Dashboard
        </a>
        <a href="{{route('admin.user.index')}}" class="">
            <i class="fa-solid fa-users"></i> Manajemen User
        </a>
        <a href="{{route('admin.toko.index')}}" class="">
            <i class="fa-solid fa-store"></i> Manajemen Toko
        </a>
        <a href="{{route('admin.kategori.index')}}" class="">
            <i class="fa-solid fa-tags"></i> Kategori Produk
        </a>
        <a href="{{route('admin.produk.index')}}" class="">
            <i class="fa-solid fa-box-open"></i> Manajemen Produk
        </a>
        <a href="{{route('admin.gambar.index')}}" class="">
            <i class="fa-solid fa-image"></i> Gambar Produk
        </a>
        <a href="{{route('beranda')}}" onclick="return confirm('Yakin ingin keluar?')">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </div>
        <div class="content">
            @yield('content')
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
