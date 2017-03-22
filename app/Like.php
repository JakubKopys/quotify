<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id', 'quote_id'
    ];

    public function User()
    {
        return $this->belongsTo('App\User');
    }

    public function Quote()
    {
        return $this->belongsTo('App\Quote');
    }
}
