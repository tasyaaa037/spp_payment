<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Poppins" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Custom CSS for Soft Blue Theme -->
    <style>
        body {
            background-color: #f0f8ff; /* Soft Blue Background */
            font-family: 'Poppins', sans-serif; /* Change font to Poppins */
        }

        .navbar {
            background-color: #ADD8E6; /* Soft Blue Navbar */
            padding: 1rem;
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            color: #003366;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important; /* White color for menu items */
            font-size: 1.1rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #000000 !important; /* Highlight color on hover */
            background-color: #f0f8ff; /* Add background color on hover */
            border-radius: 20px; /* Rounded corners for hover effect */
            transform: scale(1.1); /* Slightly enlarge the link */
        }

        .navbar-nav .nav-link.active {
            color: #000000 !important; /* Highlight active link */
            font-weight: bold;
        }

        .navbar-toggler-icon {
            background-color: #003366;
        }

        .dropdown-menu {
            background-color: #ADD8E6;
        }

        .dropdown-item {
            color: #003366;
        }

        .dropdown-item:hover {
            background-color: #000000;
            color: white;
        }

        .btn {
            background-color: #ADD8E6;
            color: #003366;
        }

        .btn:hover {
            background-color: #000000;
            color: white;
        }

        .marquee {
            font-size: 1.2rem;
            font-weight: bold;
            color: #003366;
            text-align: center;
            background-color: #ADD8E6;
            padding: 0.5rem;
        }
        
        .navbar-nav {
            margin-left: auto; /* Align menu to the right */
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <b>SCOLPAY</b>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @if (Auth::user()->role == 3)
                            <marquee class="marquee" behavior="" direction="">WELLCOME TO SCOLPAY!!</marquee>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        @if (Auth::user()->role == 1)
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('siswa.index')}}">Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('kelas.index')}}">Kelas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('petugas.index')}}">Petugas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('spp.index')}}">SPP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('pembayaran.index')}}">Pembayaran SPP</a>
                            </li>
                        @elseif (Auth::user()->role == 2)
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('siswa.index')}}">Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('pembayaran.index')}}">Pembayaran SPP</a>
                            </li>
                        @elseif (Auth::user()->role == 3)
                            <marquee class="marquee" behavior="" direction="">WELLCOME TO SCOLPAY!!</marquee>
                        @endif

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            @stack('modal')
        </main>
    </div>
</body>
</html>
