<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = [
        'content', 'author_id', 'date', 'category_id'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Category()
    {
        return $this->belongsTo('App\Category');
    }

    public function Author()
    {
        return $this->belongsTo('App\Author');
    }

    public function Likes()
    {
        return $this->hasMany('App\Like');
    }
}
