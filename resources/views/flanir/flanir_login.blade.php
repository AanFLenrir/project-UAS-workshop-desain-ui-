<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLANNIR - Login Sistem</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;700;800&display=swap');

        body{
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#8A56F2] min-h-screen flex items-center justify-center p-4">

    <div class="bg-white w-full max-w-[400px] p-10 rounded-[40px] shadow-2xl">

        <!-- LOGO -->
        <div class="flex flex-col items-center mb-8">

            <img
                src="{{ asset('Cuplikan layar 2026-05-25 141432.png') }}"
                alt="Logo Klinik Flannir"
                class="w-32 h-32 object-contain mb-4"
            >

            <h1 class="text-xl font-black text-[#0a4a58] tracking-tighter text-center leading-tight">
                KLINIK <br> FLANNIR
            </h1>

        </div>

        <!-- ERROR -->
        @if(session('error'))
            <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-xl mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- DEMO BOX -->
        <div class="bg-blue-50 border border-blue-200 text-blue-700 p-4 rounded-2xl mb-6">

            <p class="text-sm">Email: <b>sarah@flanir.com</b></p>
            <p class="text-sm">Password: <b>password123</b></p>

            <button type="button"
                onclick="fillDemo()"
                class="mt-3 bg-blue-600 text-white px-3 py-1 rounded-lg text-xs hover:bg-blue-700">
                Isi Otomatis
            </button>

        </div>

        <!-- FORM -->
        <form action="{{ route('flanir.login.process') }}" method="POST" class="space-y-5">

            @csrf

            <div>
                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    required
                    placeholder="Masukkan email..."
                    class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl focus:border-[#8A56F2] outline-none"
                >
            </div>

            <div>
                <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    required
                    placeholder="••••••••"
                    class="w-full bg-slate-50 border border-slate-100 p-4 rounded-2xl focus:border-[#8A56F2] outline-none"
                >
            </div>

            <button
                type="submit"
                class="w-full bg-[#8A56F2] text-white py-4 rounded-2xl font-bold hover:bg-[#733dd9] transition-all shadow-xl shadow-purple-500/20 mt-2"
            >
                Masuk
            </button>

        </form>

        <!-- BACK -->
        <div class="mt-6 text-center">
            <a href="{{ route('flanir.landing') }}"
               class="text-sm text-[#8A56F2] font-semibold hover:underline">
                ← Kembali ke Landing Page
            </a>
        </div>

    </div>

    <!-- SCRIPT AUTO FILL -->
    <script>
        function fillDemo() {
            document.querySelector('input[name="email"]').value = "sarah@flanir.com";
            document.querySelector('input[name="password"]').value = "password123";
        }
    </script>

</body>
</html>