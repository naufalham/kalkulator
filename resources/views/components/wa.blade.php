@props([
    'phone' => '62895378198538', 
    'message' => 'Halo, saya ingin bertanya.'
])

@php
    $url = 'https://api.whatsapp.com/send?phone=' . $phone . '&text=' . urlencode($message);
@endphp

<style>
    @keyframes wa-pulse {
        0%, 100% { transform: scale(1);}
        50% { transform: scale(1.15);}
    }
    .wa-animate-pulse {
        animation: wa-pulse 1s infinite;
    }
</style>

<a href="{{ $url }}"
   target="_blank"
   class="fixed bottom-6 right-6 bg-green-500 text-white rounded-full p-3 shadow-lg hover:bg-green-700 transition-all duration-300 z-50 wa-animate-pulse flex items-center justify-center w-12 h-12"
   aria-label="Chat via WhatsApp"
>
    <!-- Animasi Ping (latar belakang) -->
    <span class="absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-60 animate-ping"></span>
    <!-- Ikon (lapisan depan) -->
    <i class="fab fa-whatsapp text-2xl z-10"></i>
</a>
