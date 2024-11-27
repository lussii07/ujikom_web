<!-- resources/views/layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="bg-gray-900 text-gray-200">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-800 text-gray-200 shadow-lg">
        <div class="p-6 flex items-center justify-between">
            <img src="{{ asset('images/logo_smk.png') }}" alt="Logo" class="w-8 h-8">
            <h1 class="text-xl font-semibold text-gray-100 ml-2">Admin Dashboard</h1>
        </div>
        <nav class="mt-6" x-data="{ activeLink: window.location.pathname }">
            <ul class="space-y-2">
                <!-- Dashboard Link -->
                <li :class="{'bg-gray-700 border-l-4 border-blue-400 font-semibold': activeLink === '/admin/dashboard'}" class="p-4 hover:bg-gray-600 transition-all duration-200 rounded-md">
                    <a @click="activeLink = '/admin/dashboard'" href="{{ url('/admin/dashboard') }}" class="flex items-center space-x-2">
                        <i class="fas fa-tachometer-alt text-blue-400"></i>
                        <span class="text-sm">Dashboard</span>
                    </a>
                </li>
                <!-- Manajemen Admin Link -->
                <li :class="{'bg-gray-700 border-l-4 border-blue-300 font-semibold': activeLink === '/admin/petugas'}" class="p-4 hover:bg-gray-600 transition-all duration-200 rounded-md">
                    <a @click="activeLink = '/admin/petugas'" href="{{ url('/admin/petugas') }}" class="flex items-center space-x-2">
                        <i class="fas fa-user-shield text-blue-300"></i>
                        <span class="text-sm">Manajemen Admin</span>
                    </a>
                </li>
                <!-- Kategori Galery Link -->
                <li :class="{'bg-gray-700 border-l-4 border-gray-500 font-semibold': activeLink === '/admin/kategori'}" class="p-4 hover:bg-gray-600 transition-all duration-200 rounded-md">
                    <a @click="activeLink = '/admin/kategori'" href="{{ url('/admin/kategori') }}" class="flex items-center space-x-2">
                        <i class="fas fa-list-alt text-gray-500"></i>
                        <span class="text-sm">Kategori Galery</span>
                    </a>
                </li>
                <!-- Posts Link -->
                <li :class="{'bg-gray-700 border-l-4 border-green-400 font-semibold': activeLink === '/admin/posts'}" class="p-4 hover:bg-gray-600 transition-all duration-200 rounded-md">
                    <a @click="activeLink = '/admin/posts'" href="{{ url('/admin/posts') }}" class="flex items-center space-x-2">
                        <i class="fas fa-pencil-alt text-green-400"></i>
                        <span class="text-sm">Posts</span>
                    </a>
                </li>
                <!-- Data Galery Link -->
                <li :class="{'bg-gray-700 border-l-4 border-orange-400 font-semibold': activeLink === '/admin/galery'}" class="p-4 hover:bg-gray-600 transition-all duration-200 rounded-md">
                    <a @click="activeLink = '/admin/galery'" href="{{ url('/admin/galery') }}" class="flex items-center space-x-2">
                        <i class="fas fa-images text-orange-400"></i>
                        <span class="text-sm">Data Galery</span>
                    </a>
                </li>
                <!-- Data Foto Link -->
                <li :class="{'bg-gray-700 border-l-4 border-yellow-400 font-semibold': activeLink === '/admin/foto'}" class="p-4 hover:bg-gray-600 transition-all duration-200 rounded-md">
                    <a @click="activeLink = '/admin/foto'" href="{{ url('/admin/foto') }}" class="flex items-center space-x-2">
                        <i class="fas fa-camera text-yellow-400"></i>
                        <span class="text-sm">Data Foto</span>
                    </a>
                </li>
                <!-- Manajemen Halaman Link -->
                <li :class="{'bg-gray-700 border-l-4 border-red-400 font-semibold': activeLink === '/admin/page-management'}" class="p-4 hover:bg-gray-600 transition-all duration-200 rounded-md">
                    <a @click="activeLink = '/admin/page-management'" href="{{ url('/admin/profile') }}" class="flex items-center space-x-2">
                        <i class="fas fa-file-alt text-red-400"></i>
                        <span class="text-sm">Manajemen Halaman</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

<!-- Main Content -->
<div class="flex-1 flex flex-col">
    <header class="bg-gray-800 text-gray-200 shadow-md p-4 flex justify-between items-center border-b-2 border-gray-600">
        <!-- Search Bar -->
        <div class="relative flex items-center w-full max-w-sm">
            <input type="text" placeholder="Search..." class="w-full border rounded-lg p-2 pl-10 bg-gray-700 text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-all duration-300" />
            <i class="fas fa-search absolute left-3 text-gray-500"></i>
        </div>
        
        <!-- Profile Dropdown -->
        <div x-data="{ open: false }" class="relative ml-6">
            <button @click="open = !open" class="flex items-center text-gray-200 hover:text-gray-500 focus:outline-none">
                <span class="mr-2">{{ Auth::user()->username ?? 'Admin' }}</span>
                <i class="fas fa-user-circle text-xl"></i>
            </button>
            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-gray-800 border border-gray-700 rounded-md shadow-lg">
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-gray-300 hover:bg-gray-600 transition">Logout</button>
                </form>
            </div>
        </div>
    </header>
        
    <!-- Main Content Area -->
    <main class="flex-1 p-8 bg-gray-900 overflow-y-auto rounded-lg shadow-md">
        @yield('content')
    </main>
</div>

</div>

</body>
</html>
