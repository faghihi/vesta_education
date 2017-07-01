<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';
    public function course()
    {
        return $this->belongsTo('App\Course','course_id');
    }


    /*
     * Voyager controller
     */
    public function courseId()
    {
        return $this->belongsTo('App\Course','course_id');
    }
}
