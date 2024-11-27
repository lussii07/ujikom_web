<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'School Gallery')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.2.2/cdn.min.js" defer></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* Customizing the overall color theme */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f4f8; /* Light background */
            color: #333; /* Standard text color */
        }
        .header {
            background-color: #00476b; /* Darker navy */
        }
        .footer {
            background-color: #00476b;
            color: white;
        }
        .hero-section {
            background: url('https://smkn4bogor.sch.id/assets/images/background/smkn4bogor_2.jpg') center/cover no-repeat;
            height: 450px;
        }
        .hero-overlay {
            background: rgba(0, 0, 0, 0.3); /* Lighten the overlay */
        }
        .hero-text {
            color: #ffffff;
            font-weight: 600;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        }
        .btn-primary {
            background-color: #0066cc;
            color: white;
            border-radius: 4px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #004080;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <header class="header text-white py-4 shadow-lg">
        <div class="container mx-auto flex items-center justify-between px-6">
            <div class="flex items-center space-x-4">
                <img src="{{ asset('images/logo_smk.png') }}" alt="School Logo" class="w-12 h-12 object-cover">
                <div>
                    <h1 class="text-2xl font-bold">SMK Indonesia Digital</h1>
                    <p class="text-sm">Maju Seiring Perkembangan Digital</p>
                </div>
            </div>
            <nav>
                <ul class="flex space-x-6 font-medium">
                    <li>
                        <a href="{{ url('/') }}" 
                           class="transition duration-300 hover:text-yellow-400 {{ request()->is('/') ? 'text-yellow-400 font-bold' : '' }}">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/tentang-kami') }}" 
                           class="transition duration-300 hover:text-yellow-400 {{ request()->is('tentang-kami') ? 'text-yellow-400 font-bold' : '' }}">
                            Tentang Kami
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/galeri-sekolah') }}" 
                           class="transition duration-300 hover:text-yellow-400 {{ request()->is('galeri-sekolah') ? 'text-yellow-400 font-bold' : '' }}">
                            Galeri
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    

    <!-- Hero Section -->
    <section class="hero-section relative">
        <div class="hero-overlay absolute inset-0"></div>
        <div class="relative z-10 container mx-auto text-center py-32">
            <h1 class="text-4xl font-extrabold leading-tight tracking-wide hero-text" data-aos="fade-up" data-aos-duration="1000">Selamat Datang di Galeri SMKN 4 Bogor</h1>
            <p class="mt-4 text-2xl font-semibold text-gray-200 hero-text" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">SMK Pusat Keunggulan</p>
        </div>
    </section>

    <!-- Main Content -->
    <main class="container mx-auto mt-8">
        @yield('content')
    </main>

    <!-- Footer Section -->
    <footer class="footer py-6">
        <div class="container mx-auto text-center">
            <p class="text-sm font-medium">© 2024 SMK Indonesia Digital. All rights reserved.</p>
            <div class="mt-4 flex justify-center space-x-4">
                <a href="https://www.instagram.com/smkn4kotabogor/" target="_blank" class="hover:text-yellow-400 transition duration-300">
                    <i class="fab fa-instagram w-6 h-6"></i>
                </a>
                <a href="https://www.linkedin.com" target="_blank" class="hover:text-yellow-400 transition duration-300">
                    <i class="fab fa-linkedin w-6 h-6"></i>
                </a>
                <a href="https://www.youtube.com/channel/UC4M-6Oc1ZvECz00MlMa4v_A" target="_blank" class="hover:text-yellow-400 transition duration-300">
                    <i class="fab fa-youtube w-6 h-6"></i>
                </a>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var swiper = new Swiper('.swiper-container', {
                slidesPerView: 1,
                spaceBetween: 10,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
            });

            AOS.init({
                duration: 1000,
                once: true,
            });
        });
    </script>

</body>
</html>
