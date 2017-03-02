<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    public function discount()
    {
        return $this->hasOne('App\Discount','');
    }
    public function category()
    {
        return $this->hasOne('App\Category', 'category_id');
    }
    public function packages()
    {
        return $this->belongsToMany('App\Package','pack_course');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag','course_tag');
    }
    public function usecourse()
    {
        return $this->hasMany('App\Usecourse','course_id');
    }
    public function sections()
    {
        return $this->hasMany('App\Section','course_id');
    }
//    public function users_take()
//    {
//        return $this->belongsToMany('App\User', 'takecourse')
//            ->withPivot('paid','discount_used')
//            ->withTimestamps();
//    }

}
