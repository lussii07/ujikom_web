<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Galery;

class GaleryController extends Controller
{
    public function index()
    {
        return response()->json(Galery::with('post')->get(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $gallery = Galery::create($validatedData);
        return response()->json($gallery, 201);
    }

    public function show($id)
    {
        $gallery = Galery::with('post')->find($id);
        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found'], 404);
        }
        return response()->json($gallery, 200);
    }

    public function update(Request $request, $id)
    {
        $gallery = Galery::find($id);
        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found'], 404);
        }

        $validatedData = $request->validate([
            'post_id' => 'sometimes|required|exists:posts,id',
            'position' => 'sometimes|required|integer',
            'status' => 'sometimes|required|boolean',
        ]);

        $gallery->update($validatedData);
        return response()->json($gallery, 200);
    }

    public function destroy($id)
    {
        $gallery = Galery::find($id);
        if (!$gallery) {
            return response()->json(['message' => 'Gallery not found'], 404);
        }

        $gallery->delete();
        return response()->json(['message' => 'Gallery deleted'], 200);
    }
}