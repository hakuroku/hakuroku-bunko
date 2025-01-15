<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Series extends Model
{
    protected $primaryKey = 'series_id';
   
    protected $fillable = [
        'series_title',
        'series_caption'
    ];

    public function comic(): HasMany {
        return $this->hasMany(Comic::class);
    }

    public function series_imgs(): BelongsTo {
        return $this->belongsTo('series_imgs_id');
    }
}
