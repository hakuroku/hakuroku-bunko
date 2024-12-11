<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ComicGetController extends Controller
{
    public function get() {
        // $path = Storage::url('app/private');
        $comic_info = Comic::all();

        $data =  $comic_info;
        return $data;
    }
}
