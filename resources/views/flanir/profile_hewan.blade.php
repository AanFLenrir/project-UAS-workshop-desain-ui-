@extends('flanir.layout')

@section('content')
<div class="p-6 bg-slate-50 min-h-screen">
    <!-- Header Kembali -->
    <a href="{{ route('flanir.index') }}" class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-4 block">← Kembali ke Dashboard</a>

    <!-- Profil Hewan (Layar 16-5) -->
    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 mb-6 text-center">
        <div class="w-24 h-24 bg-slate-200 rounded-full mx-auto mb-4 flex items-center justify-center text-4xl">🐱</div>
        <h2 class="text-xl font-bold text-slate-900">Luna</h2>
        <p class="text-xs text-slate-500 font-medium">Kucing • British Shorthair • 2 Tahun</p>
    </div>

    <!-- Informasi Medis (Layar 16-6) -->
    <div class="space-y-4">
        <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
            <p class="text-[10px] font-bold text-slate-400 uppercase mb-2">Riwayat Vaksinasi</p>
            <div class="flex justify-between items-center text-xs">
                <span class="font-bold text-slate-800">Vaksin F3</span>
                <span class="text-slate-500">12 Mei 2026</span>
            </div>
        </div>

        <div class="bg-white p-4 rounded-2xl shadow-sm border border-slate-100">
            <p class="text-[10px] font-bold text-slate-400 uppercase mb-2">Riwayat Pemeriksaan</p>
            @foreach($reseps as $resep)
            <div class="flex justify-between items-center py-2 border-b last:border-0 text-xs">
                <span class="font-bold text-slate-800">{{ $resep->diagnosis }}</span>
                <span class="text-slate-500">{{ \Carbon\Carbon::parse($resep->created_at)->format('d/m/y') }}</span>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="mt-8">
        <button class="w-full bg-purple-600 text-white py-4 rounded-2xl font-bold text-xs shadow-lg shadow-purple-200">
            Unduh Riwayat (PDF)
        </button>
    </div>
</div>
@endsection