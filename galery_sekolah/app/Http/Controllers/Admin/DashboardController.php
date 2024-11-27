<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Petugas;
use App\Models\Foto;
use App\Models\Post;
use App\Models\Galery;

class DashboardController extends Controller
{
    public function index()
    {
        // Retrieve counts from each model
        $totalPetugas = Petugas::count();
        $totalFoto = Foto::count();
        $totalGalery = Galery::count();
        $totalPosts = Post::count();

        // Pass the data to the view
        return view('admin.dashboard', compact('totalPetugas', 'totalFoto', 'totalGalery', 'totalPosts'));
    }
}