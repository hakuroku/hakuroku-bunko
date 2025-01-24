<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Series;


class GetSeriesController extends Controller
{
    public function get() {
        $data = Series::select('id', 'series_title', )->get();
        return $data;
    }

    public function getIcons() {
        $series = Series::where('top_icon_role', true)->select('id', 'series_title')-> get();
        return $series;
    }
}
