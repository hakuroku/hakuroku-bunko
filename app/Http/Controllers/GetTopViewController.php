<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\Series_image;
use Illuminate\Http\Request;

class GetTopViewController extends Controller
{
    public function getImg() {
        $imgs = Series_image::all();

        return view('comics.viewer', compact('imgs'));

    }
}
