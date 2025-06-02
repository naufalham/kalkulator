@props([
    'phone' => '62895378198538', 
    'message' => 'Halo, saya ingin bertanya.'
])

@php
    $url = 'https://api.whatsapp.com/send?phone=' . $phone . '&text=' . urlencode($message);
@endphp

<a href="{{ $url }}"
   target="_blank"
   class="fixed bottom-6 right-6 bg-green-500 text-white rounded-full p-3 shadow-lg hover:bg-green-700 transition-all duration-300 z-50"
   aria-label="Chat via WhatsApp"
>
    <i class="fab fa-whatsapp text-2xl"></i>
</a>
