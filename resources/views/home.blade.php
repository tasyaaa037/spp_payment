<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Sistem Pembayaran SPP') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(to bottom, #e9f5f5, #ffffff);
            color: #4a4a4a;
            font-family: 'Nunito', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .navbar {
            background-color: #5bc0be;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
            color: #ffffff !important;
        }
        .hero-section {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 2rem;
            overflow: hidden;
        }
        .hero-section h1 {
            font-size: 2.8rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: #333333;
        }
        .hero-section p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            color: #666666;
        }
        .hero-section img.school-image {
            max-width: 300px;
            height: auto;
            margin-bottom: 2rem;
        }

        /* Visual Decorations */
        .decorative-item {
            position: absolute;
            z-index: 1;
            animation: float 4s infinite ease-in-out;
        }
        .child {
            width: 150px;
            bottom: 10%;
            left: 5%;
        }
        .blackboard {
            width: 200px;
            top: 10%;
            right: 5%;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }

        footer {
            background: #5bc0be;
            color: #ffffff;
            padding: 15px;
            text-align: center;
        }

        .alert-custom {
            margin-top: 20px;
            padding: 15px;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Pembayaran SPP') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-primary text-white px-4 py-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link btn btn-outline-light ms-2 px-4 py-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

    <!-- Notification Section -->
    <div class="container mt-4">
        @if (session('status'))
            <div class="alert alert-success alert-custom">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <!-- Hero Section -->
    <section class="hero-section">
        <img src="{{ asset('images/school.png') }}" alt="School" class="img-fluid school-image">
        <h1>Selamat Datang di Sistem Pembayaran SPP</h1>
        <p>Mengelola dan membayar SPP dengan mudah, cepat, dan aman.</p>

        <!-- Decorative Items -->
        <img src="{{ asset('images/child.png') }}" alt="Child" class="decorative-item child">
        <img src="{{ asset('images/blackboard.png') }}" alt="Blackboard" class="decorative-item blackboard">
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 {{ config('app.name', 'Pembayaran SPP') }}. All rights reserved.</p>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
