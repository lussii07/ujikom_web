@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold text-gray-100 mb-6">Edit Halaman</h1>

    @if ($errors->any())
        <div class="bg-red-600 text-white p-4 rounded-md mb-4 shadow-lg">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.profile.update', $profile->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="judul" class="block text-gray-200 font-semibold mb-2">Judul</label>
            <input type="text" name="judul" id="judul" 
                   class="bg-gray-800 text-gray-300 p-2 rounded-md w-full" 
                   value="{{ old('judul', $profile->judul) }}" required>
        </div>

        <div class="mb-4">
            <label for="isi" class="block text-gray-200 font-semibold mb-2">Isi</label>
            <textarea name="isi" id="isi" rows="6" 
                      class="bg-gray-800 text-gray-300 p-2 rounded-md w-full" required>{{ old('isi', $profile->isi) }}</textarea>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md">
            Update Halaman
        </button>
    </form>
</div>
@endsection
