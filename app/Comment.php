<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\TimestampsTrait;

class Comment extends Model
{
    use TimestampsTrait;

    //
    protected $fillable = [ 'body' ];

    public function entry() {
        return $this->belongsTo('App\Comment');
    }

    public function user() {
        return $this->belongsTo('App\Comment');
    }
}
