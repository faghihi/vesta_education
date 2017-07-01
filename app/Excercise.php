<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Excercise extends Model
{
    protected $table = 'excercises';
    public function course()
    {
        return $this->belongsTo('App\Usecourse','course_id');
    }

    /*
     * Voyager relationships
     */

    public function courseId()
    {
        return $this->belongsTo('App\Usecourse','course_id');
    }
}
