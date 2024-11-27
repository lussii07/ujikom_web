<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galery;
use App\Models\Post;
use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        $galeries = Galery::all();
        return view('admin.galery.index', compact('galeries'));
    }

    public function create()
    {
        $posts = Post::all(); // Assuming you have a Post model for fetching posts
        return view('admin.galery.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|integer|in:0,1', // Updated to ensure status is an integer (0 or 1)
        ]);

        Galery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => (int) $request->status, // Ensuring the status is stored as an integer
        ]);

        return redirect()->route('admin.galery.index')->with('success', 'Galery berhasil ditambahkan');
    }

    public function edit($id)
    {
        $galery = Galery::findOrFail($id);
        $posts = Post::all();
        return view('admin.galery.edit', compact('galery', 'posts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|integer|in:0,1', // Updated to ensure status is an integer (0 or 1)
        ]);

        $galery = Galery::findOrFail($id);
        $galery->update([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => (int) $request->status, // Ensuring the status is stored as an integer
        ]);

        return redirect()->route('admin.galery.index')->with('success', 'Galery berhasil diupdate');
    }

    public function destroy($id)
    {
        $galery = Galery::findOrFail($id);
        $galery->delete();

        return redirect()->route('admin.galery.index')->with('success', 'Galery berhasil dihapus');
    }
}