<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Series;

class GetSeriesController extends Controller
{
    public function get() {
        
        $data = Series::all();

        return $data;
    }
}
