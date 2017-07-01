<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    public function courses()
    {
        return $this->belongsToMany('App\Usecourse','pack_course','pack_id','course_id')
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



    /*
     * Voyager Relations
     */
    public function voyagercourses(){
        return $this->belongsToMany('App\Usecourse','pack_course','pack_id','course_id')
            ->withTimestamps();
    }


    protected $fillable = [
        'title', 'image', 'description', 'open_time','requirement','condition','work_description','work_start','goal','duration','price'
    ];
}
