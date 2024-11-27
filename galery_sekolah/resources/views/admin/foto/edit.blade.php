@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold text-gray-100 mb-6">Edit Foto</h1>

    @if ($errors->any())
        <div class="bg-red-600 text-white p-4 rounded-md mb-4 shadow-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.foto.update', $foto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="galery_id" class="block text-gray-200 font-semibold mb-2">Galery ID</label>
            <select name="galery_id" id="galery_id" class="bg-gray-800 text-gray-300 p-2 rounded-md w-full" required>
                @foreach($galeries as $galery)
                    <option value="{{ $galery->id }}" {{ $foto->galery_id == $galery->id ? 'selected' : '' }}>
                        {{ $galery->id }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="file" class="block text-gray-200 font-semibold mb-2">File (leave blank to keep current file)</label>
            <input type="file" name="file" id="file" class="bg-gray-800 text-gray-300 p-2 rounded-md w-full">
        </div>

        <div class="mb-4">
            <label for="judul" class="block text-gray-200 font-semibold mb-2">Judul</label>
            <input type="text" name="judul" id="judul" class="bg-gray-800 text-gray-300 p-2 rounded-md w-full" value="{{ $foto->judul }}" required>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md">
            Update Foto
        </button>
    </form>
</div>
@endsection
