@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <h1 class="text-3xl font-semibold text-gray-100 mb-6">Postingan</h1>

    @if(session('success'))
        <div class="bg-green-600 text-white p-4 rounded-md mb-4 shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.posts.create') }}" 
       class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-5 rounded mb-4 shadow-md inline-block">
        + Tambah Post
    </a>

    <div class="overflow-hidden border border-gray-600 rounded-lg shadow-lg mt-6">
        <table class="min-w-full table-auto bg-gray-800 text-gray-100">
            <thead class="bg-gray-700 text-gray-300">
                <tr>
                    <th class="py-3 px-4 text-left uppercase font-semibold text-sm">ID</th>
                    <th class="py-3 px-4 text-left uppercase font-semibold text-sm">Judul</th>
                    <th class="py-3 px-4 text-left uppercase font-semibold text-sm">Kategori id</th>
                    <th class="py-3 px-4 text-left uppercase font-semibold text-sm">Isi</th>
                    <th class="py-3 px-4 text-left uppercase font-semibold text-sm">Petugas id</th>
                    <th class="py-3 px-4 text-left uppercase font-semibold text-sm">Status</th>
                    <th class="py-3 px-4 text-center uppercase font-semibold text-sm">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-600">
                @foreach($posts as $index => $post)
                    <tr class="hover:bg-gray-700 transition duration-200 {{ $index % 2 === 0 ? 'bg-gray-800' : 'bg-gray-750' }}">
                        <td class="py-4 px-4">{{ $post->id }}</td>
                        <td class="py-4 px-4">{{ $post->judul }}</td>
                        <td class="py-4 px-4">{{ $post->kategori_id }}</td>
                        <td class="py-4 px-4">{{ $post->isi }}</td>
                        <td class="py-4 px-4">{{ $post->petugas_id }}</td> 
                        <td class="py-4 px-4">{{ ucfirst($post->status) }}</td>
                        <td class="py-4 px-4 text-center">
                            <a href="{{ route('admin.posts.edit', $post) }}" 
                               class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded text-sm mr-2 transition">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" 
                                  method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded text-sm transition"
                                        onclick="return confirm('Are you sure you want to delete this post?');">
                                    <i class="fas fa-trash-alt"></i> Delete
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
