<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Petugas;  // Assuming you have a Petugas model
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = Petugas::all();
        return view('admin.petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('admin.petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ]);

        Petugas::create([
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.petugas.index')->with('success', 'Admin created successfully.');
    }

    public function edit(Petugas $petugas)
    {
        return view('admin.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, Petugas $petugas)
    {
        $request->validate([
            'username' => 'required|string|max:255',
        ]);

        $petugas->update([
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $petugas->password,
        ]);

        return redirect()->route('admin.petugas.index')->with('success', 'Admin updated successfully.');
    }

    public function destroy(Petugas $petugas)
    {
        $petugas->delete();
        return redirect()->route('admin.petugas.index')->with('success', 'Admin deleted successfully.');
    }
}