<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Series;

class getTopViewController extends Controller
{
    public function get() {
        
        $titleSet = [];
        $dataSet = [];
        $seriesIDs = Series::where('top_icon_role', true )->pluck('id');
        foreach ($seriesIDs as $seriesID) {
            $comicUrl = Episode::select('episode_url')
            ->join('series', 'id', '=', 'episodes.series_id')
            ->where('series_id', $seriesID)
            ->orderBy('episodes.id', 'asc')
            ->limit(1)
            ->value('episode_url')
            ->get();

            $dataSet[$seriesID] = $comicUrl; 
        }

        foreach($seriesIDs as $seriesID) {
            $seriesTitle = Series::where('id', $seriesID)->pluck('series_title');

            $titleSet[$seriesID] = $seriesTitle; 
        }
        
        
        return response()-> json([
            'title' => $titleSet,
            'urls' => $dataSet,
        ]);
    }
}
