<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLANIR - Modern Veterinary Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;600;800&display=swap');
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .animate-float { animation: float 3s ease-in-out infinite; }
        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-15px); } }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

    <nav class="flex items-center justify-between px-10 py-8 max-w-7xl mx-auto">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-indigo-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-indigo-200">+</div>
            <span class="font-bold text-xl tracking-tighter">FLANIR</span>
        </div>
        <a href="{{ route('flanir.login') }}" class="bg-slate-900 text-white px-6 py-3 rounded-full text-sm font-semibold hover:bg-slate-800 transition">Masuk Sistem</a>
    </nav>

    <header class="max-w-5xl mx-auto px-6 py-20 text-center">
        <div class="flex justify-center gap-6 mb-8">
            <div class="animate-float text-6xl">🐶</div>
            <div class="animate-float text-6xl" style="animation-delay: 0.5s;">🐱</div>
        </div>
        <span class="px-4 py-1.5 bg-indigo-50 text-indigo-700 rounded-full text-xs font-bold uppercase tracking-widest">Digital Veterinary Ecosystem</span>
        <h1 class="text-6xl md:text-7xl font-extrabold mt-8 leading-[1.1] tracking-tighter">
            Manajemen Klinik Hewan <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-500">Masa Depan.</span>
        </h1>
        <p class="mt-8 text-lg text-slate-600 max-w-2xl mx-auto">FLanir mentransformasi operasional klinik tradisional menjadi sistem digital yang efisien, terintegrasi, dan berbasis data.</p>
    </header>

    <section class="max-w-7xl mx-auto px-10 mb-24">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm text-center">
                <h3 class="text-3xl font-extrabold text-indigo-600">1.402+</h3>
                <p class="text-[10px] uppercase font-bold text-slate-400 mt-2 tracking-widest">Pasien Terdaftar</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm text-center">
                <h3 class="text-3xl font-extrabold text-indigo-600">48+</h3>
                <p class="text-[10px] uppercase font-bold text-slate-400 mt-2 tracking-widest">Antrean Aktif</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm text-center">
                <h3 class="text-3xl font-extrabold text-indigo-600">99%</h3>
                <p class="text-[10px] uppercase font-bold text-slate-400 mt-2 tracking-widest">Kepuasan</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm text-center">
                <h3 class="text-3xl font-extrabold text-indigo-600">24/7</h3>
                <p class="text-[10px] uppercase font-bold text-slate-400 mt-2 tracking-widest">Siaga Medis</p>
            </div>
        </div>
    </section>

    <section id="tujuan" class="max-w-7xl mx-auto px-10 py-20">
        <h2 class="text-4xl font-bold tracking-tight mb-12 text-center">Tujuan Pengembangan</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl border border-slate-100">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-bold mb-6">01</div>
                <h4 class="font-bold text-lg">Otomatisasi Administrasi</h4>
                <p class="text-sm text-slate-500 mt-4 leading-relaxed">Menyederhanakan alur kerja administratif klinik secara total untuk efisiensi waktu.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-bold mb-6">02</div>
                <h4 class="font-bold text-lg">Digitalisasi Rekam Medis</h4>
                <p class="text-sm text-slate-500 mt-4 leading-relaxed">Pencatatan riwayat kesehatan hewan yang akurat, aman, dan mudah diakses dokter.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-bold mb-6">03</div>
                <h4 class="font-bold text-lg">Layanan Modern</h4>
                <p class="text-sm text-slate-500 mt-4 leading-relaxed">Integrasi fitur tele-vet, chat, dan sistem pembayaran digital terpadu.</p>
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-10 py-20 bg-slate-900 rounded-[40px] text-white my-10">
        <h2 class="text-3xl font-bold text-center mb-16">Analisis Metode Kerja</h2>
        <div class="grid md:grid-cols-4 gap-6 text-center">
            <div class="p-6 border border-white/10 rounded-2xl">
                <h5 class="font-bold text-sm mb-2">Observasi</h5>
                <p class="text-xs text-slate-400">Pengamatan alur kerja klinik.</p>
            </div>
            <div class="p-6 border border-white/10 rounded-2xl">
                <h5 class="font-bold text-sm mb-2">Wawancara</h5>
                <p class="text-xs text-slate-400">Diskusi kebutuhan user.</p>
            </div>
            <div class="p-6 border border-white/10 rounded-2xl">
                <h5 class="font-bold text-sm mb-2">Studi Pustaka</h5>
                <p class="text-xs text-slate-400">Referensi ilmiah sistem.</p>
            </div>
            <div class="p-6 border border-white/10 rounded-2xl">
                <h5 class="font-bold text-sm mb-2">Dokumentasi</h5>
                <p class="text-xs text-slate-400">Analisis kebutuhan sistem.</p>
            </div>
        </div>
    </section>

    <footer class="py-16 text-center">
        <p class="text-sm font-bold">FLANNIR by Mohammad Anhaz Abdilah (434241102)</p>
        <p class="text-xs text-slate-400 mt-2">Fakultas Vokasi Universitas Airlangga</p>
    </footer>

</body>
</html>