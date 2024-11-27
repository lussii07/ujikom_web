@extends('layouts.admin')

@section('header', 'Welcome to the Admin Dashboard')

@section('content')
    <!-- Dashboard Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <!-- Card 1: Total Users -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
            <div class="flex items-center">
                <i class="fas fa-users text-3xl text-gray-400 mr-4"></i>
                <div>
                    <h3 class="text-lg font-semibold text-gray-200">Total Users</h3>
                    <p class="text-3xl font-bold text-white">{{ $totalPetugas }}</p>
                </div>
            </div>
        </div>
        <!-- Card 2: Total Galleries -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
            <div class="flex items-center">
                <i class="fas fa-images text-3xl text-gray-400 mr-4"></i>
                <div>
                    <h3 class="text-lg font-semibold text-gray-200">Total Galleries</h3>
                    <p class="text-3xl font-bold text-white">{{ $totalGalery }}</p>
                </div>
            </div>
        </div>
        <!-- Card 3: Total Photos -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
            <div class="flex items-center">
                <i class="fas fa-camera text-3xl text-gray-400 mr-4"></i>
                <div>
                    <h3 class="text-lg font-semibold text-gray-200">Total Photos</h3>
                    <p class="text-3xl font-bold text-white">{{ $totalFoto }}</p>
                </div>
            </div>
        </div>
        <!-- Card 4: Total Posts -->
        <div class="bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
            <div class="flex items-center">
                <i class="fas fa-file-alt text-3xl text-gray-400 mr-4"></i>
                <div>
                    <h3 class="text-lg font-semibold text-gray-200">Total Posts</h3>
                    <p class="text-3xl font-bold text-white">{{ $totalPosts }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
