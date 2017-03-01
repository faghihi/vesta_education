<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usecourse extends Model
{
    protected $table = 'usecourse';
    public function course()
    {
        return $this->belongsTo('App\Course','course_id');
    }
    public function takers()
    {
        return $this->belongsToMany('App\User','takecourse','course_id','user_id');
    }
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher','course_teacher','course_id','teacher_id');
    }
    public function excercises()
    {
        return $this->hasMany('App\Excercise','course_id');
    }
  
}
