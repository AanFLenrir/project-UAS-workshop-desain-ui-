@extends('flanir.layout')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl font-bold">Klinik Flannir</h1>
        <img src="https://ui-avatars.com/api/?name=Sarah+Putri" class="w-10 h-10 rounded-full">
    </div>

    <div class="bg-purple-600 text-white p-5 rounded-2xl mb-6">
        <p class="text-sm opacity-80">Hewan Peliharaan</p>
        <h2 class="text-2xl font-bold">Luna - Kucing</h2>
    </div>

    <h3 class="font-bold mb-4">Layanan Medis</h3>
    <div class="space-y-3">
        @foreach($produks as $p)
        <div class="border p-4 rounded-xl flex justify-between items-center">
            <div>
                <p class="font-bold text-sm">{{ $p->nama_produk }}</p>
                <p class="text-xs text-purple-600 font-bold">Rp {{ number_format($p->harga) }}</p>
            </div>
            <a href="{{ route('flanir.bayar', $p->id) }}" class="bg-purple-600 text-white text-xs px-4 py-2 rounded-lg font-bold">
                Pilih
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection