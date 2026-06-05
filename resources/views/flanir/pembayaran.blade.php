@extends('flanir.layout')

@section('content')
<div class="max-w-md mx-auto p-4 bg-slate-50 min-h-screen">
    <a href="{{ route('flanir.layanan') }}" class="text-slate-600 mb-4 inline-block">&larr; Kembali</a>

    <h2 class="text-xl font-bold mb-6 text-slate-800">Pembayaran</h2>

    @if(isset($layanan))
    <div class="bg-white p-5 rounded-3xl shadow-sm border border-slate-100 mb-6">
        <h4 class="font-bold text-slate-700 mb-4">Ringkasan Pesanan</h4>
        <div class="flex items-center gap-4 mb-4">
            <img src="Cuplikan layar 2026-06-06 021127.png" 
                 class="w-16 h-16 rounded-2xl object-cover">
            <div>
                <p class="font-bold text-slate-800">{{ $layanan->nama_produk }}</p>
                <p class="text-xs text-slate-400">Klinik Hewan Modern</p>
            </div>
            <p class="ml-auto font-bold text-slate-800">Rp {{ number_format($layanan->harga) }}</p>
        </div>
        
        <div class="border-t pt-4 space-y-2 text-sm">
            <div class="flex justify-between text-slate-500">
                <span>Subtotal</span>
                <span>Rp {{ number_format($layanan->harga) }}</span>
            </div>
            <div class="flex justify-between text-slate-500">
                <span>Biaya Admin</span>
                <span>Rp 5.000</span>
            </div>
            <div class="flex justify-between font-bold text-lg mt-3 pt-3 border-t">
                <span>Total Pembayaran</span>
                <span class="text-purple-600">Rp {{ number_format($layanan->harga + 5000) }}</span>
            </div>
        </div>
    </div>

    <h4 class="font-bold text-slate-700 mb-4">Metode Pembayaran</h4>
    <form action="{{ route('flanir.proses_bayar', $layanan->id) }}" method="POST">
        @csrf
        <div class="space-y-3 mb-8">
            <label class="flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-200 cursor-pointer hover:border-purple-500">
                <span class="font-bold">GO PAY</span>
                <input type="radio" name="payment" value="GOPAY" required class="w-5 h-5 accent-purple-600">
            </label>
            <label class="flex items-center justify-between p-4 bg-white rounded-2xl border border-slate-200 cursor-pointer hover:border-purple-500">
                <span class="font-bold">DANA</span>
                <input type="radio" name="payment" value="DANA" required class="w-5 h-5 accent-purple-600">
            </label>
        </div>
        
        <button type="submit" class="w-full bg-purple-600 text-white py-4 rounded-2xl font-bold hover:bg-purple-700 transition">
            Konfirmasi Pembayaran
        </button>
    </form>
    @else
    <div class="bg-red-50 text-red-600 p-4 rounded-2xl">Data tidak ditemukan.</div>
    @endif
</div>
@endsection