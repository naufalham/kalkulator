<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>AKUNaZMa</title>
        <script src="https://cdn.tailwindcss.com">
        </script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Poppins&amp;display=swap" rel="stylesheet"/>
    </head>
    <body class="bg-[#f3f7ff] min-h-screen flex flex-col justify-between">

        <!-- Navbar -->
        <header id="sticky-header" class="fixed top-6 left-1/2 transform -translate-x-1/2 bg-white rounded-xl shadow px-4 sm:px-6 py-3 w-[90%] max-w-5xl z-50 flex flex-col sm:flex-row justify-between items-center">
            <div class="flex items-center space-x-2 mb-3 sm:mb-0 w-full sm:w-auto justify-center sm:justify-start">
                <img class="w-6 h-6" src="https://storage.googleapis.com/a1aa/image/1c9ecd82-53dc-4a00-367d-29e7a201a14f.jpg" alt="Logo">
                <span class="font-semibold text-lg text-black select-none">AKUNaZMa</span>
            </div>

            <x-nav></x-nav>
            
        </header>

        <!-- Script untuk sticky scroll (opsional jika mau sticky on scroll) -->
        <script>
            const header = document.getElementById('sticky-header');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {  // Bisa disesuaikan dengan jarak scroll
                    header.classList.add('top-0', 'shadow-lg');
                    header.classList.remove('top-6'); // Menyembunyikan jarak awal
                } else {
                    header.classList.add('top-6');
                    header.classList.remove('top-0', 'shadow-lg');
                }
            });
        </script>
    </body>
</html>