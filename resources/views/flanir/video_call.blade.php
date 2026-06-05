@extends('flanir.layout')

@section('content')

<div class="max-w-md mx-auto bg-slate-900 rounded-3xl overflow-hidden shadow-2xl p-4">
    
    <h2 class="text-white text-lg font-bold mb-4 px-2">Konsultasi</h2>

    <div class="flex flex-col gap-4">
        
        <div class="relative w-full h-64 bg-slate-800 rounded-2xl overflow-hidden border border-slate-700">
            <img src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=500&auto=format" 
                 class="w-full h-full object-cover" alt="Dr. Agus Septian">
            <div class="absolute top-3 left-3 bg-black/50 text-white px-2 py-1 rounded-lg text-xs">Dr. Agus Septian</div>
        </div>

        <div class="relative w-full h-64 bg-slate-800 rounded-2xl overflow-hidden border border-slate-700">
            <div id="placeholder-pasien" class="absolute inset-0 flex items-center justify-center bg-slate-800">
                <img src="https://ui-avatars.com/api/?name=Sarah+Putri&background=8A56F2&color=fff&size=100" 
                     class="rounded-full shadow-lg">
            </div>

            <video id="video" autoplay playsinline muted class="w-full h-full object-cover"></video>
            
            <div class="absolute bottom-20 left-4 text-white">
                <p class="font-bold">Sarah Putri</p>
                <p class="text-xs opacity-80">Pasien</p>
            </div>

            <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-4 bg-white/10 backdrop-blur-md px-6 py-3 rounded-full border border-white/10">
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
    try {
        stream = await navigator.mediaDevices.getUserMedia({
            video: true,
            audio: true
        });

        const video = document.getElementById('video');
        const placeholder = document.getElementById('placeholder-pasien');
        
        // Sembunyikan placeholder setelah kamera aktif
        placeholder.style.display = 'none';
        
        video.srcObject = stream;
        await video.play();
        console.log("Kamera aktif");
    } catch(error) {
        console.error(error);
        alert("Gagal membuka kamera: " + error.message);
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