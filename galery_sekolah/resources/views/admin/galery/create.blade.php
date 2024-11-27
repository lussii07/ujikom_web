@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold text-gray-100 mb-6">Tambah Galery</h1>

    @if ($errors->any())
        <div class="bg-red-600 text-white p-4 rounded-md mb-4 shadow-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.galery.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="post_id" class="block text-gray-200 font-semibold mb-2">Post ID</label>
            <select name="post_id" id="post_id" class="bg-gray-800 text-gray-300 p-2 rounded-md w-full" required>
                <option value="">Select a Post</option>
                @foreach ($posts as $post)
                    <option value="{{ $post->id }}" {{ old('post_id') == $post->id ? 'selected' : '' }}>
                        {{ $post->id }} - {{ $post->judul }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="position" class="block text-gray-200 font-semibold mb-2">Position</label>
            <input type="number" name="position" id="position" 
                   class="bg-gray-800 text-gray-300 p-2 rounded-md w-full" 
                   value="{{ old('position') }}" required>
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-200 font-semibold mb-2">Status</label>
            <select name="status" id="status" class="bg-gray-800 text-gray-300 p-2 rounded-md w-full" required>
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>1</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>0</option>
            </select>
        </div>

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-md">
            Tambah Galery
        </button>
    </form>
</div>
@endsection
