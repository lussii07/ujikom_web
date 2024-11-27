@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold text-gray-100 mb-6">Create New Post</h1>

    @if ($errors->any())
        <div class="bg-red-600 text-white p-4 rounded-md mb-4 shadow-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-200">Judul</label>
            <input type="text" name="judul" id="judul" 
                   class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-900 text-gray-200" 
                   required>
        </div>

        <div class="mb-4">
            <label for="kategori_id" class="block text-sm font-medium text-gray-200">Kategori</label>
            <select name="kategori_id" id="kategori_id" 
                    class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-900 text-gray-200" required>
                <option value="">Pilih Kategori</option>
                @foreach ($kategoris as $category)
                    <option value="{{ $category->id }}">{{ $category->judul }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="isi" class="block text-sm font-medium text-gray-200">Isi</label>
            <textarea name="isi" id="isi" rows="4" 
                      class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-900 text-gray-200" required></textarea>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-sm font-medium text-gray-200">Status</label>
            <select name="status" id="status" 
                    class="mt-1 block w-full p-2 border border-gray-600 rounded-md bg-gray-900 text-gray-200" required>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
            </select>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
            Create Post
        </button>
    </form>
</div>
@endsection
