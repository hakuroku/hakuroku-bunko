<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Series_image extends Model
{
    protected $primaryKey = 'series_img_id';

    public function series(): HasOne {
        return $this->hasOne('imgs_num');
    }
}
