@extends('flanir.layout')

@section('content')

<style>
.chat-scroll::-webkit-scrollbar{
    width:5px;
}

.chat-scroll::-webkit-scrollbar-thumb{
    background:#d8b4fe;
    border-radius:10px;
}

.typing-dot{
    width:8px;
    height:8px;
    border-radius:50%;
    background:#9333ea;
    animation:bounce 1.2s infinite;
}

.typing-dot:nth-child(2){
    animation-delay:.2s;
}

.typing-dot:nth-child(3){
    animation-delay:.4s;
}

@keyframes bounce{
    0%,80%,100%{
        transform:scale(.7);
        opacity:.4;
    }
    40%{
        transform:scale(1);
        opacity:1;
    }
}
</style>

<div class="h-[85vh] flex flex-col bg-white rounded-3xl shadow-lg overflow-hidden">

    <!-- HEADER -->
    <div class="bg-white border-b p-4 flex items-center">

        <a href="{{ route('flanir.dashboard') }}"
           class="mr-4 text-xl text-slate-500">
            ←
        </a>

        <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center font-bold text-purple-700">
            DS
        </div>

        <div class="ml-3">
            <h3 class="font-bold">
                Dr. Agus Sopian
            </h3>

            <p class="text-xs text-green-500">
                ● Online
            </p>
        </div>

    </div>

    <!-- CHAT AREA -->
    <div id="messages"
         class="flex-1 p-5 overflow-y-auto bg-slate-50 space-y-4 chat-scroll">

        <!-- Pesan Awal -->
        <div class="flex items-start gap-2">

            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                👨‍⚕️
            </div>

            <div class="bg-white p-3 rounded-2xl rounded-tl-none shadow text-sm max-w-md">
                Halo Sarah 👋<br>
                Selamat datang di Klinik Flanir.<br>
                Ada yang bisa saya bantu hari ini?
            </div>

        </div>

    </div>

    <!-- INPUT -->
    <div class="bg-white border-t p-4">

        <div class="flex gap-3">

            <input
                id="messageInput"
                type="text"
                placeholder="Ketik pesan..."
                class="flex-1 border rounded-full px-5 py-3 outline-none focus:border-purple-500">

            <button
                id="sendBtn"
                class="bg-purple-600 hover:bg-purple-700 text-white rounded-full px-6">
                Kirim
            </button>

        </div>

    </div>

</div>

<script>

const messages = document.getElementById('messages');
const input = document.getElementById('messageInput');
const sendBtn = document.getElementById('sendBtn');

let step = 0;

sendBtn.addEventListener('click', sendMessage);

input.addEventListener('keypress', function(e){
    if(e.key === 'Enter'){
        sendMessage();
    }
});

function sendMessage(){

    let text = input.value.trim();

    if(text === '') return;

    appendUser(text);

    input.value='';

    showTyping();

    setTimeout(() => {

        removeTyping();

        let response = getBotResponse(text.toLowerCase());

        appendBot(response);

    }, 1800);
}

function getBotResponse(msg){

    if(step === 0){

        step = 1;

        return "Baik 😊 Bisa dijelaskan keluhan yang sedang dialami hewan peliharaan Anda?";
    }

    if(
        msg.includes('tidak makan') ||
        msg.includes('ga makan') ||
        msg.includes('nggak makan') ||
        msg.includes('nafsu makan')
    ){
        step = 2;

        return "Sudah berapa lama hewan Anda tidak mau makan?";
    }

    if(step === 2){

        step = 3;

        return "Apakah hewan Anda masih mau minum dan beraktivitas seperti biasa?";
    }

    if(step === 3){

        step = 4;

        return "Baik. Apakah ada gejala lain seperti muntah, diare, demam, atau batuk?";
    }

    if(step === 4){

        step = 5;

        return "Terima kasih atas informasinya. Berdasarkan gejala yang Anda sampaikan, kemungkinan terdapat gangguan pencernaan ringan atau kondisi tertentu yang perlu diperiksa lebih lanjut.";
    }

    if(step === 5){

        step = 6;

        return "Saya menyarankan untuk melakukan pemeriksaan langsung di Klinik Flanir agar dokter dapat melakukan diagnosa yang lebih akurat.";
    }

    const keywordResponses = {

        "halo":"Halo 👋 Ada yang bisa saya bantu hari ini?",
        "hai":"Halo 👋 Bagaimana kondisi hewan peliharaan Anda?",
        "vaksin":"Untuk vaksinasi, usia dan jenis hewan sangat berpengaruh. Hewan apa yang ingin divaksin?",
        "muntah":"Sejak kapan muntah terjadi? Apakah muntahnya sering atau hanya sesekali?",
        "diare":"Apakah diare terjadi lebih dari 1 hari?",
        "demam":"Apakah tubuh hewan terasa lebih hangat dari biasanya?",
        "batuk":"Apakah batuk disertai lendir atau kesulitan bernapas?",
        "grooming":"Kami menyediakan layanan grooming lengkap untuk kucing dan anjing."
    };

    for(let key in keywordResponses){

        if(msg.includes(key)){
            return keywordResponses[key];
        }
    }

    return "Baik, saya memahami informasi yang Anda berikan. Bisa dijelaskan lebih detail agar saya dapat membantu dengan lebih tepat?";
}

function appendUser(text){

    messages.innerHTML += `
        <div class="flex justify-end">
            <div class="bg-purple-600 text-white p-3 rounded-2xl rounded-tr-none max-w-md text-sm shadow">
                ${text}
            </div>
        </div>
    `;

    scrollBottom();
}

function appendBot(text){

    messages.innerHTML += `
        <div class="flex items-start gap-2">

            <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
                👨‍⚕️
            </div>

            <div class="bg-white p-3 rounded-2xl rounded-tl-none shadow text-sm max-w-md">
                ${text}
            </div>

        </div>
    `;

    scrollBottom();
}

function showTyping(){

    messages.innerHTML += `
    <div id="typing" class="flex items-start gap-2">

        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center">
            👨‍⚕️
        </div>

        <div class="bg-white px-4 py-3 rounded-2xl rounded-tl-none shadow">

            <div class="flex gap-1">

                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>

            </div>

        </div>

    </div>
    `;

    scrollBottom();
}

function removeTyping(){

    let typing = document.getElementById('typing');

    if(typing){
        typing.remove();
    }
}

function scrollBottom(){

    messages.scrollTop = messages.scrollHeight;
}
</script>

@endsection