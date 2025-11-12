<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f1e1;
            font-family: Arial, sans-serif;
        }
        .card {
            background-color: #e0d3ab;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }
        .btn-login {
            background: #3b3b3b;
            color: #e0d3ab;
            font-weight: bold;
        }
        .btn-login:hover {
            opacity: 0.8;
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

        <form action="{{ route('login.process') }}" method="POST">
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
