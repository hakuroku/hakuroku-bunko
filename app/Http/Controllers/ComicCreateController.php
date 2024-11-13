<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Comic;

class ComicCreateController extends Controller
{
    public function create(Request $request)
    {
        $comic_title = $request->comic_title;
        $series_title = $request->series_title;
        $comic_content = $request->comic_content;
        $author_name = $request->author_name;
        // if ($request->hasFile('comic_content')) {
            if (true) {
            Storage::makeDirectory($comic_title);
            $file = $request->file('comic_content');
            dump($request);
            $path = Storage::disk('local')->putFile($comic_title,$file);

            $post = Comic::create([
                'comic_title' => $comic_title,
                'series_title' => $series_title,
                'comic_content' => $comic_content,
                'author_name' => $author_name
            ]);
            return response()->json(
                [
                    'message' => 'comic uploaded successfully', 
                    'url' =>  $path
                ]);
        }


        return view('comics.create');
    }

    public function view()
    {
        return view('comics.create');
    }
}
