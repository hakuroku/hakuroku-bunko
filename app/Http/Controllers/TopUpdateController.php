<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Series;

class TopUpdateController extends Controller
{
    // public function iconAdd(Request $request) {
    //     $data = $request();
    //     if ($request->hasFile('top_main_img')) {
    //         $topMainImg = $request->file('top_main_img');
    //     }
    //     $topIconImg = $data->$topIconImg;
    //         //―――――データベースにインサート―――――――
    //         Series::update([
    //             'top_main_img' => $topMainImg,
    //         ]);
    // }

    public function iconDelete(Request $request) {

    }

    public function iconUpdate(Request $request) {

    }
}
