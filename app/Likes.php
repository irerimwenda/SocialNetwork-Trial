<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    public $with = ['user'];
    
    public function post() {
        return $this->belongsTo('App\Post');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
