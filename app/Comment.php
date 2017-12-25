<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\TimestampsTrait;

class Comment extends Model
{
    use TimestampsTrait;

    //
    protected $fillable = [
        'name', 'body', 'email'
    ];
}
