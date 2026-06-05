@extends('flanir.layout')

@section('content')

<h2 class="text-3xl font-black mb-8">
    Konsultasi Dokter
</h2>

<div class="space-y-6">

    <!-- Dokter 1 -->
    <div class="bg-white rounded-3xl p-6 shadow-sm flex items-center justify-between">

        <div class="flex items-center gap-5">

            <img
                src="https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=400"
                class="w-24 h-24 rounded-2xl object-cover"
            >

            <div>

                <h3 class="font-black text-xl">
                    Dr. Agus Sopian
                </h3>

                <p class="text-slate-500">
                    Spesialis Kucing & Anjing
                </p>

                <p class="text-green-500 font-bold mt-2">
                    ● Online
                </p>

            </div>

        </div>

        <a
            href="{{ route('flanir.video_call',1) }}"
            class="bg-blue-500 hover:bg-blue-600 text-white px-8 py-3 rounded-xl font-bold transition"
        >
            Konsultasi
        </a>

    </div>

    </div>

</div>

@endsection