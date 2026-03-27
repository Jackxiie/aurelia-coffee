<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            width: 380px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .login-box h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            background: #111;
            color: white;
            border-radius: 8px;
            cursor: pointer;
        }

        .btn:hover {
            background: #333;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            font-size: 14px;
        }

        .alert-danger {
            background: #ffe5e5;
            color: #b30000;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Login</h2>

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('admin.login.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>

            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>