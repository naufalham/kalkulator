<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        @vite(['resources/css/form_usaha.css','resources/js/app.js'])
        <title>
            AKUNaZMa
        </title>
        <script src="https://cdn.tailwindcss.com">
        </script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&amp;display=swap" rel="stylesheet"/>
    </head>
    <body class="bg-[#F5F8FF] min-h-screen flex flex-col">
        <!-- Navbar -->
        <x-navbar></x-navbar>

        <!-- Main content -->
        <main class="flex-grow max-w-7xl mx-auto px-6 py-8 w-full">
            <h1 class="font-extrabold text-black text-lg mb-6 select-none mx-auto max-w-5xl">
                Analisis Kelayakan Usaha Fesyen
            </h1>
            <form autocomplete="off" class="bg-white rounded-xl p-8 max-w-5xl w-full mx-auto space-y-10" novalidate="">

            <!-- Pendapatan -->
                <section>
                    <h2 class="font-extrabold text-black text-base mb-6 select-none">
                        Pendapatan
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6">
                        <div class="flex flex-col">
                            <label class="text-xs text-black mb-1 select-none" for="modal">
                                Modal (Rp)
                            </label>
                            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="modal" name="modal" type="text"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-xs text-black mb-1 select-none" for="jasa">
                                Jasa (Rp)
                            </label>
                            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="jasa" name="jasa" type="text"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-xs text-black mb-1 select-none" for="penjualan">
                                Penjualan (Rp)
                            </label>
                            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="penjualan" name="penjualan" type="text"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-xs text-black mb-1 select-none" for="lainnya-pendapatan">
                                Lainnya (Rp)
                            </label>
                            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="lainnya-pendapatan" name="lainnya-pendapatan" type="text"/>
                        </div>
                    </div>
                </section>

            <!-- Pengeluaran -->
                <section>
                    <h2 class="font-extrabold text-black text-base mb-6 select-none">
                        Pengeluaran
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-12 gap-y-6">
                        <div class="flex flex-col">
                            <label class="text-xs text-black mb-1 select-none" for="bahan">
                                Bahan (Rp)
                            </label>
                            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="bahan" name="bahan" type="text"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-xs text-black mb-1 select-none" for="gaji-karyawan">
                                Gaji Karyawan (Rp)
                            </label>
                            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="gaji-karyawan" name="gaji-karyawan" type="text"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-xs text-black mb-1 select-none" for="banyak-karyawan">
                                Banyak Karyawan
                            </label>
                            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="banyak-karyawan" name="banyak-karyawan" type="text"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-xs text-black mb-1 select-none" for="sewa-tempat">
                                Sewa Tempat (Rp)
                            </label>
                            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="sewa-tempat" name="sewa-tempat" type="text"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-xs text-black mb-1 select-none" for="listrik">
                                Listrik (Rp)
                            </label>
                            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="listrik" name="listrik" type="text"/>
                        </div>
                        <div class="flex flex-col">
                            <label class="text-xs text-black mb-1 select-none" for="lainnya-pengeluaran">
                                Lainnya (Rp)
                            </label>
                            <input class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-[#F97316]" id="lainnya-pengeluaran" name="lainnya-pengeluaran" type="text"/>
                        </div>
                    </div>
                </section>

                <div class="flex justify-end">
                    <button class="bg-[#F97316] text-white text-xs font-semibold rounded-lg px-6 py-2 hover:bg-[#e06f11] transition-colors" type="submit">
                        Unduh Hasil
                    </button>
                </div>
            </form>
        </main>

        <!-- Footer -->
        <x-footer></x-footer>
    </body>
</html>