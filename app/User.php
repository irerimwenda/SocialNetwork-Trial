<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Storage;

class User extends Authenticatable
{
    use Notifiable;
    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'slug', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public $with = ['profile'];

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    //accessors
    public function getAvatarAttribute($avatar) {
        return asset(Storage::url($avatar)); 
    }

}
