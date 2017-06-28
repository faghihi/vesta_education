<?php

namespace App;

use App\Notifications\MyOwnResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Notification;

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
        return $this->belongsToMany('App\Tag','favourites','user_id','tag_id');
    }
    public function coursereviews()
    {
        return $this->belongsToMany('App\Usecourse','reviewcourse','user_id','course_id');
    }
    public function teacherreviews()
    {
        return $this->belongsToMany('App\Teacher','reviewteacher','user_id','teacher_id');
    }
    public function packagereviews()
    {
        return $this->belongsToMany('App\Package','reviewpackage','user_id','package_id')
            ->withPivot('comment','rate','enable')
            ->withTimestamps();
    }
    public function certification()
    {
        return $this->belongsToMany('App\Course', 'certifications','user_id','course_id');
    }
    public function finance()
    {
        return $this->hasOne('App\Finance','user_id');
    }
    public function discounts()
    {
        return $this->hasMany('App\Userdiscount','user_id');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MyOwnResetPassword($token));
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
