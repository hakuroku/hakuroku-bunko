<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Series;

class TopUpdateController extends Controller
{
    public function addIcon(Request $request) {
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
        $topIconRole = Series::where('series_id', $seriesId )->FindOrFall('top_icon_role');
        $topIconRole->top_icon_role = !$topIconRole->top_icon_role;
        $topIconRole->save();

        return response()->json([
           'request'=> 'OK' 
        ]);
    }

    private function store($file, $directory) {
        $extension = $file->getClientOriginalExtension();
        $fileName = Str::uuid().'.'.$extension;
        $file->storeAs('uploads/'.$directory, $fileName, 'public');
    }
     
    public function deleteIcon(Request $request) {
        
    }

    public function updateIcon(Request $request) {

    }
}
