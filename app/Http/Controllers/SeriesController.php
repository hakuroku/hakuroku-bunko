<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class SeriesController extends Controller
{
    public function create(Request $request)
    {

        $series_title = $request->series_title;
        $series_caption = $request->series_caption;

        Series::create([
            'series_title' => $series_title,
            'series_caption' => $series_caption
        ]);

        return back();
    }
}
