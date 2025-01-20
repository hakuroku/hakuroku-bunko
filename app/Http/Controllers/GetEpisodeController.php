<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GetEpisodeController extends Controller
{
    public function get($directory) {
        $images = Storage::disk('public')-> files($directory);
        $imageDatas = array_map(function ($file) {
            return Storage::url($file);
        }, $images);

        return response()->json([
            'pages' => $imageDatas,
        ]);
    }
}
