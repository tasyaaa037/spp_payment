@extends('layouts.app')

@section('content')
<div class="login-container">
    <div class="card shadow-lg">
        <div class="card-header text-center">
            <h3>{{ __('Login to School Payment System') }}</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg w-100">{{ __('Login') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Container login dengan latar gambar */
.login-container {
    min-height: 100vh;
    background: url('{{ asset('build/assets/login.png') }}') no-repeat center center;
    background-size: cover;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

/* Card login dengan transparansi */
.card {
    width: 100%;
    max-width: 420px;
    background-color: rgba(255, 255, 255, 0.8); /* Transparansi putih */
    border: 2px solid #B0BEC5; /* Warna abu */
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
}

/* Header card */
.card-header {
    background-color: #90A4AE; /* Abu */
    color: white;
    padding: 15px;
    font-size: 22px;
    font-weight: bold;
    border-radius: 10px 10px 0 0;
}

/* Input field */
.form-control {
    border-radius: 10px;
    padding: 12px;
    font-size: 16px;
    border: 1px solid #B0BEC5; /* Warna abu */
    background-color: #ECEFF1; /* Abu muda */
}

/* Fokus input */
.form-control:focus {
    border-color: #90A4AE; /* Abu terang */
    box-shadow: 0 0 10px rgba(144, 164, 174, 0.3);
}

/* Tombol login */
.btn-primary {
    background-color: #90A4AE; /* Abu */
    border-color: #78909C;
    border-radius: 50px;
    padding: 12px 20px;
    font-size: 16px;
    font-weight: bold;
    color: white;
}

/* Hover tombol login */
.btn-primary:hover {
    background-color: #607D8B; /* Abu lebih gelap */
    color: white;
}

/* Feedback invalid */
.invalid-feedback {
    font-size: 12px;
    color: #D32F2F; /* Merah */
}

/* Label input */
.form-label {
    font-weight: bold;
    color: #37474F; /* Abu gelap */
}

/* Checkbox */
.form-check-input {
    width: 18px;
    height: 18px;
    border-radius: 4px;
    border: 1px solid #B0BEC5;
}

/* Responsif untuk layar kecil */
@media (max-width: 768px) {
    .card {
        max-width: 100%;
        margin: 0 10px;
    }
}
</style>
@endsection
