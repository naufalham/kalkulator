<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  @vite(['resources/css/profil.css','resources/js/app.js'])
  <title>
   NaZMaLogy Account Page
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet"/>
 </head>
 <body class="bg-[#f5f8ff] min-h-screen flex flex-col">
  <!-- Header -->
  <x-navbar></x-navbar>

  <!-- Main content -->
  <main class="max-w-7xl mx-auto flex flex-col md:flex-row gap-6 px-4 sm:px-6 mb-20 flex-grow">
   <!-- Sidebar -->
    <aside class="bg-white rounded-xl w-full md:w-72 flex flex-col gap-3 p-4 select-none">
        <button class="bg-[#f97316] text-white rounded-lg py-2 text-center text-sm font-semibold" type="button">
            Akun
        </button>
        <button class="text-[#f97316] bg-[#f9faff] rounded-lg py-2 text-center text-sm font-semibold" type="button">
            Riwayat
        </button>
        <button class="text-[#f97316] bg-[#f9faff] rounded-lg py-2 text-center text-sm font-semibold" type="button">
            Tanya
        </button>
    </aside>
   <!-- Account form -->
    <section aria-label="Account profile form" class="bg-white rounded-xl p-6 sm:p-8 w-full max-w-4xl">
        <h2 class="font-bold text-xl mb-6 select-none">
            Akun
        </h2>
        <form class="flex flex-col gap-6">
            <div class="flex flex-col gap-1">
                <label class="font-semibold text-sm select-none" for="fullname">
                    Nama Lengkap
                </label>
                <input class="border border-black rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#f97316]" id="fullname" type="text" value="Pumpkin"/>
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold text-sm select-none" for="email">
                    Email
                </label>
                <input class="border border-black rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#f97316]" id="email" type="email" value="Pumpkin@gmail.com"/>
            </div>
            <div class="flex flex-col md:flex-row gap-6">
                <div class="flex-1 flex flex-col gap-1">
                    <label class="font-semibold text-sm select-none" for="job">
                        Jenis Pekerjaan
                    </label>
                    <input class="border border-black rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#f97316]" id="job" type="text" value="Pengusaha"/>
                </div>
                <div class="flex-1 flex flex-col gap-1">
                    <label class="font-semibold text-sm select-none" for="password">
                        Kata Sandi
                    </label>
                    <input class="border border-black rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#f97316]" id="password" type="password"/>
                </div>
            </div>
            <div class="flex justify-end">
                <button class="bg-[#f97316] text-white rounded-lg py-2 px-6 text-sm font-semibold hover:bg-[#e66a0d] transition-colors" type="submit">
                    Perbarui Profil
                </button>
            </div>
        </form>
    </section>
  </main>

  
  <!-- Footer -->
  <x-footer></x-footer>

 </body>
</html>