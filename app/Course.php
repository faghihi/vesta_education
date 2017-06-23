<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function packages()
    {
        return $this->belongsToMany('App\Package','pack_course','course_id','pack_id')
        ->withPivot('start_date', 'time', 'location','price')
        ->withTimestamps();
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag','course_tag','course_id','tag_id');
    }
    public function usecourse()
    {
        return $this->hasMany('App\Usecourse','course_id');
    }
    public function sections()
    {
        return $this->hasMany('App\Section','course_id');
    }
    public function reviews()
    {
        return $this->hasMany('App\CourseReview','course_id','user_id');
    }
}
