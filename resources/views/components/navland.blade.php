<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   AKUNaZMa
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap" rel="stylesheet"/>

 </head>

 <x-navbar></x-navbar>

 <section aria-label="Hero section with full-page background image" class="relative min-h-screen -mt-[80px] pt-[80px] w-full bg-cover bg-center" style="background-image: url('{{ asset('asset/landing.jpg') }}');">
    <div class="absolute  bg-black bg-opacity-60 inset-0 flex flex-col justify-center items-center text-center px-6 sm:px-12">
        <h1 class="text-white font-bold text-2xl sm:text-4xl leading-tight">
            Kalkulator Pintar
            <br/>
            Membantu Menganalisis Kelayakan Usaha Anda
        </h1>
        <button class="mt-6 bg-[#2e348a] text-white font-semibold rounded-lg px-5 py-3 text-sm sm:text-base hover:bg-[#252a6f] transition" type="button">
            Daftar
        </button>
    </div>
    <div class="absolute top-0 left-0 w-full flex flex-col justify-center items-center text-center px-6 sm:px-12">
        <x-navbar></x-navbar>
    </div>
</section>
 