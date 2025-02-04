<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Comic;
use Illuminate\Support\Facades\Log;

class ComicController extends Controller
{
    public function upload(Request $request) //Requestクラスのインスタンス生成
    {     
        //―――――登校データの取得・変数格納―――――――――――
        $comic_title = $request->comic_title; //requestオブジェクトのcomic_titleプロパティにアクセスしている
        $directoryName = Str::uuid()->toString(); //Strクラスのuuidメソッドにアクセス、返値uuidオブジェクトのメソッドtoStringにアクセス

        $comic_caption = $request->comic_caption;
        $series_id = (int) $request->series_id;
        $url = Storage::url('uploads/comics/'.$directoryName);
        $author_name = $request->author_name;
        $comic_content = $request->file('comic_content'); //Requestインスタンスのfileメソッドにアクセスしている
        
        if ($request->hasFile('comic_content')) {
           
            //―――登校データの保存－－－－－－－－－――――――
            foreach ($comic_content as $page) {
                $extension = $page->getClientOriginalExtension();
                $counter = $this->getFileCount($directoryName);
                $fileName = Str::uuid().'.'.$counter.'.'.$extension;
                $page->storeAs('uploads/comics/'.$directoryName, $fileName, 'public');
            }

            //―――――データベースにインサート―――――――
            Comic::create([
                'comic_title' => $comic_title,
                'comic_caption' => $comic_caption,
                'series_id' => $series_id,
                'comic_content' => $url,
                'comic_url' => $directoryName,
                'author_name' => $author_name
            ]);

            //―――――元の画面に移動―――――――――
            return ['response'=> 'OK'];
        } 
    }

    private function getFileCount($directoryName) {
        $files = Storage::disk('public')->files('uploads/comics/'.$directoryName);
        return count($files) + 1;
    }

}
