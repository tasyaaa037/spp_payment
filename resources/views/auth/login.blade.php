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

                <div class="d-flex justify-content-between align-items-center">
                    <button type="submit" class="btn btn-primary btn-lg">{{ __('Login') }}</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Styling untuk container login */
.login-container {
    min-height: 100vh;
    background: linear-gradient(135deg, #e2f4f1 0%, #d3f0f0 100%);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px; /* Menambahkan padding untuk menyesuaikan tampilan */
}

/* Styling untuk card login */
.card {
    width: 100%;
    max-width: 420px;
    border-radius: 12px;
    background-color: white;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    margin: 0 auto;
}

/* Styling untuk header card */
.card-header {
    background-color: #6fa3f9;
    color: white;
    padding: 25px;
    font-family: 'Arial', sans-serif;
    font-size: 22px;
    border-radius: 12px 12px 0 0;
}

/* Form input fields */
.form-control {
    border-radius: 10px;
    padding: 12px;
    font-size: 16px;
    background-color: #f7fafc;
}

/* Fokus input field */
.form-control:focus {
    border-color: #6fa3f9;
    box-shadow: 0 0 10px rgba(111, 163, 249, 0.5);
}

/* Styling untuk tombol login */
.btn-primary {
    background-color: #6fa3f9;
    border-color: #6fa3f9;
    border-radius: 50px;
    padding: 12px 25px;
    font-size: 16px;
    font-weight: bold;
}

/* Styling untuk link forgot password */
.btn-link {
    color: #6fa3f9;
    font-size: 14px;
}

/* Hover effect pada tombol dan link */
.btn-primary:hover, .btn-link:hover {
    background-color: #4f8be2;
    color: white;
}

/* Styling untuk bagian invalid feedback */
.invalid-feedback {
    font-size: 12px;
    color: #ff4d4d;
}

/* Form label styling */
.form-label {
    font-weight: bold;
    color: #333;
}

/* Styling checkbox */
.form-check-input {
    width: 18px;
    height: 18px;
    border-radius: 4px;
}

@media (max-width: 768px) {
    .card {
        max-width: 100%;
        margin: 0 10px; 
    }
}

</style>

@endsection
