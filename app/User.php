<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Quotes()
    {
        return $this->hasMany('App\Quote');
    }

    public function Likes()
    {
        return $this->hasMany('App\Like');
    }

    public function already_likes(Quote $quote) {
        $like = Like::where([['user_id', '=', $this->id], ['quote_id', '=', $quote->id]])->get();
        return ($like->count() >= 1 ? true : false);
    }
}
