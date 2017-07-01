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
    public function tags()
    {
        return $this->belongsToMany('App\Tag','course_tag','course_id','tag_id')
            ->withTimestamps();
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
        return $this->belongsToMany('App\User', 'reviewcourse', 'course_id', 'user_id')
            ->withPivot('comment', 'rate', 'enable')
            ->withTimestamps();
    }

    /*
     * Voyager relations
     */
    public function categoryId()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function voyagertags()
    {
        return $this->belongsToMany('App\Tag','course_tag','course_id','tag_id')
            ->withTimestamps();
    }



}
