<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usecourse extends Model
{
    protected $table = 'usecourse';
    protected $fillable = ['activated'];
    public function course()
    {
        return $this->belongsTo('App\Course','course_id');
    }
    public function takers()
    {
        return $this->belongsToMany('App\User','takecourse','course_id','user_id')
            ->withPivot('paid','discount_used')
            ->withTimestamps();
    }
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher','course_teacher','course_id','teacher_id')
            ->withTimestamps();
    }
    public function excercises()
    {
        return $this->hasMany('App\Excercise','course_id');
    }
    public function reviews()
    {
        return $this->belongsToMany('App\User','reviewcourse','course_id','user_id')
            ->withPivot('comment','rate','enable')
            ->withTimestamps();
    }

    public function certifiedusers()
    {
        return $this->belongsToMany('App\User', 'certifications','course_id','user_id')
            ->withPivot('score')
            ->withTimestamps();
    }

    public function coursepart()
    {
        return $this->hasOne('App\Coursepart','course_id');
    }
    public function campaigns()
    {
        return $this->belongsToMany('App\Usecourse','campaign_course','campaign_id','course_id')
            ->withTimestamps();
    }

    public function packages()
    {
        return $this->belongsToMany('App\Package','pack_course','course_id','pack_id')
            ->withTimestamps();
    }

    public function discounts()
    {
        return $this->hasMany('App\Discount','course_id');
    }

    /*
     * Voyager relations
     */
    public function courseId()
    {
        return $this->belongsTo('App\Course','course_id');
    }

    public function voyagerteachers()
    {
        return $this->belongsToMany('App\Teacher','course_teacher','course_id','teacher_id')
            ->withTimestamps();
    }

}
