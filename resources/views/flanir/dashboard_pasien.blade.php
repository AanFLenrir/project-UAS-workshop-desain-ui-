@extends('flanir.layout')

@section('content')

<!-- HEADER SECTION -->
<div class="mb-8">
    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-[35px] p-10 text-white">
        <h2 class="text-4xl font-black">
            Halo Sarah Putri 👋
        </h2>
        <p class="mt-2 opacity-90">
            Selamat datang kembali di FLANIR
        </p>
        <div class="mt-6">
            <input 
                type="text" 
                placeholder="Cari layanan..." 
                class="w-full max-w-lg rounded-2xl p-4 text-slate-700 outline-none">
        </div>
    </div>
</div>

<!-- KATEGORI (Sekarang semua bisa diklik) -->
<div class="grid grid-cols-3 gap-6 mb-10">

    <a href="{{ route('flanir.layanan') }}" class="bg-white rounded-3xl p-8 shadow-sm text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 block">
        <div class="text-5xl mb-4">💉</div>
        <h3 class="font-bold text-xl">Vaksinasi</h3>
        <p class="text-slate-500">Imunisasi hewan</p>
    </a>

    <a href="{{ route('flanir.layanan') }}" class="bg-white rounded-3xl p-8 shadow-sm text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 block">
        <div class="text-5xl mb-4">✂️</div>
        <h3 class="font-bold text-xl">Grooming</h3>
        <p class="text-slate-500">Perawatan bulu</p>
    </a>

    <a href="{{ route('flanir.konsultasi') }}" class="bg-white rounded-3xl p-8 shadow-sm text-center hover:shadow-xl hover:-translate-y-1 transition duration-300 block">
        <div class="text-5xl mb-4">👨‍⚕️</div>
        <h3 class="font-bold text-xl">Konsultasi</h3>
        <p class="text-slate-500">Dokter Hewan Online</p>
    </a>

</div>

<!-- PRODUK -->
<h3 class="text-3xl font-black mb-6">
    Layanan Populer
</h3>

<div class="grid grid-cols-2 gap-8 mb-10">
    
    <!-- Kartu 1: Vaksin Anjing -->
    <a href="{{ route('flanir.pembayaran') }}" class="bg-white rounded-3xl shadow-sm overflow-hidden hover:shadow-xl transition duration-300 block">
        <img src="Bidan-Erat-Kaitannya-dengan-Persalinan-Apa-Tugasnya.jpg.webp" class="w-full h-48 object-cover">
        <div class="p-6">
            <h3 class="font-black text-2xl">Vaksin Anjing</h3>
            <p class="text-slate-500 mt-2">Paket vaksin lengkap untuk anjing.</p>
            <div class="flex justify-between items-center mt-5">
                <span class="font-black text-purple-600 text-xl">Rp 250.000</span>
                <span class="bg-purple-600 text-white px-5 py-3 rounded-xl hover:bg-purple-700 transition">Booking</span>
            </div>
        </div>
    </a>

    <!-- Kartu 2: Basic Grooming -->
    <a href="{{ route('flanir.pembayaran') }}" class="bg-white rounded-3xl shadow-sm overflow-hidden hover:shadow-xl transition duration-300 block">
        <img src="AdobeStock_187718984.webp" class="w-full h-48 object-cover">
        <div class="p-6">
            <h3 class="font-black text-2xl">Basic Grooming</h3>
            <p class="text-slate-500 mt-2">Perawatan bulu dan kebersihan hewan.</p>
            <div class="flex justify-between items-center mt-5">
                <span class="font-black text-purple-600 text-xl">Rp 300.000</span>
                <span class="bg-purple-600 text-white px-5 py-3 rounded-xl hover:bg-purple-700 transition">Booking</span>
            </div>
        </div>
    </a>

</div>

<!-- QUICK MENU (Sekarang Pembayaran bisa diklik) -->
<div class="grid grid-cols-3 gap-6">

    <a href="{{ route('flanir.chat', 1) }}" class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-md transition block">
        <div class="text-4xl mb-4">💬</div>
        <h3 class="font-bold text-xl">Chat Dokter</h3>
        <p class="text-slate-500">Konsultasi langsung</p>
    </a>

    <a href="{{ route('flanir.pembayaran') }}" class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-md transition block">
        <div class="text-4xl mb-4">💳</div>
        <h3 class="font-bold text-xl">Pembayaran</h3>
        <p class="text-slate-500">Riwayat transaksi</p>
    </a>

    <a href="{{ route('flanir.akun') }}" class="bg-white rounded-3xl p-8 shadow-sm hover:shadow-md transition block">
        <div class="text-4xl mb-4">👤</div>
        <h3 class="font-bold text-xl">Profil Saya</h3>
        <p class="text-slate-500">Kelola akun</p>
    </a>

</div>

@endsection