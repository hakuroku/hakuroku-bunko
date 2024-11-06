<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    public function view() {
        return view('comics.create');
    }
}
