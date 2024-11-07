<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = [
        'comic_title',
        'series_title',
        'comic_content',
        'author_name'
    ];
}
