@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold text-gray-100 mb-6">Tambah Kategori</h1>

    @if($errors->any())
        <div class="bg-red-500 text-white p-4 rounded-md mb-4 shadow-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.kategori.store') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="judul" class="block text-gray-300 text-sm font-medium mb-2">Title</label>
            <input type="text" name="judul" id="judul" 
                   class="w-full px-4 py-2 rounded-md bg-gray-900 border border-gray-700 text-gray-200 
                          focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                   required>
        </div>

        <button type="submit" 
                class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md 
                       transition duration-200 ease-in-out">
            Tambah Kategori
        </button>
    </form>
</div>
@endsection
