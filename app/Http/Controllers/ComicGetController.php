<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ComicGetController extends Controller
{
    public function get() {
        $path = Storage::url('app/');
        $comic = Comic::all();

        return $comic;
    }

    
}
