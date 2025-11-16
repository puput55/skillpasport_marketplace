<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Marketplace')</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            margin: 0;
            /* background-color: #014288; Biru utama */
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: white; /* Navbar putih */
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #014288;
            font-weight: 600;
        }

        nav a:hover {
            color: #012f66;
        }

        .search-input {
            background: #ffffff;
            border: 1px solid #014288;
            color: #014288;
        }

        .search-input::placeholder {
            color: #7a99c5;
        }

        .btn-search {
            background: #014288;
            color: white;
            font-weight: bold;
        }

        .btn-search:hover {
            background: #01366c;
        }

        footer {
            background-color: white;
            text-align: center;
            padding: 15px;
            font-weight: bold;
            color: #014288;
            box-shadow: 0 -2px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>

<body>

<nav class="d-flex justify-content-between align-items-center">

    <!-- LOGO + EMOJI -->
    <div style="font-weight:bold; font-size:20px; color:#014288; display:flex; align-items:center; gap:8px;">
        <span style="font-size:26px;">🧺</span>
        SSPLACESHOP
    </div>

    <!-- SEARCH BAR -->
    <form action="/search" method="GET"
          class="d-flex"
          style="gap: 5px; width: 1000px;">

        <input type="text" name="q" class="form-control search-input"
               placeholder="Cari produk..."
               style="width:100%;">

        <button class="btn btn-sm btn-search">
            <i class="fa fa-search"></i>
        </button>
    </form>

    <!-- MENU NAV -->
    <div>
        <a href="/">Produk</a>
        <a href="/toko">Kategori</a>
        <a href="/produk">Profile</a>
    </div>
</nav>

@yield('content')

{{-- <footer>
    © 2025 Marketplace by Kamu
</footer> --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
