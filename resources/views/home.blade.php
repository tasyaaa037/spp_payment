@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow rounded-4 border-0" style="background-color: #e6f7ff;">
                <div class="card-header text-center py-4" style="background: linear-gradient(135deg, #d4eafd, #b3d9f9); color: #2a4e6c; font-family: 'Poppins', sans-serif; font-weight: bold;">
                    <h2>🌟 Selamat Datang di Dashboard 🌟</h2>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="text-center slogan mb-5">
                        <h4 style="font-family: 'Montserrat', sans-serif; color: #1e3a5f;">"Belajar, Berkembang, Berprestasi!"</h4>
                        <p class="text-muted" style="font-family: 'Lora', serif; font-size: 1.2rem;">Kami percaya setiap siswa memiliki potensi untuk mencapai masa depan gemilang.</p>
                    </div>

                    <div class="welcome-message text-center mb-5">
                        @if (Auth::user()->role == 1)
                            <h5 style="font-family: 'Roboto', sans-serif; color: #2a4e6c;">👩‍💼 Selamat Datang, Admin! Ayo tingkatkan layanan pendidikan terbaik! 👨‍💼</h5>
                        @elseif (Auth::user()->role == 2)
                            <h5 style="font-family: 'Roboto', sans-serif; color: #2a4e6c;">📋 Selamat Datang, Petugas! Terima kasih telah membantu menjaga kelancaran administrasi.</h5>
                        @elseif (Auth::user()->role == 3)
                            <h5 style="font-family: 'Roboto', sans-serif; color: #2a4e6c;">🎓 Selamat Datang, {{ Auth::user()->name }}! Mari wujudkan mimpi bersama!</h5>
                        @endif
                    </div>

                    @if (Auth::user()->role == 3)
                    <div class="payment-reminder mt-4 text-center">
                        <h4 style="font-family: 'Poppins', sans-serif; color: #ff6b6b;">💰 Jangan Lupa Bayar SPP! 💰</h4>
                        <p style="font-family: 'Lora', serif; color: #ff6b6b;">Pastikan SPP dibayar tepat waktu agar pembelajaran tetap lancar.</p>
                        <a href="{{ route('pembayaran.index') }}" class="btn btn-primary btn-lg rounded-pill px-4" style="background: #4db8ff; border: none;">Bayar Sekarang</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    body {
        background: #f0faff; /* Soft Blue Background */
        font-family: 'Arial', sans-serif;
    }

    .card {
        box-shadow: 0 8px 15px rgba(0, 123, 255, 0.2);
    }

    .card-header {
        background: linear-gradient(135deg, #d4eafd, #b3d9f9); /* Gradient Soft Blue */
        color: #2a4e6c;
        font-size: 1.75rem;
        border-bottom: none;
    }

    .slogan h4 {
        font-size: 1.75rem;
        color: #1e3a5f;
    }

    .slogan p {
        font-size: 1.2rem;
        color: #5a7184;
    }

    .welcome-message h5 {
        font-size: 1.25rem;
        color: #2a4e6c;
    }

    .payment-reminder h4 {
        font-size: 1.5rem;
        color: #ff6b6b;
    }

    .payment-reminder p {
        font-size: 1.2rem;
        color: #ff6b6b;
    }

    .btn-primary {
        background-color: #4db8ff;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #3399ff;
        box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
    }
</style>
@endpush
