<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait TimestampsTrait
{
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Tokyo');
    }
}
