<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    // Display a listing of the posts
    public function index()
    {
        $posts = Post::with('kategori', 'petugas')->get();
        return view('admin.posts.index', compact('posts'));
    }

    // Show the form for creating a new post
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.posts.create', compact('kategoris'));
    }

    // Store a newly created post in the database
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'isi' => 'required|string',
            'status' => 'required|in:published,draft'
        ]);

        Post::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
            'petugas_id' => Auth::id(), // Automatically set petugas ID
            'status' => $request->status
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    // Display the specified post
    public function show($id)
    {
        $post = Post::with('kategori', 'petugas')->findOrFail($id);
        return view('admin.posts.show', compact('post'));
    }

    // Show the form for editing the specified post
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $kategoris = Kategori::all();
        return view('admin.posts.edit', compact('post', 'kategoris'));
    }

    // Update the specified post in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'isi' => 'required|string',
            'status' => 'required|in:published,draft'
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'isi' => $request->isi,
            'status' => $request->status
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    // Remove the specified post from the database
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}