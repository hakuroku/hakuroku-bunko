<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Series_image extends Model
{
    protected $primaryKey = 'series_img_id';

    public function series(): BelongsTo {
        return $this->belongsTo('imgs_num');
    }
}
