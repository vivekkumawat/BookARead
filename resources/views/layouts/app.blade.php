<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.7.5/css/bulma.min.css">
    @yield('stylesheets')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
{{-- Navbar Start --}}
<nav class="navbar is-spaced" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ url('/') }}">
            BookAread
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarToggler">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarToggler" class="navbar-menu">
        <div class="navbar-start">
            <a href="{{ route('plans.index') }}" class="navbar-item">Plans</a>
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Categories
                </a>

                <div class="navbar-dropdown">
                            @yield('categories')
                        <hr class="navbar-divider">
                        <a class="navbar-item">
                            View All
                        </a>
                </div>
            </div>
        </div>

        <div class="navbar-end">
            <div class="navbar-item is-hidden-touch">
                <div class="control has-icons-right">
                    <input class="input" type="text" placeholder="Search Books...">
                    <span class="icon is-small is-right">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>

            @if (Auth::guest())
                <div class="navbar-item">
                    <div class="buttons">
                    <a class="button is-light" href="{{ route('login') }}">Sign in</a>
                    <a class="button is-primary" href="{{ route('register') }}">Get Started</a>
                </div>
                </div>
            @else
                @if(!Auth::user()->membership_status == 0)
                <a href="{{ route('cart.index') }}" class="navbar-item" >Cart
                    @if(Cart::instance('default')->count() > 0)
                    ({{ Cart::instance('default')->count() }})
                    @endif
                </a>
                @endif
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link" href="{{ route('account.index') }}">{{ Auth::user()->name }}</a>

                    <div class="navbar-dropdown is-right">
                        <a href="{{ route('account.index') }}" class="navbar-item">My Account</a>
                        <a href="#" class="navbar-item">Your Orders</a>
                        <a href="#" class="navbar-item">Your Wishlist</a>
                        <a href="#" class="navbar-item">Settings</a>

                        <a class="navbar-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="navbar-item is-hidden-desktop">
        <div class="control has-icons-right">
            <input class="input" type="text" placeholder="Search Books...">
            <span class="icon is-small is-right">
                <i class="fas fa-search"></i>
            </span>
        </div>
    </div>
</nav>
{{-- Navbar End --}}


{{-- Main Content Goes here --}}
@yield('content')
{{-- Main Content End --}}


{{-- Footer Start --}}
    <footer class="footer">
        <div class="content has-text-centered has-text-white">
            <div class="columns">
                <div class="column">
                    <h4 class="has-text-white">Customer Service</h4>
                </div>
                <div class="column">
                    <h4 class="has-text-white">Quick Links</h4>
                </div>
                <div class="column">
                    <h4 class="has-text-white">View All</h4>
                </div>
            </div>
        </div>
    </footer>
    <footer class="footer copyright-footer">
        <div class="content has-text-centered">
            <p>Made with <i class="fas fa-heart"></i> in India | Copyright <i class="far fa-copyright"></i> 2019 BookARead</p>
        </div>
    </footer>
{{-- Footer End --}}
<!-- Scripts -->

<script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
<script src="https://kit.fontawesome.com/c1cf866455.js"></script>
@yield('scripts')
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
