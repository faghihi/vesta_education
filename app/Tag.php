<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    public function courses()
    {
        return $this->belongsToMany('App\Course','course_tag');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','favourites');
    }
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher','teacher_tag');
    }
}
