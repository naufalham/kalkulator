<aside class="bg-white rounded-xl w-full md:w-72 flex flex-col gap-3 p-4 select-none">
    <a href="{{ route('user.edit') }}"
       class="{{ request()->is('profil') || request()->is('user/profil') ? 'bg-[#f97316] text-white' : 'bg-[#f9faff] text-[#f97316]' }} rounded-lg py-2 text-center text-sm font-semibold block">
        Akun
    </a>
    <a href="{{ route('user.riwayat') }}"
       class="{{ Request::is('riwayat') ? 'bg-[#f97316] text-white' : 'bg-[#f9faff] text-[#f97316]' }} rounded-lg py-2 text-center text-sm font-semibold block">
        Riwayat
    </a>
    <a href="/tanya"
       class="{{ Request::is('tanya') ? 'bg-[#f97316] text-white' : 'bg-[#f9faff] text-[#f97316]' }} rounded-lg py-2 text-center text-sm font-semibold block">
        FAQ
    </a>
</aside>