@extends('flanir.layout')

@section('content')
<div class="min-h-screen bg-slate-50 py-10">
    <div class="max-w-5xl mx-auto px-4">
        
        <a href="{{ route('flanir.layanan') }}" class="text-slate-600 hover:text-purple-600 mb-6 inline-block font-medium">&larr; Kembali ke Layanan</a>

        <h2 class="text-3xl font-extrabold text-slate-800 mb-8">Pembayaran</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100 h-fit">
                <h4 class="font-bold text-xl text-slate-700 mb-6">Ringkasan Pesanan</h4>
                
                @php
                    // Logika harga otomatis berdasarkan nama produk
                    $namaProduk = $layanan->nama_produk ?? 'Vaksin Anjing Dasar';
                    
                    // Menentukan harga berdasarkan nama
                    if ($namaProduk == 'Basic Grooming') {
                        $hargaDasar = 300000;
                    } else {
                        $hargaDasar = 250000; // Default untuk Vaksin Anjing Dasar
                    }
                    
                    $biayaAdmin = 5000;
                    $total = $hargaDasar + $biayaAdmin;
                @endphp

                <div class="flex items-center gap-4 mb-6">
                    <img src="https://images.unsplash.com/photo-1592194996308-7b43878e84a6?w=200" 
                         class="w-20 h-20 rounded-2xl object-cover shadow-sm">
                    <div>
                        <p class="font-bold text-lg text-slate-800">{{ $namaProduk }}</p>
                        <p class="text-sm text-slate-400">Klinik Hewan Modern</p>
                    </div>
                    <p class="ml-auto font-bold text-lg text-slate-800">Rp {{ number_format($hargaDasar) }}</p>
                </div>
                
                <div class="border-t border-slate-100 pt-6 space-y-4 text-base">
                    <div class="flex justify-between text-slate-500">
                        <span>Subtotal</span>
                        <span class="font-medium text-slate-700">Rp {{ number_format($hargaDasar) }}</span>
                    </div>
                    <div class="flex justify-between text-slate-500">
                        <span>Biaya Admin</span>
                        <span class="font-medium text-slate-700">Rp {{ number_format($biayaAdmin) }}</span>
                    </div>
                    <div class="flex justify-between font-bold text-xl mt-4 pt-4 border-t border-slate-200">
                        <span class="text-slate-800">Total Pembayaran</span>
                        <span class="text-purple-600">Rp {{ number_format($total) }}</span>
                    </div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl shadow-sm border border-slate-100">
                <h4 class="font-bold text-xl text-slate-700 mb-6">Metode Pembayaran</h4>
                <form action="{{ route('flanir.proses_bayar', $layanan->id ?? 0) }}" method="POST">
                    @csrf
                    <div class="space-y-4 mb-8">
                        
                        <label class="flex items-center p-5 bg-white rounded-2xl border-2 border-slate-200 cursor-pointer hover:border-purple-500 transition-all">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/8/86/Gopay_logo.svg" class="h-6 mr-4">
                            <span class="font-bold text-lg text-slate-700">GO PAY</span>
                            <input type="radio" name="payment" value="GOPAY" required class="w-6 h-6 accent-purple-600 ml-auto">
                        </label>

                        <label class="flex items-center p-5 bg-white rounded-2xl border-2 border-slate-200 cursor-pointer hover:border-purple-500 transition-all">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/7/72/Logo_dana_blue.svg" class="h-6 mr-4">
                            <span class="font-bold text-lg text-slate-700">DANA</span>
                            <input type="radio" name="payment" value="DANA" required class="w-6 h-6 accent-purple-600 ml-auto">
                        </label>

                        <label class="flex items-center p-5 bg-white rounded-2xl border-2 border-slate-200 cursor-pointer hover:border-purple-500 transition-all">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/e/eb/Logo_ovo_purple.svg" class="h-6 mr-4">
                            <span class="font-bold text-lg text-slate-700">OVO</span>
                            <input type="radio" name="payment" value="OVO" required class="w-6 h-6 accent-purple-600 ml-auto">
                        </label>
                    </div>
                    
                    <button type="submit" class="w-full bg-purple-600 text-white py-4 rounded-2xl font-bold text-lg hover:bg-purple-700 transition-all">
                        Konfirmasi Pembayaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection