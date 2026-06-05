@extends('flanir.layout')

@section('content')

<div class="max-w-4xl mx-auto mt-10">

    <div class="bg-white rounded-3xl shadow-lg p-8">

        <div class="flex items-center gap-6">

            <!-- Bagian Foto -->
            <div class="relative">
                <img 
                    src="{{ asset('Cuplikan layar 2026-06-05 211233.png') }}" 
                    alt="Profil {{ $user->name }}" 
                    class="w-28 h-28 rounded-full object-cover border-4 border-violet-100 shadow-md">
                
                <!-- Indikator Status Online (Opsional) -->
                <div class="absolute bottom-1 right-1 w-6 h-6 bg-green-500 border-4 border-white rounded-full"></div>
            </div>

            <!-- Bagian Informasi -->
            <div>
                <h2 class="text-3xl font-black text-slate-800">
                    {{ $user->name }}
                </h2>

                <p class="text-slate-500 font-medium text-lg">
                    {{ $user->email }}
                </p>
                    </span>
                    <span class="bg-green-100 text-green-700 px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">
                        Akun Aktif
                    </span>
                </div>
            </div>

        </div>

    </div>

</div>

@endsection