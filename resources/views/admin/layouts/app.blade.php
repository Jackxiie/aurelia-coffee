<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Aurelia Coffee</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Admin CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">

</head>

<body>

<!-- TOP NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top header-top">
    <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
        Aurelia Admin
    </a>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item text-white mr-3 mt-2">
            {{ session('admin_name') }}
        </li>
        <li class="nav-item">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="btn btn-danger btn-sm">Logout</button>
            </form>
        </li>
    </ul>
</nav>

<div id="wrapper">

    <!-- SIDEBAR -->
    <ul class="navbar-nav side-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}">📊 Dashboard</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.products.index') }}">☕ Products</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.bookings.index') }}">📅 Bookings</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.orders.index') }}">🧾 Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.contacts.index') }}">✉️ Contacts</a>
        </li>
    </ul>
    

    <!-- CONTENT -->
    <div class="content-area">
        <div class="container-fluid">

            <!-- Alert -->
            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </div>
    </div>

</div>

<!-- JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>