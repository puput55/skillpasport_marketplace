<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk ke Akun Anda</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animation -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #014288, #0162a3);
            font-family: Arial, sans-serif;
        }

        .card {
            background-color: white;
            border-radius: 15px;
            padding: 28px;
            width: 420px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.25);
            transition: .3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.30);
        }

        .btn-login {
            background: #014288;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            transition: .3s;
        }

        .btn-login:hover {
            background: #013566;
            transform: scale(1.03);
        }

        h3, h5 {
            color: #014288;
            font-weight: bold;
        }

        label {
            color: #014288;
            font-weight: 600;
        }

        input.form-control {
            border-width: 2px;
            border-color: #d5e3f7;
        }

        input.form-control:focus {
            border-color: #014288;
            box-shadow: 0 0 8px rgba(1, 66, 136, 0.4);
        }

        .logo {
            width: 120px;
            height: 120px;
            object-fit: contain;
            padding: 10px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        }
    </style>
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center" style="height:100vh;">

        <div class="card" data-aos="fade-down" data-aos-duration="900">

            <div class="text-center mb-3">
                <img src="{{ asset('storage/gambar/logo.png') }}" class="logo" alt="Logo">

                <h5 class="mt-3">Login Marketplace</h5>
                {{-- <p class="text-muted" style="margin-top:-5px;">Silakan masuk untuk melanjutkan</p> --}}
            </div>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <label class="form-label">Username</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <label class="form-label">Password</label>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-login w-100 mb-3">Masuk Sekarang</button>
            </form>

            <p class="text-center">
                Belum punya akun?
                <a href="{{ route('register.member') }}" class="register-link">Daftar Member</a>
            </p>

            <p class="text-center">
                Kembali ke halaman awal —
                <a href="{{ route('beranda') }}" class="register-link">Klik di sini</a>
            </p>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>AOS.init();</script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
