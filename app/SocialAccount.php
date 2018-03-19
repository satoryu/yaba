<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $fillable = ['provider_name', 'provider_id', 'avatar_url'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
