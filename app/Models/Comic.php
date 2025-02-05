<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comic extends Model
{
    protected $fillable = [
        'comic_title',
        'comic_caption',
        'series_id',
        'comic_content',
        'comic_url',
        'author_name',
        'series_img'
    ];
}


