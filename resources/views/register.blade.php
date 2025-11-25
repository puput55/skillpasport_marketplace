<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Member</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS Animation CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <style>
        body {
            background-color: #014288;
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.25);
        }
        .btn-register {
            background: #014288;
            color: white;
            font-weight: bold;
        }
        .btn-register:hover {
            background: #013566;
        }
        h3 {
            color: #014288;
            font-weight: bold;
        }
        label {
            color: #014288;
            font-weight: 600;
        }
    </style>
</head>

<body>
<div class="container d-flex justify-content-center align-items-center" style="height:100vh;">

    <!-- CARD + Animasi -->
    <div class="card col-md-4" data-aos="zoom-in" data-aos-duration="900">

        <!-- Judul + Animasi -->
        <h3 class="text-center mb-3" data-aos="fade-down" data-aos-duration="800">
            Registrasi Member
        </h3>

        @if (session('success'))
            <div class="alert alert-success" data-aos="fade-up">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" data-aos="fade-up">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.member.process') }}" method="POST">
            @csrf

            <label class="form-label">Nama Lengkap</label>
            <input type="text" name="nama" class="form-control mb-3" required placeholder="Masukkan nama lengkap">

            <label class="form-label">Kontak</label>
            <input type="number" name="kontak" class="form-control mb-3" placeholder="Masukkan nomor kontak">

            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control mb-3" required placeholder="Masukkan username">

            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control mb-3" required placeholder="Masukkan password">

            <button class="btn btn-register w-100">Daftar</button>

        </form>

        <p class="text-center mt-3">
            Sudah punya akun? <a href="{{ route('login') }}" style="color:#014288; font-weight:bold;">Login</a>
        </p>

    </div>
</div>

<!-- AOS Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>
