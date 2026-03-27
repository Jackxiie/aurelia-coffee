<nav class="navbar navbar-expand navbar-dark ftco_navbar bg-dark ftco-navbar-light scrolled" id="ftco-navbar" style="position: fixed; top: 0; left: 0; right: 0; width: 100%; z-index: 1030;">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}" style="line-height: 1; padding-top: 8px; padding-bottom: 8px;">
            AURELIA &nbsp;&nbsp;COFFEE<small>DELICIOUS TASTE</small>
        </a>

        <div class="navbar-collapse show" id="ftco-nav">
            <ul class="navbar-nav ml-auto d-flex flex-row align-items-center" style="gap: 18px; flex-wrap: nowrap;">
                <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link" style="white-space: nowrap;">Home</a>
                </li>
                <li class="nav-item {{ request()->routeIs('menu') ? 'active' : '' }}">
                    <a href="{{ route('menu') }}" class="nav-link" style="white-space: nowrap;">Menu</a>
                </li>
                <li class="nav-item {{ request()->routeIs('services') ? 'active' : '' }}">
                    <a href="{{ route('services') }}" class="nav-link" style="white-space: nowrap;">Services</a>
                </li>
                <li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
                    <a href="{{ route('about') }}" class="nav-link" style="white-space: nowrap;">About</a>
                </li>
                <li class="nav-item {{ request()->routeIs('contact') ? 'active' : '' }}">
                    <a href="{{ route('contact') }}" class="nav-link" style="white-space: nowrap;">Contact</a>
                </li>

                @auth
                    @php
                        $cart = session('cart', []);
                        $cartCount = collect($cart)->sum('quantity');
                    @endphp

                    <li class="nav-item" style="position: relative;">
                        <a href="{{ route('cart.index') }}" class="nav-link" style="white-space: nowrap; position: relative; display: inline-block;">
                            <span class="icon icon-shopping_cart"></span>

                            @if($cartCount > 0)
                                <span style="
                                    position: absolute;
                                    top: -6px;
                                    right: -12px;
                                    background: #c49b63;
                                    color: #fff;
                                    font-size: 11px;
                                    line-height: 1;
                                    padding: 4px 6px;
                                    border-radius: 50px;
                                    min-width: 18px;
                                    text-align: center;
                                    font-weight: 700;
                                ">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link" style="white-space: nowrap;">Dashboard</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false" style="white-space: nowrap;">
                            {{ auth()->user()->username ?? auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('my.bookings') }}">
                                    My Bookings
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('my.orders') }}">
                                    My Orders
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link" style="white-space: nowrap;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link" style="white-space: nowrap;">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>