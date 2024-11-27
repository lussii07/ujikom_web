@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <!-- Agenda Section -->
    <div data-aos="fade-up" data-aos-duration="1000">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Agenda</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($agenda as $post)
                <div class="bg-gradient-to-b from-white to-gray-50 shadow-md rounded-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-transform duration-300 transform hover:scale-105">
                    <div class="p-4 flex items-start">
                        <div class="text-blue-500 mr-4">
                            <i class="fas fa-calendar-alt fa-3x"></i>
                        </div>
                        <div>
                            <h5 class="text-xl font-semibold text-gray-900">{{ $post->judul }}</h5>
                            <p class="text-gray-600 mt-2">{{ Str::limit($post->isi, 120) }}</p>
                            <button 
                                onclick="openModal({{ json_encode($post) }}, {{ json_encode($post->galery->foto ?? []) }})" 
                                class="text-blue-500 hover:text-blue-700 mt-4 inline-block font-medium transition-colors duration-300">
                                Selengkapnya
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Informasi Section -->
    <div class="mt-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <h2 class="text-3xl font-bold text-gray-900 mb-6">Informasi</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($informasi as $post)
                <div class="bg-gradient-to-b from-white to-gray-50 shadow-md rounded-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-transform duration-300 transform hover:scale-105">
                    <div class="p-4">
                        @if($post->galery && $post->galery->foto->isNotEmpty())
                            <div class="mb-4">
                                <div class="grid grid-cols-1 gap-4">
                                    @foreach($post->galery->foto as $foto)
                                        <img src="{{ asset('images/' . $foto->file) }}" alt="{{ $foto->judul }}" class="w-full h-40 object-cover rounded-md">
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <h5 class="text-xl font-semibold text-gray-900">{{ $post->judul }}</h5>
                        <p class="text-gray-600 mt-2">{{ Str::limit($post->isi, 120) }}</p>
                        <button 
                            onclick="openModal({{ json_encode($post) }}, {{ json_encode($post->galery->foto ?? []) }})" 
                            class="text-blue-500 hover:text-blue-700 mt-4 inline-block font-medium transition-colors duration-300">
                            Selengkapnya
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Modal -->
<div id="detailModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-50">
    <div class="bg-white rounded-lg overflow-hidden shadow-lg w-11/12 sm:w-3/4 lg:w-1/2">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h3 id="modal-title" class="text-lg font-semibold text-gray-900"></h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div class="p-6">
            <div id="modal-photos" class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4"></div>
            <p id="modal-content" class="text-gray-700"></p>
        </div>
        <div class="px-6 py-4 border-t border-gray-200 flex justify-end">
            <button onclick="closeModal()" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Tutup</button>
        </div>
    </div>
</div>

<!-- Map Section -->
<div class="mt-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
    <div class="mb-6 px-4">
        <h2 class="text-3xl font-bold text-gray-900">Lokasi</h2>
    </div>
    <div class="relative w-full rounded-lg overflow-hidden shadow-md">
        <iframe 
            class="w-full h-64 sm:h-80 md:h-96 lg:h-[500px] rounded-md border-2 border-gray-200" 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31722.047149155723!2d106.815542!3d-6.6407334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor%20(Nebrazka)!5e0!3m2!1sid!2sid!4v1693082189497!5m2!1sid!2sid" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
</div>

<script>
    function openModal(post, photos) {
        document.getElementById('modal-title').textContent = post.judul;
        document.getElementById('modal-content').textContent = post.isi;

        // Clear previous photos
        const photosContainer = document.getElementById('modal-photos');
        photosContainer.innerHTML = '';

        // Add new photos
        photos.forEach(photo => {
            const imgElement = document.createElement('img');
            imgElement.src = `/images/${photo.file}`;
            imgElement.alt = photo.judul;
            imgElement.className = 'w-full h-40 object-cover rounded-md';
            photosContainer.appendChild(imgElement);
        });

        document.getElementById('detailModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('detailModal').classList.add('hidden');
    }
</script>
@endsection

