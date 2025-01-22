<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Series;
use App\Models\Comic;

class GetSeriesController extends Controller
{
    public function get() {
        
        $seriesID = Series::select('series_id')->get();
        $data = Series::select('series_id', 'series_title', )->get();
        $firstComicData = Comic::select('comic_url')
            ->join('series', 'id', '=', 'series_id')
            ->where('series_id', $seriesID)
            ->orderBy('id', 'asc')
            ->limit(1)
            ->value('comic_url');
        return $data;
    }
}
