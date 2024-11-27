<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Foto;
use App\Models\Kategori;
use App\Models\Profile;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $agenda = Post::whereHas('kategori', function ($query) {
                                $query->where('judul', 'agenda sekolah');
                            })->latest()->get();
                        
        $informasi = Post::where('kategori_id', 1) // Assuming 'Informasi' category has id 1
                            ->with('galery.foto') // Eager load the related gallery and foto
                            ->get();
                        

        return view('home', compact('agenda', 'informasi'));
    }

    public function about()
    {
       // Fetch specific profiles based on title
       $smkn4BogorProfile = Profile::where('judul', 'SMKN 4 Bogor')->first();
       $kepalaSekolahProfile = Profile::where('judul', 'Kepala Sekolah')->first();

       // Return the view with the specific profiles
       return view('about', compact('smkn4BogorProfile', 'kepalaSekolahProfile'));
    }

    public function galeri()
    {
        // Fetch all gallery photos grouped by post title
        $galerySekolah = Foto::with(['galery.post' => function ($query) {
                                   $query->where('status', 'published');
                               }])
                               ->get()
                               ->groupBy('galery.post.judul'); // Group by post title

        return view('galeri-sekolah', compact('galerySekolah'));
    }
}