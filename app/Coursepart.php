<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coursepart extends Model
{
    protected $table = 'coursepart';
    public function course()
    {
        return $this->belongsTo('App\Usecourse','course_id');
    }
    
}
