<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    protected $fillable = [
        'episode_title',
        'episode_caption',
        'series_id',
        'episode_content',
        'episode_url',
        'author_name',
    ];

    public function series(): BelongsTo
    {
        return $this->belongsTo(Series::class);
    }
}
