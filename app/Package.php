<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    public function courses()
    {
        return $this->belongsToMany('App\Course','pack_course');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','takepack');
    }
//    public function users_take()
//    {
//        return $this->belongsToMany('App\User', 'takecourse')
//            ->withPivot('paid','discount_used')
//            ->withTimestamps();
//    }
}
