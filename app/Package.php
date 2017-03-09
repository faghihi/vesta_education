<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    public function courses()
    {
        return $this->belongsToMany('App\Course','pack_course','pack_id','course_id')
            ->withPivot('start','price')
            ->withTimestamps();
    }
    public function users()
    {
        return $this->belongsToMany('App\User','takepack','pack_id','user_id')
            ->withPivot('paid','discount_used')
            ->withTimestamps();
    }
//    public function users_take()
//    {
//        return $this->belongsToMany('App\User', 'takecourse')
//            ->withPivot('paid','discount_used')
//            ->withTimestamps();
//    }
}
