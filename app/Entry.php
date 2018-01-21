<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

use Parsedown;

use App\Traits\TimestampsTrait;

class Entry extends Model
{

    use TimestampsTrait;

    protected $fillable = ['title', 'body'];

    public function author()
    {
        return $this->belongsTo('App\User');
    }

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
