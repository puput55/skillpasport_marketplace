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
            background-color: #f4f1e1;
            font-family: Arial, sans-serif;
        }

        nav {
            background-color: #f4f1e1;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            margin-left: 20px;
            text-decoration: none;
            color: #655d4a;
        }

        nav a:hover {
            color: black;
        }

        .content {
            min-height: calc(100vh - 70px);
            padding: 20px;
        }

        footer {
            background-color: #f4f1e1;
            text-align: center;
            padding: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<nav class="d-flex justify-content-between align-items-center">

    <!-- LOGO -->
    <div style="font-weight:bold; font-size:18px;">SSPLACESHOP</div>

    <!-- SEARCH BAR (dipanjangin) -->
    <form action="/search" method="GET"
          class="d-flex"
          style="gap: 10px; width: 700px;">

        <input type="text" name="q" class="form-control"
               placeholder="Cari produk..."
               style="background:#fff4d1; border:1px solid #c8b997; width:100%;">

        <button class="btn btn-sm" style="background:#655d4a; color:white;">
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

<!-- CONTENT AREA -->

    @yield('content')

<!-- FOOTER -->
<footer>
    © 2025 Marketplace by Kamu
</footer>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
