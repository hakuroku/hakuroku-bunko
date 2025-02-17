<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Series;
use Illuminate\Support\Facades\Storage;

class getTopViewController extends Controller
{
    public function get() {
        
        $titleSet = [];
        $dataSet = [];
        $TopViewImgSet = [];
        $topLinkImgSet = [];
        $seriesIDs = Series::where('top_icon_role', true )->pluck('id');
        foreach ($seriesIDs as $seriesID) {
            $comicUrl = Episode::select('episode_url')
            ->join('series', 'series.id', '=', 'episodes.series_id')
            ->where('series_id', $seriesID)
            ->orderBy('episodes.id', 'asc')
            ->limit(1)
            ->value('episode_url');
            $dataSet[$seriesID] = $comicUrl; 

            $seriesTitle = Series::where('id', $seriesID)->pluck('series_title');
            $titleSet[$seriesID] = $seriesTitle; 

            $topViewUrlPath = Series::where('id', $seriesID)->pluck('top_main_img')->first();
            $urlPath = Storage::url($topViewUrlPath);
            $TopViewImgSet[$seriesID] = $urlPath; 
                
        }

        $result = [
            'series_title' => $titleSet,
            'episode_url' => $dataSet,
            'top_main_img' => $TopViewImgSet
        ];
        
        return response()-> json($result);
    }
}
