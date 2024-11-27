@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold text-gray-100 mb-6">Data Foto</h1>

    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded-md mb-4 shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.foto.create') }}" 
       class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-5 rounded mb-4 shadow-md inline-block">
        + Tambah Foto
    </a>

    <div class="overflow-hidden border border-gray-600 rounded-lg shadow-lg mt-6">
        <table class="min-w-full table-auto bg-gray-800 text-gray-100">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th class="py-3 px-4 text-left uppercase font-semibold text-sm">ID</th>
                    <th class="py-3 px-4 text-left uppercase font-semibold text-sm">Galeri ID</th>
                    <th class="py-3 px-4 text-left uppercase font-semibold text-sm">File</th>
                    <th class="py-3 px-4 text-left uppercase font-semibold text-sm">Judul</th>
                    <th class="py-3 px-4 text-center uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-600">
                @foreach($fotos as $index => $foto)
                    <tr class="hover:bg-gray-700 transition duration-200 {{ $index % 2 === 0 ? 'bg-gray-800' : 'bg-gray-750' }}">
                        <td class="py-4 px-4">{{ $foto->id }}</td>
                        <td class="py-4 px-4">{{ $foto->galery->id ?? 'N/A' }}</td> <!-- Display the related gallery ID -->
                        <td class="py-4 px-4">
                            <img src="{{ asset('images/' . $foto->file) }}" alt="{{ $foto->judul }}" class="w-24 rounded shadow-md">
                        </td>
                        <td class="py-4 px-4">{{ $foto->judul }}</td>
                        <td class="py-4 px-4 text-center">
                            <a href="{{ route('admin.foto.edit', $foto->id) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded text-sm mr-2 transition">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.foto.destroy', $foto->id) }}" 
                                  method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm transition"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus foto ini?');">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
