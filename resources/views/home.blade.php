@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg rounded-4 border-0" style="background-color: #e6f7ff;">
                <div class="card-header text-center py-4" style="background: linear-gradient(135deg, #a3c6e7, #9ec0e4); color: #fff; font-family: 'Arial', sans-serif; font-weight: bold;">
                    <h2>🎓 Dashboard 🎓</h2>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="text-center slogan mb-4">
                        <h4 style="font-family: 'Fredoka One', cursive; color: #005f73;">"Bersama Menuju Sukses yang Lebih Baik!"</h4>
                    </div>

                    <div class="welcome-message text-center mb-5">
                        @if (Auth::user()->role == 1)
                            <h5 style="font-family: 'Nunito', sans-serif; color: #2a4d67;">📚 Selamat Datang, Admin! Wujudkan Visi Pendidikan yang Lebih Baik! 📖</h5>
                        @elseif (Auth::user()->role == 2)
                            <h5 style="font-family: 'Nunito', sans-serif; color: #2a4d67;">📝 Selamat Datang, Petugas! Terima kasih atas dedikasimu dalam mendukung proses pendidikan!</h5>
                        @elseif (Auth::user()->role == 3)
                            <h5 style="font-family: 'Nunito', sans-serif; color: #2a4d67;">🎒 Selamat Datang, {{ Auth::user()->name }}! Ayo raih prestasi terbaikmu!</h5>
                        @endif
                    </div>

                    @if (Auth::user()->role == 3)
                    <div class="payment-reminder mt-4 text-center">
                        <h4 style="font-family: 'Poppins', sans-serif; color: #d34f65;">💳 Segera Bayar SPP untuk Mendukung Proses Belajar! 💳</h4>
                        <p style="font-family: 'Lora', serif; color: #2e6f82;">Agar proses pembelajaran tetap lancar, pastikan pembayaran SPP Anda tepat waktu.</p>
                        <a href="{{ route('pembayaran.index') }}" class="btn btn-primary btn-lg rounded-pill px-4" style="background: #61a3d8; border: none;">Bayar SPP</a>
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
        box-shadow: 0 8px 15px rgba(110, 160, 190, 0.3);
    }

    .card-header {
        background: linear-gradient(135deg, #a3c6e7,#4c87c1);
        color: #fff;
        font-size: 1.75rem;
        border-bottom: none;
    }

    .slogan h4 {
        font-size: 1.5rem;
        color: #005f73;
    }

    .welcome-message h5 {
        font-size: 1.25rem;
        color: #2a4d67;
    }

    .payment-reminder h4 {
        font-size: 1.5rem;
        color: #d34f65;
    }

    .btn-primary {
        background-color: #61a3d8;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #4c87c1;
        box-shadow: 0 4px 10px rgba(87, 130, 173, 0.3);
    }
</style>
@endpush
