<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        return response()->json(Petugas::all(), 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:petugas',
            'password' => 'required|string|min:6',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        $petugas = Petugas::create($validatedData);
        return response()->json($petugas, 201);
    }

    public function show($id)
    {
        $petugas = Petugas::find($id);
        if (!$petugas) {
            return response()->json(['message' => 'Petugas not found'], 404);
        }
        return response()->json($petugas, 200);
    }

    public function update(Request $request, $id)
    {
        $petugas = Petugas::find($id);
        if (!$petugas) {
            return response()->json(['message' => 'Petugas not found'], 404);
        }

        $validatedData = $request->validate([
            'username' => 'sometimes|required|string|max:255|unique:petugas,username,' . $id,
            'password' => 'sometimes|required|string|min:6',
        ]);

        if (isset($validatedData['password'])) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        }

        $petugas->update($validatedData);
        return response()->json($petugas, 200);
    }

    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        if (!$petugas) {
            return response()->json(['message' => 'Petugas not found'], 404);
        }

        $petugas->delete();
        return response()->json(['message' => 'Petugas deleted'], 200);
    }
}