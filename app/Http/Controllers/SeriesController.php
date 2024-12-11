<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;


class SeriesController extends Controller
{
    public function create(Request $request) {
        $data = $request;

        $series_title = $data->series_title;
        $series_caption = $data->series_caption;

        Series::create( [
            'series_title'=>$series_title,
            'series_caption'=>$series_caption
        ]);

        return (['response' => 'OK']);
    }
}
