<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait TimestampsTrait
{
    public function getCreatedAtTzAttribute()
    {
        return Carbon::parse($this->created_at)->timezone('Asia/Tokyo');
    }

    public function getUpdatedAtTzAttribute()
    {
        return Carbon::parse($this->updated_at)->timezone('Asia/Tokyo');
    }
}
