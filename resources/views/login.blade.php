<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #014288; /* biru utama */
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: white; /* tidak pakai cream */
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
        }
        .btn-login {
            background: #014288;
            color: white;
            font-weight: bold;
        }
        .btn-login:hover {
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
    <div class="card col-md-4">

        <h3 class="text-center mb-3">Login</h3>

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

        <form action="{{ route('login.process') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control mb-3" required>

            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control mb-3" required>

            <button class="btn btn-login w-100">Login</button>
        </form>

    </div>
</div>
</body>
</html>
