<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Foto;
use App\Models\Galery;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    public function index()
    {
        $fotos = Foto::all();
        return view('admin.foto.index', compact('fotos'));
    }

    public function create()
    {
        $galeries = Galery::all(); // Fetch all galleries for the dropdown
        return view('admin.foto.create', compact('galeries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'galery_id' => 'required|exists:galery,id', // Validate galery_id
            'file' => 'required|image|mimes:jpeg,png,jpg,gif', // Validate image file
            'judul' => 'required|string|max:255',
        ]);

        // Save the uploaded file
        $fileName = time() . '.' . $request->file->extension();
        $request->file->move(public_path('images'), $fileName);

        // Create the Foto record
        Foto::create([
            'galery_id' => $request->galery_id,
            'file' => $fileName,
            'judul' => $request->judul,
        ]);

        return redirect()->route('admin.foto.index')->with('success', 'Foto berhasil ditambahkan');
    }

    public function edit($id)
    {
        $foto = Foto::findOrFail($id);
        $galeries = Galery::all(); // Fetch all galleries for the dropdown
        return view('admin.foto.edit', compact('foto', 'galeries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'galery_id' => 'required|exists:galery,id',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'required|string|max:255',
        ]);

        $foto = Foto::findOrFail($id);
        $foto->galery_id = $request->galery_id;
        $foto->judul = $request->judul;

        if ($request->file) {
            // Save the uploaded file
            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('images'), $fileName);
            $foto->file = $fileName; // Update file only if a new one is uploaded
        }

        $foto->save();

        return redirect()->route('admin.foto.index')->with('success', 'Foto berhasil diupdate');
    }

    public function destroy($id)
    {
        $foto = Foto::findOrFail($id);
        $foto->delete();

        return redirect()->route('admin.foto.index')->with('success', 'Foto berhasil dihapus');
    }
}