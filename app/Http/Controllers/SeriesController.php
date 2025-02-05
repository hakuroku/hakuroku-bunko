<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
    
    public function getPostSelectSeriesItems() {
        $data = Series::select('id', 'series_title', )->get();
        return $data;
    }

    public function getDashBoardIcons() {
        $series = Series::where('top_icon_role', true)->select('id', 'series_title')-> get();
        return $series;
    }

    public function addIcon(Request $request)
    {
        $seriesId = $request->series_id;
        $topMainImg = $request->file('top_main_img');
        $topIconImg = $request->file('top_icon_img');
        if ($request->hasFile('top_main_img')) {
            $this->store($topMainImg, 'topViews');
        }
        if ($request->hasFile('top_icon_img')) {
            $this->store($topIconImg, 'topIcons');
        }
        //―――――データベースにインサート―――――――
        $topIconUrl = Storage::url('uploads/topIcons');
        $topMainUrl = Storage::url('uploads/topViews');
        $topIconRole = Series::where('series_id', $seriesId)->FindOrFall('top_icon_role');
        $topIconRole->top_icon_role = !$topIconRole->top_icon_role;
        $topIconRole->save();

        return response()->json([
            'request' => 'OK'
        ]);
    }

    public function updateIcon(Request $request) {}

    public function deleteIcon(Request $request) {}

    private function store($file, $directory)
    {
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::uuid() . '.' . $extension;
        $file->storeAs('uploads/' . $directory, $fileName, 'public');
    }
}
