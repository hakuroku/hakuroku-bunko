<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComicCreateController extends Controller
{
    public function view() {
        return view('comics.create');
    }
}
