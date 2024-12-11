<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Comic;

class GetComicController extends Controller
{
    public function get() {
        // $path = Storage::url('app/private');
        $comic_info = Comic::all();

        $data =  $comic_info;
        return $data;
    }
}
