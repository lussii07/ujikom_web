<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- Vite asset linking -->
</head>
<body class="bg-gray-900 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md bg-gray-800 rounded-lg shadow-lg p-8">
        <h2 class="text-2xl font-bold text-white text-center mb-6">Login</h2>

        {{-- Pesan flash untuk error atau sukses --}}
        @if (session('success'))
            <div class="bg-green-500 text-white p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- Form login --}}
        <form method="POST" action="{{ route('login.form') }}">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-300">Username</label>
                <input type="text" id="username" name="username" required
                       class="mt-1 block w-full p-2 bg-gray-700 text-white rounded border border-gray-600 
                              focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                       placeholder="Enter your username" value="{{ old('username') }}">
                @error('username')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-6 relative">
                <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                <input type="password" id="password" name="password" required
                       class="mt-1 block w-full p-2 bg-gray-700 text-white rounded border border-gray-600 
                              focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50"
                       placeholder="Enter your password">

                {{-- Toggle password visibility --}}
                <button type="button" onclick="togglePassword()" 
                        class="absolute inset-y-0 right-2 flex items-center px-2 text-gray-400">
                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3-9C7.373 3 3 8.268 3 12s4.373 9 9 9 9-4.268 9-9-4.373-9-9-9z"/>
                    </svg>
                </button>

                @error('password')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 rounded 
                           transition duration-200 ease-in-out">
                Login
            </button>
        </form>
    </div>

    {{-- Script untuk toggle visibility password --}}
    <script>
        function togglePassword() {
            const passwordField = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3-9C7.373 3 3 8.268 3 12s4.373 9 9 9 9-4.268 9-9-4.373-9-9-9zM15.536 15.536l4.95 4.95"/>
                `;
            } else {
                passwordField.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0zm-3-9C7.373 3 3 8.268 3 12s4.373 9 9 9 9-4.268 9-9-4.373-9-9-9z"/>
                `;
            }
        }
    </script>
</body>
</html>
