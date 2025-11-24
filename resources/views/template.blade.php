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
            font-family: Arial, sans-serif;
            padding-top: 75px; /* ruang untuk navbar fixed */
        }

        nav {
            background-color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            flex-wrap: wrap;

            position: fixed; /* FIXED TOP */
            top: 0;
            left: 0;
            width: 100%;
            z-index: 999;
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

<nav class="d-flex justify-content-between align-items-center flex-wrap">

    <!-- LOGO -->
    <div style="font-weight:bold; font-size:20px; display:flex; align-items:center; gap:8px; color:#014288;">
        <span style="font-size:26px;">🧺</span> SSPLACESHOP
    </div>

    <!-- SEARCH BAR (LIVE FILTER) -->
    <div class="flex-grow-1 mx-3">
        <input type="text" id="navSearchInput" class="form-control search-input"
               placeholder="Cari produk...">
    </div>

    <!-- MENU NAV -->
    <div class="d-flex align-items-center flex-wrap gap-2">
        <a href="/">Beranda</a>
        <a href="{{ route('produk.public') }}">Produk</a>
        <a href="{{ route('kategori.public') }}">Kategori</a>
    </div>
</nav>

@yield('content')

<footer style="background:#ffffff; color:#014288; padding:40px 0; border-top:1px solid #e5e5e5;">
    <div class="container">
        <div class="row text-center text-md-start">

            <!-- BRAND -->
            <div class="col-md-4 mb-4">
                <h4 class="fw-bold d-flex align-items-center justify-content-center justify-content-md-start"
                    style="color:#014288;">
                    <span style="font-size:28px;" class="me-2">🧺</span> SSPLACESHOP
                </h4>
                <p style="font-size:14px; color:#4a6f9e;">
                    Toko online dengan beragam produk terbaik dan harga ramah dompet.
                </p>
            </div>

            <!-- LINK -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-semibold mb-3" style="color:#014288;">Menu</h5>
                <ul class="list-unstyled" style="line-height:2;">
                    <li><a href="/" style="color:#4a6f9e; text-decoration:none;">Beranda</a></li>
                    <li><a href="{{ route('produk.public') }}" style="color:#4a6f9e; text-decoration:none;">Produk</a></li>
                    <li><a href="{{ route('kategori.public') }}" style="color:#4a6f9e; text-decoration:none;">Kategori</a></li>
                    <li><a href="#" style="color:#4a6f9e; text-decoration:none;">Tentang Kami</a></li>
                </ul>
            </div>

            <!-- KONTAK -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-semibold mb-3" style="color:#014288;">Hubungi Kami</h5>
                <p class="m-0" style="color:#4a6f9e;">
                    <i class="fa-solid fa-phone me-2"></i> +62 812-3456-7890
                </p>
                <p class="m-0" style="color:#4a6f9e;">
                    <i class="fa-solid fa-envelope me-2"></i> support@ssplaceshop.com
                </p>
                <p class="m-0" style="color:#4a6f9e;">
                    <i class="fa-solid fa-location-dot me-2"></i> Bandung, Indonesia
                </p>
                <div class="mt-3 d-flex gap-3 justify-content-center justify-content-md-start">
                    <a href="#" style="color:#014288; font-size:20px;"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" style="color:#014288; font-size:20px;"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" style="color:#014288; font-size:20px;"><i class="fa-brands fa-tiktok"></i></a>
                </div>
            </div>

        </div>

        <hr style="border-color:#e0e0e0;">

        <div class="text-center mt-3" style="font-size:14px; color:#4a6f9e;">
            © 2025 SSPLACESHOP — Semua Hak Dilindungi.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

{{-- NAVBAR LIVE SEARCH --}}
<script>
    const navSearchInput = document.getElementById('navSearchInput');
    const productItems = document.querySelectorAll('.product-item');

    if(navSearchInput && productItems.length > 0){
        navSearchInput.addEventListener('input', function() {
            const filter = navSearchInput.value.toLowerCase();

            productItems.forEach(function(item) {
                const name = item.querySelector('.product-name').textContent.toLowerCase();
                if(name.includes(filter)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
</script>

</body>
</html>
