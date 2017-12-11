<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    public static function getRecentEntries()
    {
        return self::orderBy('created_at', 'desc')->take(7);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'entry_id');
    }
}
