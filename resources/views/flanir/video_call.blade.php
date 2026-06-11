@extends('flanir.layout')

@section('content')

<div class="max-w-md mx-auto bg-slate-900 rounded-3xl overflow-hidden shadow-2xl p-4">
    
    <h2 class="text-white text-lg font-bold mb-4 px-2">Konsultasi</h2>

    <div class="flex flex-col gap-4">
        
        <div class="relative w-full h-64 bg-slate-800 rounded-2xl overflow-hidden border border-slate-700">
    <img
        src="{{ asset('Cuplikan layar 2026-06-11 101201.png') }}"
        alt="Dr. Agus Septian"
        class="w-full h-full object-cover object-top"
    >

    <div class="absolute top-3 left-3 bg-black/50 text-white px-2 py-1 rounded-lg text-xs">
        Dr. Agus Septian
    </div>
</div>

        <div class="relative w-full h-64 bg-slate-800 rounded-2xl overflow-hidden border border-slate-700">
            <div id="placeholder-pasien" class="absolute inset-0 flex items-center justify-center bg-slate-800 z-0">
                <img src="https://ui-avatars.com/api/?name=Sarah+Putri&background=8A56F2&color=fff&size=100" 
                     class="rounded-full shadow-lg">
            </div>

            <video id="video" autoplay playsinline muted class="absolute inset-0 w-full h-full object-cover z-10"></video>
            
            <div class="absolute bottom-20 left-4 text-white z-20">
                <p class="font-bold">Sarah Putri</p>
                <p class="text-xs opacity-80">Pasien</p>
            </div>

            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-4 bg-white/10 backdrop-blur-md px-6 py-3 rounded-full border border-white/10 z-20">
                <button onclick="toggleMic()" class="bg-white/20 hover:bg-white/30 p-3 rounded-full text-white transition">🎤</button>
                <a href="{{ route('flanir.konsultasi') }}" class="bg-red-500 hover:bg-red-600 p-4 rounded-full text-white transition">📞</a>
                <button onclick="startCamera()" class="bg-white/20 hover:bg-white/30 p-3 rounded-full text-white transition">📷</button>
            </div>
        </div>
    </div>
</div>

<script>
let stream = null;

async function startCamera() {
    const video = document.getElementById('video');
    const placeholder = document.getElementById('placeholder-pasien');
    
    try {
        // Meminta akses kamera dan mikrofon
        stream = await navigator.mediaDevices.getUserMedia({
            video: { width: { ideal: 1280 }, height: { ideal: 720 } },
            audio: true
        });

        // Menghubungkan stream ke elemen video
        video.srcObject = stream;
        
        // Memulai video setelah metadata siap
        video.onloadedmetadata = () => {
            video.play().catch(e => console.error("Autoplay diblokir:", e));
        };

        // Sembunyikan placeholder
        if(placeholder) placeholder.style.display = 'none';
        
        console.log("Kamera aktif dan stream terhubung");
    } catch(error) {
        console.error("Error Detail:", error);
        alert("Gagal membuka kamera. Pastikan izin kamera sudah di-Allow di browser. Error: " + error.message);
    }
}

function toggleMic() {
    if(!stream){
        alert('Nyalakan kamera terlebih dahulu!');
        return;
    }
    stream.getAudioTracks().forEach(track => {
        track.enabled = !track.enabled;
        alert('Mic status: ' + (track.enabled ? 'Aktif' : 'Mati'));
    });
}
</script>

@endsection