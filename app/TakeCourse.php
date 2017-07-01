<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TakeCourse extends Model
{
    //
    protected $table='takecourse';


    /*
    * voyager relations
    */
    public function courseId()
    {
        return $this->belongsTo('App\Usecourse');
    }
    public function userId()
    {
        return $this->belongsTo('App\User');
    }

}
