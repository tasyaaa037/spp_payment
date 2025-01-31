<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SCOLPAY</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&family=Lora:wght@700&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <style>
        /* Container login fullscreen */
        .login-container {
            min-height: 100vh;
            background: url('{{ asset('build/assets/dekstop.png') }}') no-repeat center center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            position: relative;
            overflow: hidden;
        }

        /* Card login dengan blur ringan */
        .card {
            background: rgba(255, 255, 255, 0.3); /* Mengurangi transparansi */
            border-radius: 18px;
            padding: 35px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
            max-width: 420px;
            width: 100%;
            backdrop-filter: blur(8px); /* Blur dikurangi */
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            animation: fadeIn 1s ease-in-out;
        }

        /* Efek fade in */
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }

        /* Kata sambutan */
        .welcome-text {
            font-family: 'Lora', serif;
            font-size: 28px;
            font-weight: 700;
            color: rgb(0, 0, 0);
            margin-bottom: 20px;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.4);
        }

        /* Tombol login */
        .login-btn {
            font-family: 'Raleway', sans-serif;
            font-size: 17px;
            font-weight: 600;
            color: rgb(0, 0, 0);
            background: linear-gradient(45deg, #90A4AE, #90A4AE);
            padding: 14px 30px;
            border-radius: 28px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 5px 15px rgba(93, 92, 97, 0.4);
        }

        /* Hover tombol login */
        .login-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(93, 92, 97, 0.6);
            background: linear-gradient(45deg, #5D5C61, #7395AE);
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .welcome-text {
                font-size: 22px;
            }
            .login-btn {
                font-size: 15px;
                padding: 12px 26px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <!-- Card login -->
        <div class="card">
            <!-- Kata sambutan -->
            <div class="welcome-text">
                Selamat Datang di SCOLPAY! 
            </div>

            <!-- Tombol login -->
            <a href="{{ route('login') }}">
                <button class="login-btn">Masuk</button>
            </a>
        </div>
    </div>
</body>
</html>
