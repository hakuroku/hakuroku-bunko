<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Series;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class getTopViewController extends Controller
{
    public function get() {
        
        $titleSet = [];
        $dataSet = [];
        $topMainImgSet = [];
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

            
            $seriesTitle = Series::where('id', $seriesID)->pluck('series_title')->first();
            $titleSet[$seriesID] = $seriesTitle; 
            

            
            $topViewUrlPath = Series::where('id', $seriesID)->pluck('top_main_img')->first();
            $correctedMainPath = str_replace('\\', '/', $topViewUrlPath); 
            if (Storage::disk('public')->exists($correctedMainPath)) {
                $urlMainPath = Storage::disk('public')->url($correctedMainPath);
                $topMainImg = $urlMainPath;
                $topMainImgSet[$seriesID] = $topMainImg;
            } else {
                Log::error('ファイルが存在しません: ' . $correctedMainPath);
                $pages = 'ファイルが存在しません。';
            }
                    
            $topLinkUrlPath = Series::where('id', $seriesID)->pluck('top_link_img')->first();
            $correctedLinkPath = str_replace('\\', '/', $topLinkUrlPath); // パスの区切り文字を修正
            if (Storage::disk('public')->exists($correctedLinkPath)) {
                $urlLinkPath = Storage::disk('public')->url($correctedLinkPath);
                $topLinkImg = $urlLinkPath;
                $topLinkImgSet[$seriesID] = $urlLinkPath;
            } else {
                Log::error('ファイルが存在しません: ' . $correctedLinkPath);
                $pages = 'ファイルが存在しません。';
            }
        }
           
            
            return response()->json([
                'seriesTitle' => $titleSet,
                'episodeUrl' => $dataSet,
                'seriesMainImg' => $topMainImgSet,
                'seriesLinkImg' => $topLinkImgSet
            ]);
    }
}

