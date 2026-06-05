@extends('flanir.layout')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-slate-50 p-6">
    <div class="bg-white p-12 rounded-[2.5rem] shadow-xl text-center max-w-sm w-full border border-slate-100 animate-in fade-in zoom-in duration-700">
        
        <div class="mx-auto w-24 h-24 bg-purple-50 rounded-full flex items-center justify-center mb-8 relative">
            <svg class="w-12 h-12 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="4">
                <path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <h2 class="text-2xl font-bold text-slate-800 mb-3">Success!</h2>
        <p class="text-slate-500 text-sm leading-relaxed mb-10">
            Terima kasih telah melakukan transaksi. Pesanan Anda telah kami terima.
        </p>
        
        <a href="{{ route('flanir.layanan') }}" 
           class="block w-full bg-purple-600 text-white py-4 rounded-2xl font-semibold hover:bg-purple-700 transition-all duration-300 transform hover:scale-[1.02] active:scale-95 shadow-lg shadow-purple-200">
            Kembali
        </a>
    </div>
</div>

<style>
    /* Animasi Centang Bergerak */
    .checkmark {
        stroke-dasharray: 20;      /* Panjang garis centang */
        stroke-dashoffset: 20;     /* Mulai dari posisi tersembunyi */
        animation: drawCheck 1s ease-in-out forwards;
    }

    @keyframes drawCheck {
        to {
            stroke-dashoffset: 0;  /* Centang tergambar penuh */
        }
    }
</style>
@endsection