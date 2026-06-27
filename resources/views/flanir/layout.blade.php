<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLANIR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');
        * { font-family: 'Plus Jakarta Sans', sans-serif; }
        body { background: #f1f5f9; }
        .sidebar-transition { transition: all .3s ease; }
    </style>
</head>
<body>

<div class="flex min-h-screen">

    <!-- ==================== SIDEBAR ==================== -->
    <aside id="sidebar" class="sidebar-transition w-72 bg-white border-r border-slate-200 flex flex-col shadow-sm">

        <!-- LOGO -->
        <div class="h-24 flex items-center justify-between px-6 border-b">
            <div id="logoText">
                <h1 class="text-4xl font-black text-purple-600">FLANIR</h1>
                <p class="text-slate-500 text-sm">Klinik Hewan Modern</p>
            </div>
            <button onclick="toggleSidebar()" class="bg-purple-100 text-purple-600 w-10 h-10 rounded-xl hover:bg-purple-200">
                ☰
            </button>
        </div>

        <!-- MENU -->
        <nav class="flex-1 p-5 space-y-2">

            <a href="{{ route('flanir.dashboard') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl {{ request()->routeIs('flanir.dashboard') ? 'bg-purple-100 text-purple-700 font-bold' : 'hover:bg-slate-100' }}">
                🏠 <span class="menu-text">Dashboard</span>
            </a>

            <a href="{{ route('flanir.layanan') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl {{ request()->routeIs('flanir.layanan') ? 'bg-purple-100 text-purple-700 font-bold' : 'hover:bg-slate-100' }}">
                🐶 <span class="menu-text">Layanan</span>
            </a>

            <a href="{{ route('flanir.konsultasi') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl {{ request()->routeIs('flanir.konsultasi') ? 'bg-purple-100 text-purple-700 font-bold' : 'hover:bg-slate-100' }}">
                📋 <span class="menu-text">Konsultasi</span>
            </a>

            <a href="{{ route('flanir.pembayaran') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl {{ request()->routeIs('flanir.pembayaran') ? 'bg-purple-100 text-purple-700 font-bold' : 'hover:bg-slate-100' }}">
                💳 <span class="menu-text">Pembayaran</span>
            </a>

            <!-- ⭐ HISTORY TRANSAKSI (baru) -->
            <a href="{{ route('flanir.history') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl {{ request()->routeIs('flanir.history') ? 'bg-purple-100 text-purple-700 font-bold' : 'hover:bg-slate-100' }}">
                📜 <span class="menu-text">History Transaksi</span>
            </a>

            <a href="{{ route('flanir.chat', 1) }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl {{ request()->routeIs('flanir.chat') ? 'bg-purple-100 text-purple-700 font-bold' : 'hover:bg-slate-100' }}">
                💬 <span class="menu-text">Chat Dokter</span>
            </a>

            <a href="{{ route('flanir.akun') }}"
               class="flex items-center gap-4 px-4 py-4 rounded-2xl {{ request()->routeIs('flanir.akun') ? 'bg-purple-100 text-purple-700 font-bold' : 'hover:bg-slate-100' }}">
                👤 <span class="menu-text">Akun Saya</span>
            </a>

        </nav>

        <!-- PROFILE -->
        <div class="p-5 border-t">
            <div class="bg-purple-50 rounded-3xl p-4">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 rounded-full bg-purple-600 text-white flex items-center justify-center text-xl font-bold">
                        SP
                    </div>
                    <div id="profileText">
                        <h4 class="font-bold">Sarah Putri</h4>
                        <p class="text-sm text-slate-500">Pasien</p>
                    </div>
                </div>
                <a href="{{ route('flanir.logout') }}"
                   class="block mt-4 bg-red-500 text-white text-center py-3 rounded-2xl font-bold">
                    Logout
                </a>
            </div>
        </div>

    </aside>

    <!-- ==================== MAIN ==================== -->
    <div class="flex-1">

        <!-- TOPBAR -->
        <header class="bg-white border-b px-10 py-6 flex justify-between items-center">
            <div>
                <h2 class="text-3xl font-black">@yield('title', 'Dashboard')</h2>
                <p class="text-slate-500">@yield('subtitle', 'Sistem Klinik Hewan FLANIR')</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="text-right">
                    <h4 class="font-bold">Sarah Putri</h4>
                    <p class="text-sm text-slate-500">Pasien</p>
                </div>
                <img src="https://ui-avatars.com/api/?name=Sarah+Putri&background=8A56F2&color=fff"
                     class="w-12 h-12 rounded-full">
            </div>
        </header>

        <!-- CONTENT -->
        <main class="p-8">
            @yield('content')
        </main>

    </div>

</div>

<!-- ==================== JAVASCRIPT SIDEBAR ==================== -->
<script>
    let collapsed = false;

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const logoText = document.getElementById('logoText');
        const profileText = document.getElementById('profileText');
        const menuTexts = document.querySelectorAll('.menu-text');

        collapsed = !collapsed;

        if (collapsed) {
            sidebar.classList.remove('w-72');
            sidebar.classList.add('w-24');
            logoText.style.display = 'none';
            profileText.style.display = 'none';
            menuTexts.forEach(item => item.style.display = 'none');
        } else {
            sidebar.classList.remove('w-24');
            sidebar.classList.add('w-72');
            logoText.style.display = 'block';
            profileText.style.display = 'block';
            menuTexts.forEach(item => item.style.display = 'inline');
        }
    }
</script>

</body>
</html>