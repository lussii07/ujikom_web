<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .hero {
            background: url('https://source.unsplash.com/featured/?school') center/cover no-repeat;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .hero-overlay {
            background: rgba(0, 0, 0, 0.6);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .hero-text {
            position: relative;
            text-align: center;
            z-index: 10;
        }

        .image-card {
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .image-card:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);  /* Darker but more transparent */
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f0f8ff;
            font-size: 1.2rem;
            font-weight: 600;
            text-align: center;
            transition: opacity 0.3s ease;
        }

        .image-card:hover .image-overlay {
            opacity: 1;
        }

        .soft-background {
            background-color: #f0f8ff;
        }

        .header {
            background-color: #00476b;
        }

        .footer {
            background-color: #00476b;
            color: white;
        }
    </style>
</head>

<body class="soft-background">

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

    <div class="container mx-auto py-16 px-4">
        <!-- Gallery Grid -->
        @foreach($galerySekolah as $galleryTitle => $photos)
            <div class="mb-16">
                <!-- Gallery Section Title -->
                <div class="mb-8 text-center">
                    <h2 class="text-3xl font-semibold text-gray-800 mb-4">{{ $galleryTitle }}</h2>
                    <p class="text-gray-600">Galeri {{ $galleryTitle }}</p>
                </div>

                <!-- Responsive Image Grid -->
                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($photos as $foto)
                        <div class="image-card bg-white rounded-lg overflow-hidden shadow-md">
                            <img src="{{ asset('images/' . $foto->file) }}" alt="{{ $foto->judul }}" class="w-full h-64 object-cover">
                            <!-- Overlay for Title -->
                            <div class="image-overlay">{{ $foto->judul }}</div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

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
