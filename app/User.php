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
        return $this->belongsToMany('App\Usecourse','takecourse','user_id','course_id')
            ->withPivot('paid','discount_used')
            ->withTimestamps();
    }
    public function packages()
    {
        return $this->belongsToMany('App\Package','takepack','user_id','pack_id')
            ->withPivot('paid','discount_used')
            ->withTimestamps();
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
        return $this->belongsToMany('App\Teacher','reviewteacher','user_id','teacher_id');
    }
    public function certification()
    {
        return $this->belongsToMany('App\Course', 'certifications','user_id','course_id');
    }
    public function finance()
    {
        return $this->hasOne('App\Finance','user_id');
    }
    public function discount()
    {
        return $this->hasOne('App\Userdiscount','user_id');
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'mobile', 'password','activated','image'
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
