<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    /**
     * Fetch posts under the 'informasi' category along with related galleries and photos.
     */
    public function informasi()
    {
        try {
            // Retrieve posts with the 'informasi' category and related gallery and photo data
            $informasi = Post::whereHas('kategori', function ($query) {
                $query->where('judul', 'informasi terkini'); // Filter kategori by 'informasi'
            })
            ->with(['galery.foto']) // Include gallery and foto relations
            ->get();

            // Check if there are any records
            if ($informasi->isEmpty()) {
                return response()->json(['message' => 'No informasi available'], 404);
            }

            return response()->json($informasi, 200);
        } catch (\Exception $e) {
            // Handle any unexpected errors
            return response()->json([
                'message' => 'An error occurred while fetching data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}