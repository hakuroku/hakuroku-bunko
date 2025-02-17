<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Episode;
use App\Models\Series;

class EpisodeController extends Controller
{
    public function upload(Request $request) //Requestクラスのインスタンス生成
    {
        //―――――登校データの取得・変数格納―――――――――――
        $episode_title = $request->episode_title; //requestオブジェクトのcomic_titleプロパティにアクセスしている
        $directoryName = Str::uuid()->toString(); //Strクラスのuuidメソッドにアクセス、返値uuidオブジェクトのメソッドtoStringにアクセス

        $episode_caption = $request->episode_caption;
        $series_id = (int) $request->series_id;
        $url = Storage::url('uploads/episodes/' . $directoryName);
        $author_name = $request->author_name;
        $episode_content = $request->file('episode_content'); //Requestインスタンスのfileメソッドにアクセスしている

        if ($request->hasFile('episode_content')) {

            //―――登校データの保存－－－－－－－－－――――――
            foreach ($episode_content as $page) {
                $extension = $page->getClientOriginalExtension();
                $counter = $this->getFileCount($directoryName);
                $fileName = Str::uuid() . '.' . $counter . '.' . $extension;
                $page->storeAs('uploads/episodes/' . $directoryName, $fileName, 'public');
            }

            //―――――データベースにインサート―――――――
            Episode::create([
                'episode_title' => $episode_title,
                'episode_caption' => $episode_caption,
                'series_id' => $series_id,
                'episode_content' => $url,
                'episode_url' => $directoryName,
                'author_name' => $author_name
            ]);

            //―――――元の画面に移動―――――――――
            return ['response' => 'OK'];
        }
    }

    function getFileCount($directoryName)
    {
        $files = Storage::disk('public')->files('uploads/episodes/' . $directoryName);
        return count($files) + 1;
    }

    public function getEpisodeContent($directory)
    {
        $pages = Storage::disk('public')->files('uploads/episodes/' . $directory);
        usort($pages, function ($a, $b) {
            preg_match('/\.(\d+)\./', basename($a), $matchesA);
            preg_match('/\.(\d+)\./', basename($b), $matchesB);
            return (int)$matchesA[1] - (int)$matchesB[1];
        });
        $episodeDatas = array_map(function ($file) {
            return url(Storage::url($file));
        }, $pages);

        $targetEpisode = Episode::where('episode_url', $directory )->first();
        $episodeInfos = Episode::where('series_id', $targetEpisode->series_id)->select('episode_title', 'episode_url', 'updated_at')->get();

        $seriesInfo = Series::select('series.series_title', 'series.series_caption')
        ->join('episodes','episodes.series_id', '=', 'series.id')
        ->where('series.id', $targetEpisode->series_id)
        ->first('series_title', 'series_caption');

        $result = [
            'episodeContent' => $episodeDatas,
            'seriesInfo' => $seriesInfo,
            'episodeInfo' => $episodeInfos
        ];
        
        return response()->json($result);
    }

}
