<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Comic;
use Illuminate\Support\Facades\Log;

class ComicUploadController extends Controller
{
    public function upload(Request $request)
    {
        //―――――Reactからのオブジェクト取得・変数格納―――――――――――
        $data = $request;
        
        
        //―――――登校データの取得・変数格納―――――――――――
        $comic_title = $data->comic_title;
        $directoryName = Str::uuid()->toString();

        $comic_caption = $data->comic_caption;
        $series_id = (int) $data->series_id;
        $url = Storage::url('uploads/comics/'.$directoryName);
        $author_name = $data->author_name;
        
        $comic_content = $data->file('comic_content');
        
        

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

    public function view()
    {
        return view('comics.upload');
    }
}
