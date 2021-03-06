<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Entry;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accounts()
    {
        return $this->hasMany('App\SocialAccount');
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function hasEntry(Entry $entry)
    {
        return $this->entries()->where('id', $entry->id)->exists();
    }
}
