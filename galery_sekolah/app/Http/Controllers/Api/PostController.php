<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return response()->json(Post::with(['kategori', 'petugas'])->get(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'isi' => 'required|string',
            'petugas_id' => 'required|exists:petugas,id',
            'status' => 'required|boolean',
        ]);

        $post = Post::create($validatedData);
        return response()->json($post, 201);
    }

    public function show($id)
    {
        $post = Post::with(['kategori', 'petugas'])->find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        return response()->json($post, 200);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $validatedData = $request->validate([
            'judul' => 'sometimes|required|string|max:255',
            'kategori_id' => 'sometimes|required|exists:kategori,id',
            'isi' => 'sometimes|required|string',
            'petugas_id' => 'sometimes|required|exists:petugas,id',
            'status' => 'sometimes|required|boolean',
        ]);

        $post->update($validatedData);
        return response()->json($post, 200);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        $post->delete();
        return response()->json(['message' => 'Post deleted'], 200);
    }
}