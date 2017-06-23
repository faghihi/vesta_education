<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    public function courses()
    {
        return $this->belongsToMany('App\Course','pack_course','pack_id','course_id')
            ->withPivot('start_date','time','location','price')
            ->withTimestamps();
    }
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher','pack_teacher','pack_id','teacher_id')
            ->withTimestamps();
    }
    public function users()
    {
        return $this->belongsToMany('App\User','takepack','pack_id','user_id')
            ->withPivot('paid','discount_used')
            ->withTimestamps();
    }
    public function reviews()
    {
        return $this->belongsToMany('App\User', 'reviewpackage','package_id','user_id')
            ->withPivot('comment', 'rate', 'enable')
            ->withTimestamps();
    }
//    public function users_take()
//    {
//        return $this->belongsToMany('App\User', 'takecourse')
//            ->withPivot('paid','discount_used')
//            ->withTimestamps();
//    }
    protected $fillable = [
        'title', 'image', 'description', 'open_time','requirement','condition','work_description','work_start','goal','duration','price'
    ];
}
