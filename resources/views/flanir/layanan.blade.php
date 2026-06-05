@extends('flanir.layout')

@section('content')

<!-- Ubah max-w-md menjadi max-w-5xl agar lebih lebar di desktop -->
<div class="max-w-5xl mx-auto bg-slate-100 min-h-screen">

    <div class="bg-gradient-to-r from-purple-500 to-purple-600 text-white p-5 rounded-b-3xl">
        <h2 class="text-lg font-bold">Layanan Vaksinasi</h2>
    </div>

    <!-- Gunakan grid untuk tata letak desktop -->
    <div class="p-4 grid grid-cols-1 md:grid-cols-2 gap-6">

        <!-- Item 1 -->
        <div class="bg-white rounded-3xl overflow-hidden shadow">
            <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?w=600"
                 class="w-full h-44 object-cover">

            <div class="p-4">
                <div class="flex justify-between">
                    <h3 class="font-bold">Vaksin Anjing Dasar</h3>
                    <span class="font-bold text-green-600">Rp 250.000</span>
                </div>
                <p class="text-xs text-gray-500 mt-3">Paket lengkap vaksinasi untuk anjing dan kucing.</p>
                <ul class="text-xs text-gray-400 mt-3 space-y-1">
                    <li>✓ 3 jenis vaksin</li>
                    <li>✓ Sertifikat vaksin</li>
                    <li>✓ Konsultasi gratis</li>
                </ul>
                <a href="{{ route('flanir.pembayaran') }}"
                   class="block text-center mt-4 bg-purple-600 text-white py-2 rounded-xl font-bold hover:bg-purple-700 transition">
                   Booking Vaksin
                </a>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="bg-white rounded-3xl overflow-hidden shadow">
            <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?w=600"
                 class="w-full h-44 object-cover">

            <div class="p-4">
                <div class="flex justify-between">
                    <h3 class="font-bold">Basic Grooming</h3>
                    <span class="font-bold text-green-600">Rp 300.000</span>
                </div>
                <p class="text-xs text-gray-500 mt-3">Perawatan bulu dan kebersihan hewan peliharaan.</p>
                <ul class="text-xs text-gray-400 mt-3 space-y-1">
                    <li>✓ Mandi premium</li>
                    <li>✓ Potong kuku</li>
                    <li>✓ Pembersihan telinga</li>
                </ul>
                <a href="{{ route('flanir.pembayaran') }}"
                   class="block text-center mt-4 bg-purple-600 text-white py-2 rounded-xl font-bold hover:bg-purple-700 transition">
                   Booking Grooming
                </a>
            </div>
        </div>

    </div>
</div>

@endsection