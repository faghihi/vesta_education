<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    public function courses()
    {
        return $this->belongsToMany('App\Usecourse','course_teacher','teacher_id','course_id');
    }
    public function reviews()
    {
        return $this->belongsToMany('App\User','reviewteacher');
    }
    public function fields()
    {
        return $this->belongsToMany('App\Tag','teacher_tag');
    }
}
