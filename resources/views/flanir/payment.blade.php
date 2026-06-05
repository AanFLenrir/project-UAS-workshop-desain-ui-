@extends('flanir.layout')

@section('content')
<div class="p-6">
    <h2 class="text-xl font-bold mb-6">Pembayaran</h2>
    
    <div class="bg-slate-50 p-4 rounded-xl mb-6">
        <p class="text-xs text-slate-500 uppercase">Tagihan</p>
        <p class="font-bold text-lg">{{ $produk->nama_produk }}</p>
        <p class="text-purple-600 font-bold">Rp {{ number_format($produk->harga) }}</p>
    </div>

    <form action="{{ route('flanir.proses_bayar') }}" method="POST">
        @csrf
        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
        
        <label class="block mb-4 border p-4 rounded-xl cursor-pointer hover:border-purple-500">
            <input type="radio" name="metode" value="dana" checked> DANA Wallet
        </label>
        
        <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-xl font-bold">
            Bayar Sekarang
        </button>
    </form>
</div>
@endsection