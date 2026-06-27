<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FLANIR - Manajemen Klinik Hewan</title>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;400;600;800&display=swap');
        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
        @keyframes float {
            0%,
            100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-15px);
            }
        }
        .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: opacity 0.2s ease, transform 0.2s ease, visibility 0.2s;
        }
        .dropdown-group:hover .dropdown-menu,
        .dropdown-menu.open {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .article-card {
            transition: all 0.25s ease;
        }
        .article-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.12);
        }
        .tab-active {
            background-color: #4f46e5;
            color: #fff;
        }
        .tab-active:hover {
            background-color: #4338ca;
        }
        .tab-inactive {
            background-color: #f1f5f9;
            color: #334155;
        }
        .tab-inactive:hover {
            background-color: #e2e8f0;
        }
        .modal-overlay {
            background: rgba(15, 23, 42, 0.5);
            backdrop-filter: blur(4px);
        }
        .page-section {
            display: none;
        }
        .page-section.active {
            display: block;
            animation: fadeIn 0.35s ease forwards;
        }
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(12px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
        #artikel-section {
            display: none;
        }
        #artikel-section.visible {
            display: block;
        }
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        ::-webkit-scrollbar-thumb {
            background: #818cf8;
            border-radius: 12px;
        }
        .prose h3 {
            font-weight: 700;
            font-size: 1.1rem;
            margin-top: 1.2rem;
            margin-bottom: 0.5rem;
            color: #1e293b;
        }
        .prose ul {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin: 0.75rem 0;
        }
        .prose ul li {
            margin-bottom: 0.4rem;
            color: #475569;
        }
        .prose p {
            margin-bottom: 0.75rem;
            color: #334155;
        }
        .prose strong {
            color: #1e293b;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-900">

    <!-- ============================================================ -->
    <!-- NAVBAR -->
    <!-- ============================================================ -->
    <nav class="flex items-center justify-between px-6 md:px-10 py-6 max-w-7xl mx-auto border-b border-slate-100/80 bg-white/70 backdrop-blur-md sticky top-0 z-50">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-indigo-600 rounded-2xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-indigo-200">+</div>
            <span class="font-bold text-xl tracking-tighter">FLANIR</span>
        </div>
        <div class="flex items-center gap-4">
            <div class="dropdown-group relative">
                <button id="btnArtikel" class="flex items-center gap-1.5 px-5 py-2.5 rounded-full text-sm font-semibold bg-indigo-50 text-indigo-700 hover:bg-indigo-100 transition border border-indigo-100/60">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6m-6 4h6" />
                    </svg>
                    Artikel
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 ml-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="dropdown-menu absolute right-0 mt-2 w-56 bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden py-1.5 z-50">
                    <button onclick="navigateTo('arsip')" class="flex items-center gap-3 w-full px-5 py-3 text-sm text-slate-700 hover:bg-indigo-50 hover:text-indigo-700 transition font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                        </svg>
                        Arsip Artikel
                    </button>
                    <button onclick="navigateTo('detail')" class="flex items-center gap-3 w-full px-5 py-3 text-sm text-slate-700 hover:bg-indigo-50 hover:text-indigo-700 transition font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                        Detail Artikel
                    </button>
                    <button onclick="navigateTo('kelola')" class="flex items-center gap-3 w-full px-5 py-3 text-sm text-slate-700 hover:bg-indigo-50 hover:text-indigo-700 transition font-medium">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Kelola Artikel
                    </button>
                </div>
            </div>
            <a href="{{ route('flanir.login') }}" class="bg-slate-900 text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-slate-800 transition shadow-lg shadow-slate-200/50">
                Masuk Sistem
            </a>
        </div>
    </nav>

    <!-- ============================================================ -->
    <!-- LANDING PAGE (tetap utuh dan dipercantik)                     -->
    <!-- ============================================================ -->
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
        <div class="mt-10 flex flex-wrap justify-center gap-4">
            <button onclick="toggleArtikel()" class="bg-indigo-600 text-white px-8 py-4 rounded-full text-sm font-semibold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200">Jelajahi Artikel</button>
            <a href="#tujuan" class="bg-white text-slate-700 px-8 py-4 rounded-full text-sm font-semibold border border-slate-200 hover:bg-slate-50 transition">Pelajari Lebih</a>
        </div>
    </header>

    <!-- STATISTIK -->
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

    <!-- TUJUAN -->
    <section id="tujuan" class="max-w-7xl mx-auto px-10 py-20">
        <h2 class="text-4xl font-bold tracking-tight mb-12 text-center">Tujuan Pengembangan</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-bold mb-6">01</div>
                <h4 class="font-bold text-lg">Otomatisasi Administrasi</h4>
                <p class="text-sm text-slate-500 mt-4 leading-relaxed">Menyederhanakan alur kerja administratif klinik secara total untuk efisiensi waktu.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-bold mb-6">02</div>
                <h4 class="font-bold text-lg">Digitalisasi Rekam Medis</h4>
                <p class="text-sm text-slate-500 mt-4 leading-relaxed">Pencatatan riwayat kesehatan hewan yang akurat, aman, dan mudah diakses dokter.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-bold mb-6">03</div>
                <h4 class="font-bold text-lg">Layanan Modern</h4>
                <p class="text-sm text-slate-500 mt-4 leading-relaxed">Integrasi fitur tele-vet, chat, dan sistem pembayaran digital terpadu.</p>
            </div>
        </div>
    </section>

    <!-- ANALISIS METODE -->
    <section class="max-w-7xl mx-auto px-10 py-20 bg-slate-900 rounded-[40px] text-white my-10">
        <h2 class="text-3xl font-bold text-center mb-16">Analisis Metode Kerja</h2>
        <div class="grid md:grid-cols-4 gap-6 text-center">
            <div class="p-6 border border-white/10 rounded-2xl hover:bg-white/5 transition">
                <h5 class="font-bold text-sm mb-2">Observasi</h5>
                <p class="text-xs text-slate-400">Pengamatan alur kerja klinik.</p>
            </div>
            <div class="p-6 border border-white/10 rounded-2xl hover:bg-white/5 transition">
                <h5 class="font-bold text-sm mb-2">Wawancara</h5>
                <p class="text-xs text-slate-400">Diskusi kebutuhan user.</p>
            </div>
            <div class="p-6 border border-white/10 rounded-2xl hover:bg-white/5 transition">
                <h5 class="font-bold text-sm mb-2">Studi Pustaka</h5>
                <p class="text-xs text-slate-400">Referensi ilmiah sistem.</p>
            </div>
            <div class="p-6 border border-white/10 rounded-2xl hover:bg-white/5 transition">
                <h5 class="font-bold text-sm mb-2">Dokumentasi</h5>
                <p class="text-xs text-slate-400">Analisis kebutuhan sistem.</p>
            </div>
        </div>
    </section>

    <!-- FITUR UNGGULAN -->
    <section class="max-w-7xl mx-auto px-10 py-20">
        <h2 class="text-4xl font-bold tracking-tight text-center mb-16">Fitur Unggulan <span class="text-indigo-600">FLANIR</span></h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-start">
                <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-2xl">📊</div>
                <h4 class="font-bold text-xl mt-5">Dashboard Real-Time</h4>
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">Pantau antrean, jadwal dokter, dan statistik klinik secara langsung.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-start">
                <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-2xl">🩺</div>
                <h4 class="font-bold text-xl mt-5">Rekam Medis Digital</h4>
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">Akses riwayat kesehatan pasien dengan cepat dan aman.</p>
            </div>
            <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm flex flex-col items-start">
                <div class="w-14 h-14 bg-indigo-100 rounded-2xl flex items-center justify-center text-2xl">💬</div>
                <h4 class="font-bold text-xl mt-5">Tele-Vet & Chat</h4>
                <p class="text-sm text-slate-500 mt-2 leading-relaxed">Konsultasi jarak jauh dan komunikasi langsung dengan dokter hewan.</p>
            </div>
        </div>
    </section>

    <!-- TESTIMONI -->
    <section class="max-w-7xl mx-auto px-10 py-20 bg-indigo-50/50 rounded-[40px] my-10">
        <h2 class="text-3xl font-bold text-center mb-16">Apa Kata <span class="text-indigo-600">Klien Kami</span></h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-white">
                <p class="text-sm text-slate-600 italic">“FLANIR benar-benar mengubah cara klinik kami beroperasi. Semua jadi lebih rapi dan cepat.”</p>
                <div class="flex items-center gap-3 mt-6">
                    <div class="w-10 h-10 bg-indigo-200 rounded-full flex items-center justify-center text-white font-bold">DR</div>
                    <div><p class="text-sm font-semibold">drh. Ratna</p><p class="text-xs text-slate-400">Klinik Hewan Sehat</p></div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-white">
                <p class="text-sm text-slate-600 italic">“Rekam medis digital sangat membantu, tidak perlu lagi cari berkas fisik.”</p>
                <div class="flex items-center gap-3 mt-6">
                    <div class="w-10 h-10 bg-indigo-200 rounded-full flex items-center justify-center text-white font-bold">AB</div>
                    <div><p class="text-sm font-semibold">drh. Budi</p><p class="text-xs text-slate-400">PetCare Center</p></div>
                </div>
            </div>
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-white">
                <p class="text-sm text-slate-600 italic">“Pasien kami lebih nyaman dan pemilik hewan merasa lebih terinformasi.”</p>
                <div class="flex items-center gap-3 mt-6">
                    <div class="w-10 h-10 bg-indigo-200 rounded-full flex items-center justify-center text-white font-bold">CS</div>
                    <div><p class="text-sm font-semibold">drh. Sari</p><p class="text-xs text-slate-400">Vet Care Plus</p></div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- SECTION ARTIKEL (tersembunyi secara default)                  -->
    <!-- ============================================================ -->
    <section id="artikel-section" class="max-w-7xl mx-auto px-6 pb-24 scroll-mt-20">
        <div class="border-t border-slate-200 pt-16">
            <h2 class="text-4xl font-bold tracking-tight text-center mb-4">📚 Pusat Artikel Klinik</h2>
            <p class="text-center text-slate-500 max-w-xl mx-auto mb-12">Arsip, detail, dan kelola seluruh konten edukasi & informasi seputar kesehatan hewan.</p>

            <!-- TAB NAVIGASI -->
            <div class="flex flex-wrap items-center gap-2 mb-10 border-b border-slate-200/70 pb-4">
                <button onclick="navigateTo('arsip')" id="tab-arsip" class="tab-btn px-5 py-2.5 rounded-xl text-sm font-semibold transition tab-active">
                    📚 Arsip
                </button>
                <button onclick="navigateTo('detail')" id="tab-detail" class="tab-btn px-5 py-2.5 rounded-xl text-sm font-semibold transition tab-inactive">
                    📖 Detail
                </button>
                <button onclick="navigateTo('kelola')" id="tab-kelola" class="tab-btn px-5 py-2.5 rounded-xl text-sm font-semibold transition tab-inactive">
                    ✏️ Kelola
                </button>
                <span class="ml-auto text-xs text-slate-400 font-medium hidden md:inline">⏱ Terakhir diperbarui: hari ini</span>
            </div>

            <!-- ====== PAGE: ARSIP ====== -->
            <div id="page-arsip" class="page-section active">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl font-bold tracking-tight">📚 Arsip Artikel</h2>
                    <span class="text-sm text-slate-500 bg-white px-4 py-1.5 rounded-full border border-slate-200">Total 8 artikel</span>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                    <!-- Artikel 1 -->
                    <div class="article-card bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="h-36 bg-gradient-to-br from-indigo-100 to-purple-100 flex items-center justify-center text-5xl">🐶</div>
                        <div class="p-5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">Manajemen</span>
                            <h3 class="font-bold text-lg mt-3 leading-tight">Sistem Manajemen Klinik Modern</h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-3">Pelajari bagaimana FLANIR mengintegrasikan administrasi, rekam medis, dan layanan pasien dalam satu platform digital yang efisien.</p>
                            <div class="flex items-center justify-between mt-4 text-xs text-slate-400">
                                <span>📅 15 Jun 2026</span>
                                <span>👤 drh. Anhaz</span>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel 2 -->
                    <div class="article-card bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="h-36 bg-gradient-to-br from-emerald-100 to-teal-100 flex items-center justify-center text-5xl">📋</div>
                        <div class="p-5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-emerald-600 bg-emerald-50 px-3 py-1 rounded-full">Rekam Medis</span>
                            <h3 class="font-bold text-lg mt-3 leading-tight">Digitalisasi Rekam Medis Hewan</h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-3">Transformasi pencatatan riwayat kesehatan dari kertas ke digital: keamanan, aksesibilitas, dan akurasi data pasien.</p>
                            <div class="flex items-center justify-between mt-4 text-xs text-slate-400">
                                <span>📅 10 Jun 2026</span>
                                <span>👤 drh. Sari</span>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel 3 -->
                    <div class="article-card bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="h-36 bg-gradient-to-br from-amber-100 to-orange-100 flex items-center justify-center text-5xl">💊</div>
                        <div class="p-5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-amber-600 bg-amber-50 px-3 py-1 rounded-full">Vaksinasi</span>
                            <h3 class="font-bold text-lg mt-3 leading-tight">Panduan Vaksinasi Lengkap untuk Anjing</h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-3">Jadwal vaksinasi, jenis vaksin, dan pentingnya perlindungan terhadap penyakit menular pada anjing.</p>
                            <div class="flex items-center justify-between mt-4 text-xs text-slate-400">
                                <span>📅 5 Jun 2026</span>
                                <span>👤 drh. Budi</span>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel 4 -->
                    <div class="article-card bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="h-36 bg-gradient-to-br from-rose-100 to-pink-100 flex items-center justify-center text-5xl">🥗</div>
                        <div class="p-5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-rose-600 bg-rose-50 px-3 py-1 rounded-full">Nutrisi</span>
                            <h3 class="font-bold text-lg mt-3 leading-tight">Nutrisi Seimbang untuk Kucing Semua Usia</h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-3">Kebutuhan nutrisi kucing berdasarkan fase kehidupan: anak, dewasa, dan senior. Panduan memilih pakan yang tepat.</p>
                            <div class="flex items-center justify-between mt-4 text-xs text-slate-400">
                                <span>📅 28 Mei 2026</span>
                                <span>👤 drh. Anhaz</span>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel 5 -->
                    <div class="article-card bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="h-36 bg-gradient-to-br from-sky-100 to-blue-100 flex items-center justify-center text-5xl">🩺</div>
                        <div class="p-5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-sky-600 bg-sky-50 px-3 py-1 rounded-full">Telemedicine</span>
                            <h3 class="font-bold text-lg mt-3 leading-tight">Tele-Vet: Konsultasi Jarak Jauh</h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-3">Layanan konsultasi online dengan dokter hewan: cara kerja, manfaat, dan teknologi yang mendukung FLANIR.</p>
                            <div class="flex items-center justify-between mt-4 text-xs text-slate-400">
                                <span>📅 22 Mei 2026</span>
                                <span>👤 drh. Dina</span>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel 6 -->
                    <div class="article-card bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="h-36 bg-gradient-to-br from-violet-100 to-purple-100 flex items-center justify-center text-5xl">🧘</div>
                        <div class="p-5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-violet-600 bg-violet-50 px-3 py-1 rounded-full">Perilaku</span>
                            <h3 class="font-bold text-lg mt-3 leading-tight">Mengatasi Kecemasan pada Hewan Peliharaan</h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-3">Penyebab stres pada hewan, tanda-tanda kecemasan, dan metode penanganan yang efektif untuk anjing dan kucing.</p>
                            <div class="flex items-center justify-between mt-4 text-xs text-slate-400">
                                <span>📅 15 Mei 2026</span>
                                <span>👤 drh. Rizki</span>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel 7 -->
                    <div class="article-card bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="h-36 bg-gradient-to-br from-fuchsia-100 to-pink-100 flex items-center justify-center text-5xl">🏥</div>
                        <div class="p-5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-fuchsia-600 bg-fuchsia-50 px-3 py-1 rounded-full">Operasi</span>
                            <h3 class="font-bold text-lg mt-3 leading-tight">Perawatan Pasca Operasi pada Hewan</h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-3">Panduan lengkap perawatan hewan setelah tindakan operasi: perawatan luka, obat, dan pemantauan pemulihan.</p>
                            <div class="flex items-center justify-between mt-4 text-xs text-slate-400">
                                <span>📅 8 Mei 2026</span>
                                <span>👤 drh. Sari</span>
                            </div>
                        </div>
                    </div>

                    <!-- Artikel 8 -->
                    <div class="article-card bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="h-36 bg-gradient-to-br from-cyan-100 to-blue-100 flex items-center justify-center text-5xl">⏳</div>
                        <div class="p-5">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-cyan-600 bg-cyan-50 px-3 py-1 rounded-full">Antrean</span>
                            <h3 class="font-bold text-lg mt-3 leading-tight">Manajemen Antrean Klinik Efektif</h3>
                            <p class="text-xs text-slate-500 mt-2 line-clamp-3">Sistem antrean digital FLANIR: mengurangi waktu tunggu, meningkatkan kepuasan pemilik hewan, dan efisiensi dokter.</p>
                            <div class="flex items-center justify-between mt-4 text-xs text-slate-400">
                                <span>📅 1 Mei 2026</span>
                                <span>👤 drh. Anhaz</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ====== PAGE: DETAIL ====== -->
            <div id="page-detail" class="page-section">
                <div class="max-w-4xl mx-auto">
                    <div class="flex items-center gap-3 mb-6">
                        <button onclick="navigateTo('arsip')" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali ke Arsip
                        </button>
                        <span class="text-xs text-slate-400 ml-auto">Detail Artikel</span>
                    </div>

                    <!-- Detail Artikel 1: Sistem Manajemen Klinik Modern -->
                    <div id="detail-content" class="bg-white rounded-3xl border border-slate-100 shadow-sm p-8 md:p-10">
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-[10px] font-bold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full">Manajemen</span>
                            <span class="text-[10px] text-slate-400">📅 15 Jun 2026</span>
                        </div>
                        <h2 class="text-3xl font-extrabold tracking-tight leading-tight">Sistem Manajemen Klinik Modern dengan FLANIR</h2>
                        <p class="text-sm text-slate-500 mt-2">Oleh <span class="font-semibold text-slate-700">drh. Anhaz</span> — 5 menit membaca</p>

                        <div class="h-48 md:h-64 bg-gradient-to-br from-indigo-100 to-purple-100 rounded-2xl flex items-center justify-center text-7xl mt-6">🐶</div>

                        <div class="mt-8 prose prose-slate max-w-none text-sm leading-relaxed">
                            <p><strong>FLANIR</strong> hadir sebagai solusi digital untuk mengatasi berbagai tantangan operasional di klinik hewan. Sistem ini mengintegrasikan tiga pilar utama: <strong>administrasi, rekam medis, dan layanan pasien</strong> dalam satu platform yang mudah digunakan.</p>

                            <h3>1. Administrasi yang Terotomatisasi</h3>
                            <p>Dengan FLANIR, proses pendaftaran pasien, penjadwalan dokter, dan manajemen antrean menjadi lebih cepat. Data pemilik hewan dan riwayat kunjungan tersimpan rapi dan dapat diakses kapan saja. Fitur notifikasi otomatis juga mengingatkan jadwal vaksinasi dan kontrol ulang.</p>

                            <h3>2. Rekam Medis Digital yang Aman</h3>
                            <p>Semua riwayat kesehatan, hasil pemeriksaan, diagnosis, dan resep obat dicatat secara digital. Data dilindungi dengan enkripsi dan hanya dapat diakses oleh dokter yang berwenang. Ini mengurangi risiko kehilangan data dan memudahkan kolaborasi antar dokter.</p>

                            <h3>3. Layanan Pasien yang Lebih Baik</h3>
                            <p>Fitur <strong>Tele-Vet</strong> memungkinkan konsultasi jarak jauh, sementara <strong>chat real-time</strong> menghubungkan pemilik hewan dengan tim medis. Sistem pembayaran digital juga terintegrasi untuk kemudahan transaksi.</p>

                            <div class="bg-indigo-50 rounded-2xl p-5 mt-6 border border-indigo-100/50">
                                <p class="text-xs font-semibold text-indigo-700 uppercase tracking-wider">💡 Keunggulan FLANIR</p>
                                <ul class="text-sm text-slate-600 mt-1 list-disc list-inside">
                                    <li>Efisiensi waktu administrasi hingga 60%</li>
                                    <li>Akses rekam medis 24/7 dari perangkat apa saja</li>
                                    <li>Kepuasan pemilik hewan meningkat drastis</li>
                                    <li>Analisis data untuk pengambilan keputusan klinik</li>
                                </ul>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 mt-8 pt-6 border-t border-slate-100 text-xs text-slate-400">
                            <span>🏷️ Tags: #manajemen #digital #klinik</span>
                            <span class="ml-auto">🔄 Dibaca 2.104 kali</span>
                        </div>
                    </div>

                    <!-- Artikel Terkait -->
                    <div class="mt-10">
                        <h3 class="font-bold text-lg mb-4">📎 Artikel Terkait</h3>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div class="bg-white rounded-2xl border border-slate-100 p-4 hover:shadow-sm transition">
                                <h4 class="font-semibold text-sm">Digitalisasi Rekam Medis Hewan</h4>
                                <p class="text-xs text-slate-400 mt-1">drh. Sari · 10 Jun 2026</p>
                            </div>
                            <div class="bg-white rounded-2xl border border-slate-100 p-4 hover:shadow-sm transition">
                                <h4 class="font-semibold text-sm">Manajemen Antrean Klinik Efektif</h4>
                                <p class="text-xs text-slate-400 mt-1">drh. Anhaz · 1 Mei 2026</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ====== PAGE: KELOLA ====== -->
            <div id="page-kelola" class="page-section">
                <div class="max-w-5xl mx-auto">
                    <div class="flex items-center justify-between mb-8 flex-wrap gap-4">
                        <h2 class="text-2xl font-bold tracking-tight">✏️ Kelola Artikel</h2>
                        <button onclick="openCreateModal()" class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200/50 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>
                            Artikel Baru
                        </button>
                    </div>

                    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-slate-50/80 text-xs uppercase font-bold text-slate-400 tracking-wider">
                                    <tr>
                                        <th class="px-6 py-4 text-left">Judul</th>
                                        <th class="px-6 py-4 text-left hidden md:table-cell">Kategori</th>
                                        <th class="px-6 py-4 text-left hidden lg:table-cell">Penulis</th>
                                        <th class="px-6 py-4 text-left hidden sm:table-cell">Tanggal</th>
                                        <th class="px-6 py-4 text-right">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100">
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-slate-800">Sistem Manajemen Klinik Modern</td>
                                        <td class="px-6 py-4 hidden md:table-cell"><span class="text-[10px] font-bold uppercase bg-indigo-50 text-indigo-600 px-3 py-1 rounded-full">Manajemen</span></td>
                                        <td class="px-6 py-4 hidden lg:table-cell text-slate-600">drh. Anhaz</td>
                                        <td class="px-6 py-4 hidden sm:table-cell text-slate-400">15 Jun 2026</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <button onclick="openEditModal('1')" class="text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></button>
                                                <button onclick="deleteArticle('1')" class="text-rose-500 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-slate-800">Digitalisasi Rekam Medis Hewan</td>
                                        <td class="px-6 py-4 hidden md:table-cell"><span class="text-[10px] font-bold uppercase bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full">Rekam Medis</span></td>
                                        <td class="px-6 py-4 hidden lg:table-cell text-slate-600">drh. Sari</td>
                                        <td class="px-6 py-4 hidden sm:table-cell text-slate-400">10 Jun 2026</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <button onclick="openEditModal('2')" class="text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></button>
                                                <button onclick="deleteArticle('2')" class="text-rose-500 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-slate-800">Panduan Vaksinasi Lengkap untuk Anjing</td>
                                        <td class="px-6 py-4 hidden md:table-cell"><span class="text-[10px] font-bold uppercase bg-amber-50 text-amber-600 px-3 py-1 rounded-full">Vaksinasi</span></td>
                                        <td class="px-6 py-4 hidden lg:table-cell text-slate-600">drh. Budi</td>
                                        <td class="px-6 py-4 hidden sm:table-cell text-slate-400">5 Jun 2026</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <button onclick="openEditModal('3')" class="text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></button>
                                                <button onclick="deleteArticle('3')" class="text-rose-500 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-slate-800">Nutrisi Seimbang untuk Kucing Semua Usia</td>
                                        <td class="px-6 py-4 hidden md:table-cell"><span class="text-[10px] font-bold uppercase bg-rose-50 text-rose-600 px-3 py-1 rounded-full">Nutrisi</span></td>
                                        <td class="px-6 py-4 hidden lg:table-cell text-slate-600">drh. Anhaz</td>
                                        <td class="px-6 py-4 hidden sm:table-cell text-slate-400">28 Mei 2026</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <button onclick="openEditModal('4')" class="text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></button>
                                                <button onclick="deleteArticle('4')" class="text-rose-500 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-slate-800">Tele-Vet: Konsultasi Jarak Jauh</td>
                                        <td class="px-6 py-4 hidden md:table-cell"><span class="text-[10px] font-bold uppercase bg-sky-50 text-sky-600 px-3 py-1 rounded-full">Telemedicine</span></td>
                                        <td class="px-6 py-4 hidden lg:table-cell text-slate-600">drh. Dina</td>
                                        <td class="px-6 py-4 hidden sm:table-cell text-slate-400">22 Mei 2026</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <button onclick="openEditModal('5')" class="text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></button>
                                                <button onclick="deleteArticle('5')" class="text-rose-500 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-slate-800">Mengatasi Kecemasan pada Hewan Peliharaan</td>
                                        <td class="px-6 py-4 hidden md:table-cell"><span class="text-[10px] font-bold uppercase bg-violet-50 text-violet-600 px-3 py-1 rounded-full">Perilaku</span></td>
                                        <td class="px-6 py-4 hidden lg:table-cell text-slate-600">drh. Rizki</td>
                                        <td class="px-6 py-4 hidden sm:table-cell text-slate-400">15 Mei 2026</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <button onclick="openEditModal('6')" class="text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></button>
                                                <button onclick="deleteArticle('6')" class="text-rose-500 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-slate-800">Perawatan Pasca Operasi pada Hewan</td>
                                        <td class="px-6 py-4 hidden md:table-cell"><span class="text-[10px] font-bold uppercase bg-fuchsia-50 text-fuchsia-600 px-3 py-1 rounded-full">Operasi</span></td>
                                        <td class="px-6 py-4 hidden lg:table-cell text-slate-600">drh. Sari</td>
                                        <td class="px-6 py-4 hidden sm:table-cell text-slate-400">8 Mei 2026</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <button onclick="openEditModal('7')" class="text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></button>
                                                <button onclick="deleteArticle('7')" class="text-rose-500 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-slate-800">Manajemen Antrean Klinik Efektif</td>
                                        <td class="px-6 py-4 hidden md:table-cell"><span class="text-[10px] font-bold uppercase bg-cyan-50 text-cyan-600 px-3 py-1 rounded-full">Antrean</span></td>
                                        <td class="px-6 py-4 hidden lg:table-cell text-slate-600">drh. Anhaz</td>
                                        <td class="px-6 py-4 hidden sm:table-cell text-slate-400">1 Mei 2026</td>
                                        <td class="px-6 py-4 text-right">
                                            <div class="flex items-center justify-end gap-2">
                                                <button onclick="openEditModal('8')" class="text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg></button>
                                                <button onclick="deleteArticle('8')" class="text-rose-500 hover:text-rose-700 bg-rose-50 hover:bg-rose-100 p-1.5 rounded-lg transition"><svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-6 text-xs text-slate-400 flex items-center gap-4">
                        <span>📌 Menampilkan 8 artikel</span>
                        <span class="flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span>
                            <span>Status: <span class="text-slate-600 font-medium">Semua artikel aktif</span></span>
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- ============================================================ -->
    <!-- MODAL CREATE / EDIT                                           -->
    <!-- ============================================================ -->
    <div id="articleModal" class="fixed inset-0 z-50 flex items-center justify-center px-4 opacity-0 pointer-events-none transition-opacity duration-300">
        <div class="modal-overlay absolute inset-0" onclick="closeModal()"></div>
        <div class="relative bg-white rounded-3xl shadow-2xl max-w-lg w-full p-7 md:p-9 transform transition-all duration-300 scale-95">
            <div class="flex items-center justify-between mb-5">
                <h3 id="modalTitle" class="text-xl font-bold">Tambah Artikel Baru</h3>
                <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600 p-1 rounded-full hover:bg-slate-100 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <form id="articleForm" class="space-y-4" onsubmit="handleFormSubmit(event)">
                <input type="hidden" id="editId" value="" />
                <div>
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-1.5">Judul Artikel</label>
                    <input id="formTitle" type="text" required placeholder="Masukkan judul artikel..." class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-400 focus:border-transparent outline-none transition" />
                </div>
                <div>
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-1.5">Kategori</label>
                    <select id="formCategory" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-400 focus:border-transparent outline-none transition bg-white">
                        <option value="Manajemen">Manajemen</option>
                        <option value="Rekam Medis">Rekam Medis</option>
                        <option value="Vaksinasi">Vaksinasi</option>
                        <option value="Nutrisi">Nutrisi</option>
                        <option value="Telemedicine">Telemedicine</option>
                        <option value="Perilaku">Perilaku</option>
                        <option value="Operasi">Operasi</option>
                        <option value="Antrean">Antrean</option>
                    </select>
                </div>
                <div>
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-1.5">Penulis</label>
                    <input id="formAuthor" type="text" required placeholder="Nama penulis..." class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-400 focus:border-transparent outline-none transition" />
                </div>
                <div>
                    <label class="text-xs font-bold uppercase tracking-wider text-slate-500 block mb-1.5">Konten (ringkasan)</label>
                    <textarea id="formContent" rows="4" required placeholder="Tulis ringkasan atau konten artikel..." class="w-full rounded-xl border border-slate-200 px-4 py-3 text-sm focus:ring-2 focus:ring-indigo-400 focus:border-transparent outline-none transition resize-none"></textarea>
                </div>
                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-xl text-sm font-semibold hover:bg-indigo-700 transition shadow-lg shadow-indigo-200/50 flex-1">
                        Simpan Artikel
                    </button>
                    <button type="button" onclick="closeModal()" class="px-6 py-3 rounded-xl text-sm font-medium text-slate-500 hover:bg-slate-100 transition">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- FOOTER                                                         -->
    <!-- ============================================================ -->
    <footer class="py-16 text-center border-t border-slate-100/80 bg-white/60 backdrop-blur-sm">
        <p class="text-sm font-bold">FLANIR by Mohammad Anhaz Abdilah (434241102)</p>
        <p class="text-xs text-slate-400 mt-2">Fakultas Vokasi Universitas Airlangga</p>
        <div class="flex justify-center gap-6 mt-6 text-xs text-slate-400">
            <a href="#" class="hover:text-indigo-600">Tentang</a>
            <a href="#" class="hover:text-indigo-600">Kebijakan Privasi</a>
            <a href="#" class="hover:text-indigo-600">Kontak</a>
        </div>
    </footer>

    <!-- ============================================================ -->
    <!-- JAVASCRIPT                                                     -->
    <!-- ============================================================ -->
    <script>
        // ---- State ----
        let currentPage = 'arsip';

        // ---- Toggle visibility artikel section ----
        function toggleArtikel() {
            const section = document.getElementById('artikel-section');
            section.classList.toggle('visible');
            if (section.classList.contains('visible')) {
                navigateTo('arsip');
                setTimeout(() => {
                    section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            }
        }

        // ---- Navigasi ----
        function navigateTo(page) {
            const section = document.getElementById('artikel-section');
            if (!section.classList.contains('visible')) {
                section.classList.add('visible');
            }
            currentPage = page;
            document.querySelectorAll('.page-section').forEach(el => el.classList.remove('active'));
            const target = document.getElementById('page-' + page);
            if (target) target.classList.add('active');
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('tab-active', 'tab-inactive');
                btn.classList.add('tab-inactive');
            });
            const activeTab = document.getElementById('tab-' + page);
            if (activeTab) {
                activeTab.classList.remove('tab-inactive');
                activeTab.classList.add('tab-active');
            }
            document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.remove('open'));
            setTimeout(() => {
                section.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }, 100);
        }

        // ---- Dropdown toggle ----
        document.querySelectorAll('.dropdown-group > button').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                if (this.id === 'btnArtikel') {
                    toggleArtikel();
                } else {
                    const menu = this.parentElement.querySelector('.dropdown-menu');
                    menu.classList.toggle('open');
                }
            });
        });
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown-group')) {
                document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.remove('open'));
            }
        });

        // ---- Modal ----
        function openCreateModal() {
            document.getElementById('modalTitle').textContent = '✏️ Tambah Artikel Baru';
            document.getElementById('editId').value = '';
            document.getElementById('formTitle').value = '';
            document.getElementById('formCategory').value = 'Manajemen';
            document.getElementById('formAuthor').value = '';
            document.getElementById('formContent').value = '';
            document.getElementById('articleModal').classList.remove('opacity-0', 'pointer-events-none');
            document.getElementById('articleModal').querySelector('.relative').classList.remove('scale-95');
            document.getElementById('articleModal').querySelector('.relative').classList.add('scale-100');
        }

        function openEditModal(id) {
            const data = {
                '1': { title: 'Sistem Manajemen Klinik Modern', category: 'Manajemen', author: 'drh. Anhaz',
                    content: 'FLANIR mengintegrasikan administrasi, rekam medis, dan layanan pasien.' },
                '2': { title: 'Digitalisasi Rekam Medis Hewan', category: 'Rekam Medis', author: 'drh. Sari',
                    content: 'Transformasi pencatatan riwayat kesehatan dari kertas ke digital.' },
                '3': { title: 'Panduan Vaksinasi Lengkap untuk Anjing', category: 'Vaksinasi', author: 'drh. Budi',
                    content: 'Jadwal vaksinasi dan pentingnya perlindungan terhadap penyakit.' },
                '4': { title: 'Nutrisi Seimbang untuk Kucing Semua Usia', category: 'Nutrisi', author: 'drh. Anhaz',
                    content: 'Kebutuhan nutrisi kucing berdasarkan fase kehidupan.' },
                '5': { title: 'Tele-Vet: Konsultasi Jarak Jauh', category: 'Telemedicine', author: 'drh. Dina',
                    content: 'Layanan konsultasi online dengan dokter hewan.' },
                '6': { title: 'Mengatasi Kecemasan pada Hewan Peliharaan', category: 'Perilaku', author: 'drh. Rizki',
                    content: 'Penyebab stres dan metode penanganan yang efektif.' },
                '7': { title: 'Perawatan Pasca Operasi pada Hewan', category: 'Operasi', author: 'drh. Sari',
                    content: 'Panduan perawatan luka dan pemantauan pemulihan.' },
                '8': { title: 'Manajemen Antrean Klinik Efektif', category: 'Antrean', author: 'drh. Anhaz',
                    content: 'Sistem antrean digital untuk efisiensi klinik.' },
            };
            const item = data[id];
            if (!item) return;
            document.getElementById('modalTitle').textContent = '✏️ Edit Artikel';
            document.getElementById('editId').value = id;
            document.getElementById('formTitle').value = item.title;
            document.getElementById('formCategory').value = item.category;
            document.getElementById('formAuthor').value = item.author;
            document.getElementById('formContent').value = item.content;
            document.getElementById('articleModal').classList.remove('opacity-0', 'pointer-events-none');
            document.getElementById('articleModal').querySelector('.relative').classList.remove('scale-95');
            document.getElementById('articleModal').querySelector('.relative').classList.add('scale-100');
        }

        function closeModal() {
            const modal = document.getElementById('articleModal');
            modal.classList.add('opacity-0', 'pointer-events-none');
            modal.querySelector('.relative').classList.remove('scale-100');
            modal.querySelector('.relative').classList.add('scale-95');
        }

        function handleFormSubmit(e) {
            e.preventDefault();
            const id = document.getElementById('editId').value;
            const title = document.getElementById('formTitle').value.trim();
            if (!title) { alert('Harap lengkapi semua field!'); return; }
            alert(id ? '✅ Artikel berhasil diperbarui: "' + title + '"' : '✅ Artikel baru berhasil ditambahkan: "' + title +
                '"');
            closeModal();
        }

        function deleteArticle(id) {
            if (confirm('Yakin ingin menghapus artikel ini?')) {
                alert('🗑️ Artikel #' + id + ' telah dihapus.');
            }
        }

        // ---- Inisialisasi ----
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('tab-active', 'tab-inactive'));
            document.getElementById('tab-arsip').classList.add('tab-active');
            document.getElementById('page-arsip').classList.add('active');
        });
    </script>

</body>
</html>