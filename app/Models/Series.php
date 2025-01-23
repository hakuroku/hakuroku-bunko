<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Series extends Model
{
   
    protected $fillable = [
        'series_title',
        'series_caption',
        'top_icon_role',
        'top_main_img',
        'top_link_img',
    ];

    public function comic(): HasMany {
        return $this->hasMany(Comic::class);
    }
}
