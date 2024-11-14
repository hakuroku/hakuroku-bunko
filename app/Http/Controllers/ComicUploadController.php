<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Comic;

class ComicUploadController extends Controller
{
    public function upload(Request $request)
    {
        //―――――登校データの変数格納―――――――――――
        $comic_title = $request->comic_title;
        $series_title = $request->series_title;
        $url = Storage::url('app/private/' . $comic_title);
        $author_name = $request->author_name;
        
        $comic_content = $request->comic_content;
        dump($comic_content);

        if ($request->hasFile('comic_content')) {

            //―――収納ディレクトリの新規作成―――――
            Storage::makeDirectory($comic_title);

            //―――登校データの取得・保存－－－－－－－－－――――――
            foreach ($comic_content as $page) {
                $request->file('comic_content');
                dump($page);
                Storage::disk('local')->putFile($comic_title, $page);
            }


            //――――格納データ確認－－－－－－－－－－－－―
           

            //―――――データベースにインサート―――――――
            $post = Comic::create([
                'comic_title' => $comic_title,
                'series_title' => $series_title,
                'comic_content' => $url,
                'author_name' => $author_name
            ]);

            //―――――元の画面に移動―――――――――
            return (view('comics.upload'));
        } 
    }

    public function view()
    {
        return view('comics.upload');
    }
}
