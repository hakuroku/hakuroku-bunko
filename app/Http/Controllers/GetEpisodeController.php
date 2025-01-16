<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GetEpisodeController extends Controller
{
    public function get() {
        $imagePath = 'storage/app/public/I wish';
        $imageData = base64_encode(Storage::get($imagePath));

        return response()->json([
            'image' => $imageData,
        ]);
    }
}
