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
        return $this->belongsToMany('App\User', 'reviewteacher', 'teacher_id', 'user_id')
            ->withPivot('comment', 'rate', 'enable')
            ->withTimestamps();
    }
    public function fields()
    {
        return $this->belongsToMany('App\Tag','teacher_tag','teacher_id','tag_id');
    }
}
