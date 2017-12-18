<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Entry extends Model
{
    public static function getRecentEntries()
    {
        return self::orderBy('created_at', 'desc')->take(7);
    }

    public function renderBody()
    {
        return Parsedown::instance()
                ->setBreaksEnabled(true)
                ->setUrlsLinked(true)
                ->text($this->body);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment', 'entry_id');
    }
}
