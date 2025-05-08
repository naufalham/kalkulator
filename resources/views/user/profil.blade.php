@vite(['resources/css/profil.css','resources/js/app.js'])
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
        <form class="flex flex-col gap-6" method="POST" action="{{ route('user.update') }}">
            
            @csrf

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded-md mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            
            <div class="flex flex-col gap-1">
                <label class="font-semibold text-sm select-none" for="fullname">
                    Nama Lengkap
                </label>
                <input class="border border-black rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#f97316]" placeholder="{{ old('nama', Auth::user()->nama) }}" id="nama" type="text" name="nama" value="{{ old('nama') }}" required />
            </div>
            <div class="flex flex-col gap-1">
                <label class="font-semibold text-sm select-none" for="email">
                    Email
                </label>
                <input class="border border-black rounded-lg py-2 px-3 text-sm focus:outline-none focus:ring-2 focus:ring-[#f97316]" placeholder="{{ old('email', Auth::user()->email) }}" id="email" type="email" name="nama" value="{{ old('email') }}" required />
            </div>
            <div class="flex flex-col md:flex-row gap-6">
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