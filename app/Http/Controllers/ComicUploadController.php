<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Comic;

class ComicUploadController extends Controller
{
    public function upload(Request $request)
    {
        //―――――登校データの取得・変数格納―――――――――――
        $comic_title = $request->comic_title;
        $series_title = $request->series_title;
        $url = Storage::url('app/private/' . $comic_title);
        $author_name = $request->author_name;
        
        $comic_content = $request->file('comic_content');
        dump($comic_content);

        if ($request->hasFile('comic_content')) {

            //―――収納ディレクトリの新規作成―――――
            Storage::makeDirectory($comic_title);

            //―――登校データの保存－－－－－－－－－――――――
            foreach ($comic_content as $page) {
                dump($page);
                Storage::disk('local')->putFile($comic_title, $page);
            }

            //―――――データベースにインサート―――――――
            Comic::create([
                'comic_title' => $comic_title,
                'series_title' => $series_title,
                'comic_content' => $url,
                'author_name' => $author_name
            ]);

            //―――――元の画面に移動―――――――――
            return ['message' => 'OK'];
        } 
    }

    public function view()
    {
        return view('comics.upload');
    }
}
