@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold text-gray-100 mb-6">Tambah Petugas</h1>

    @if($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-md mb-4 shadow-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.petugas.store') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="username" class="block text-gray-300 text-sm font-medium mb-2">Username</label>
            <input type="text" name="username" id="username" 
                   class="w-full px-4 py-2 rounded-md bg-gray-900 border border-gray-700 text-gray-200 
                          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                   required>
        </div>

        <div class="mb-4 relative">
            <label for="password" class="block text-gray-300 text-sm font-medium mb-2">Password</label>
            <input type="password" name="password" id="password" 
                   class="w-full px-4 py-2 rounded-md bg-gray-900 border border-gray-700 text-gray-200 
                          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                   required>
            <button type="button" onclick="togglePassword()" 
                    class="absolute right-3 top-10 text-gray-500 hover:text-gray-300 focus:outline-none" 
                    aria-label="Toggle password visibility">
                <i class="fas fa-eye" id="togglePasswordIcon"></i>
            </button>
        </div>

        <button type="submit" 
                class="w-full bg-green-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md 
                       transition duration-200 ease-in-out">
            Add Petugas
        </button>
    </form>
</div>

<script>
    function togglePassword() {
        const passwordField = document.getElementById('password');
        const toggleIcon = document.getElementById('togglePasswordIcon');
        
        // Toggle visibility
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.classList.replace('fa-eye', 'fa-eye-slash');
        } else {
            passwordField.type = 'password';
            toggleIcon.classList.replace('fa-eye-slash', 'fa-eye');
        }
    }
</script>
@endsection
