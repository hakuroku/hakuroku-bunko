<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Series;
use App\Models\Episode;


class SeriesController extends Controller
{
    public function create(Request $request) {
        $data = $request;
        $series_title = $data->series_title;
        $series_caption = $data->series_caption;
        Series::create( [
            'series_title'=>$series_title,
            'series_caption'=>$series_caption,
            'top_icon_role' => false
        ]);
        return (['response' => 'OK']);
    }

    public function getSeriesList() {
        $dataSet= []; 
        $seriesData = Series::select('id', 'series_title', 'series_caption')->get();
        $seriesIDs = Series::pluck('id');
        foreach ($seriesIDs as $seriesID) {
            $comicUrl = Episode::select('episode_url')
            ->join('series', 'series.id', '=', 'episodes.series_id')
            ->where('episodes.series_id', $seriesID)
            ->orderBy('episodes.id', 'asc')
            ->limit(1)
            ->value('episode_url');

            $dataSet[$seriesID] = $comicUrl; 
        }

        $result = [
            'seriesListInfo' => $seriesData,
            'seriesListUrl' => $dataSet
        ];

        return $result;
    }

    public function getUploadSeriesSelectItems() {
        $data = Series::select('id', 'series_title', )->get();
        return $data;
    }

    public function getDashBoardAddIcons() {
        $series = Series::where('top_icon_role', true)->select('id', 'series_title')-> get();
        return $series;
    }

    public function addIcon(Request $request)
    {
        $seriesId = $request->series_id;
        $directoryName = Str::uuid()->toString();
        if ($request->hasFile('top_main_img')) {
            $MainImgFilePath = $request->file('top_main_img')->store('uploads/topViews/'.$directoryName, 'public');
        }
        if ($request->hasFile('top_link_img')) {
            $LinkImgFilePath = $request->file('top_link_img')->store('uploads/topLinks/'.$directoryName, 'public');
        }
        //―――――データベースにインサート―――――――
        
        Series::where('id', $seriesId)->update([
            'top_main_img' => $MainImgFilePath,
            'top_link_img' => $LinkImgFilePath,
            'top_icon_role' => true
        ]);

        return response()->json([
            'request' => 'OK'
        ]);
    }

    public function changeIcon(Request $request) {
        $seriesId = $request->series_id;
        $directoryName = Str::uuid()->toString();
        if ($request->hasFile('top_main_img')) {
            $MainImgFilePath = $request->file('top_main_img')->store('uploads/topViews/'.$directoryName, 'public');
        }
        if ($request->hasFile('top_link_img')) {
            $LinkImgFilePath = $request->file('top_link_img')->store('uploads/topLinks/'.$directoryName, 'public');
        }
        Series::where('id', $seriesId)->update([
            'top_main_img' => $MainImgFilePath,
            'top_link_img' => $LinkImgFilePath,
        ]);
        return response()->json([
            'request' => 'OK'
        ]);
    }

    public function deleteIcon(Request $request) {
        $seriesId = $request->series_id;
        Series::where('id', $seriesId)->update([
            'top_icon_role' => false
        ]);
        return response()->json([
            'request' => 'OK'
        ]);
    }

    private function store($file, $directory)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::uuid() . '.' . $extension;
        $file->storeAs('uploads/' . $directory, $fileName, 'public');
    }
}
