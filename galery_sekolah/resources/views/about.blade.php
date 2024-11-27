<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Inter', sans-serif;
            color: #333;
        }
        .header {
            background-color: #00476b; /* Darker navy */
        }
        .footer {
            background-color: #00476b;
            color: white;
        }
        .section-title {
            color: #003366;
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

    <!-- Main Content Section -->
    <section class="py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-semibold text-center section-title mb-12">Tentang Kami</h2>

            <!-- SMKN 4 Bogor Profile: Display Video -->
            @if($smkn4BogorProfile)
                <div class="flex flex-col md:flex-row items-center space-x-0 md:space-x-8 mb-12">
                    <div class="flex-shrink-0 w-full md:w-1/2">
                        <video width="100%" height="auto" controls autoplay muted class="rounded-xl shadow-xl">
                            <source src="https://smkn4bogor.sch.id/assets/videos/smkn4bogor.mp4" type="video/mp4">
                        </video>
                    </div>
                    <div class="w-full md:w-1/2 mt-6 md:mt-0">
                        <h3 class="text-2xl font-semibold">{{ $smkn4BogorProfile->judul }}</h3>
                        <p class="mt-4">{{ $smkn4BogorProfile->isi }}</p>
                    </div>
                </div>
            @endif

            <!-- Kepala Sekolah Profile: Display Photo -->
            @if($kepalaSekolahProfile)
                <div class="flex flex-col md:flex-row items-center space-x-0 md:space-x-8 mb-12">
                    <div class="flex-shrink-0 w-full md:w-1/2">
                        <img src="{{ asset('images/kepsek.jpg') }}" alt="Kepala Sekolah" class="rounded-xl shadow-xl mb-6">
                    </div>
                    <div class="w-full md:w-1/2 mt-6 md:mt-0">
                        <h3 class="text-2xl font-semibold">{{ $kepalaSekolahProfile->judul }}</h3>
                        <p class="text-gray-800 font-medium mt-4">Drs. Mulya Murprihartono, M.Si.</p>
                        <p class="text-gray-600 mb-4">Kepala Sekolah Ke-3, Juli 2020 - sekarang</p>
                        <p>{{ $kepalaSekolahProfile->isi }}</p>
                    </div>
                </div>
            @endif

            <!-- Department Logos Section -->
            <div class="text-center mb-16">
                <h3 class="text-3xl font-semibold section-title mb-8">Kompetensi Keahlian</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                    <!-- Department 1: TPFL -->
                    <div class="text-center transition duration-300 transform hover:scale-105 hover:shadow-lg">
                        <img src="{{ asset('images/pplg.png') }}" alt="Jurusan 1" class="w-40 h-40 object-contain mx-auto rounded-lg shadow-md">
                        <p class="mt-4">Pengembangan Perangkat Lunak dan Gim merupakan kompetensi keahlian yang berkisar pada pembuatan perangkat lunak (software) dan pembuatan gim.</p>
                    </div>
                    <!-- Department 2: TO -->
                    <div class="text-center transition duration-300 transform hover:scale-105 hover:shadow-lg">
                        <img src="{{ asset('images/tjkt.png') }}" alt="Jurusan 2" class="w-40 h-40 object-contain mx-auto rounded-lg shadow-md">
                        <p class="mt-4">Teknik Jaringan Komputer dan Telekomunikasi berfokus pada pembuatan jaringan untuk layanan komunikasi dan perakitan komputer.</p>
                    </div>
                    <!-- Department 3: PPLG -->
                    <div class="text-center transition duration-300 transform hover:scale-105 hover:shadow-lg">
                        <img src="{{ asset('images/tpfl.png') }}" alt="Jurusan 3" class="w-40 h-40 object-contain mx-auto rounded-lg shadow-md">
                        <p class="mt-4">Teknik Pengelasan dan Fabrikasi Logam berfokus pada pembuatan perangkat dengan bahan dasar logam, seperti rak sepatu, tralis, dan lemari besi.</p>
                    </div>
                    <!-- Department 4: TJKT -->
                    <div class="text-center transition duration-300 transform hover:scale-105 hover:shadow-lg">
                        <img src="{{ asset('images/to.png') }}" alt="Jurusan 4" class="w-40 h-40 object-contain mx-auto rounded-lg shadow-md">
                        <p class="mt-4">Teknik Otomotif berfokus pada perbaikan kendaraan roda empat dan telah berganti nama sesuai dengan kurikulum merdeka.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

</body>

</html>
