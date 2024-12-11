<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comic extends Model
{
    protected $primaryKey = 'comic_id';

    protected $fillable = [
        'comic_title',
        'series_title',
        'comic_content',
        'author_name',
        'series_img'
    ];

    public function series(): BelongsTo {
        return $this->belongsTo(Series::class);
    }
}


