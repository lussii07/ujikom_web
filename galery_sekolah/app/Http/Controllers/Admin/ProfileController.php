<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
        return view('admin.profile.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:235',
            'isi' => 'required|string',
        ]);

        Profile::create($request->all());

        return redirect()->route('admin.profile.index')->with('success', 'Page created successfully'); // Fixed typo
    }

    public function edit($id)
    {
        $profile = Profile::findOrFail($id);
        return view('admin.profile.edit', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $profile = Profile::findOrFail($id);
        $profile->update($request->all());

        return redirect()->route('admin.profile.index')->with('success', 'Page updated successfully');
    }

    public function destroy($id)
    {
        $profile = Profile::findOrFail($id);
        $profile->delete();

        return redirect()->route('admin.profile.index')->with('success', 'Page deleted successfully');
    }
}