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
        return $this->belongsToMany('App\Usecourse','takecourse','user_id','course_id');
    }
    public function packages()
    {
        return $this->belongsToMany('App\Package','takepack');
    }
    public function favourites()
    {
        return $this->belongsToMany('App\Tag','favourites');
    }
    public function coursereviews()
    {
        return $this->belongsToMany('App\Usecourse','reviewcourse','user_id','course_id');
    }
    public function teacherreviews()
    {
        return $this->belongsToMany('App\Teacher','reviewteacher','user_id','course_id');
    }
    public function certifications()
    {
        return $this->hasMany('App\Course','');
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
