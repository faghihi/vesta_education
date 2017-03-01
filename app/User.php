<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    public function courses()
    {
        return $this->belongsToMany('App\Usecourse');
    }
    public function packages()
    {
        return $this->belongsToMany('App\Package');
    }
    public function favourites()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function reviewcourses()
    {
        return $this->hasMany('App\Reviewcourse');
    }
    public function reviewteachers()
    {
        return $this->hasMany('App\Reviewteacher');
    }
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
}
