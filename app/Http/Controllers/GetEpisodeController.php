<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GetEpisodeController extends Controller
{
    public function get($directory) {
        
        $images = Storage::disk('public')-> files('uploads/comics/'.$directory);
        
        usort($images, function ($a, $b) {
            preg_match('/\.(\d+)\./', basename($a), $matchesA);
            preg_match('/\.(\d+)\./', basename($b), $matchesB);
            return (int)$matchesA[1] - (int)$matchesB[1];
        });

        $imageDatas = array_map(function ($file) {
            return url(Storage::url($file));
        }, $images);

        return response()->json([
            'pages' => $imageDatas,
        ]);
    }
}
