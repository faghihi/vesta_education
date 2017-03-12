<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
    public function courses()
    {
        return $this->belongsToMany('App\Course','campaign_course','campaign_id','course_id')
            ->withTimestamps();
    }

}
