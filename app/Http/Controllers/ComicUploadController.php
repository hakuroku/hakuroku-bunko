<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Comic;
use App\Models\Series;
use Illuminate\Support\Facades\Log;

class ComicUploadController extends Controller
{
    public function upload(Request $request)
    {
        //―――――Reactからのオブジェクト取得・変数格納―――――――――――
        Log::info($request->all());
        $data = $request;
        
        
        //―――――登校データの取得・変数格納―――――――――――
        $comic_title = $data->comic_title;
        $series_id = $data->series_id;
        $url = Storage::url('app/public/' . $comic_title);
        $author_name = $data->author_name;
        
        $comic_content = $data->file('comic_content');

        if ($request->hasFile('comic_content')) {
           

            //―――登校データの保存－－－－－－－－－――――――
            foreach ($comic_content as $page) {
                Storage::disk('public')->putFile($comic_title, $page); //putFileメソッドは自動でディレクトリを作成してくれる。
            }

            //―――――データベースにインサート―――――――
            Comic::create([
                'comic_title' => $comic_title,
                'series_id' => $series_id,
                'comic_content' => $url,
                'author_name' => $author_name
            ]);

            //―――――元の画面に移動―――――――――
            return ['response'=>'OK'];
        } 
    }

    public function create(Request $request)
    {

        $series_title = $request->series_title;
        $series_caption = $request->series_caption;

        Series::create([
            'series_title' => $series_title,
            'series_caption' => $series_caption
        ]);

        return back();
    }

    public function view()
    {
        return view('comics.upload');
    }
}
