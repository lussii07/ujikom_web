<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Foto;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::with('galery')->get();

        // Update URL lengkap untuk file gambar
        foreach ($fotos as $foto) {
            $foto->file = url('images/' . $foto->file);
        }

        return response()->json($fotos, 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'galery_id' => 'required|exists:galery,id',
            'file' => 'required|string',
            'judul' => 'required|string|max:255',
        ]);

        $foto = Foto::create($validatedData);

        // Tambahkan URL lengkap ke respons
        $foto->file = url('images/' . $foto->file);
        
        return response()->json($foto, 201);
    }

    public function show($id)
    {
        $foto = Foto::with('galery')->find($id);
        if (!$foto) {
            return response()->json(['message' => 'Foto not found'], 404);
        }

        // Update URL lengkap untuk file gambar
        $foto->file = url('images/' . $foto->file);

        return response()->json($foto, 200);
    }

    public function update(Request $request, $id)
    {
        $foto = Foto::find($id);
        if (!$foto) {
            return response()->json(['message' => 'Foto not found'], 404);
        }

        $validatedData = $request->validate([
            'galery_id' => 'sometimes|required|exists:galery,id',
            'file' => 'sometimes|required|string',
            'judul' => 'sometimes|required|string|max:255',
        ]);

        $foto->update($validatedData);

        // Update URL lengkap untuk file gambar
        $foto->file = url('images/' . $foto->file);

        return response()->json($foto, 200);
    }

    public function destroy($id)
    {
        $foto = Foto::find($id);
        if (!$foto) {
            return response()->json(['message' => 'Foto not found'], 404);
        }

        $foto->delete();
        return response()->json(['message' => 'Foto deleted'], 200);
    }
}