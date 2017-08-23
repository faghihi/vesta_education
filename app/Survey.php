<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'surveys';

    protected $fillable = [
        'question'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }
    
    public function users()
    {
        return $this->belongsToMany('App\User','user_survey','survey_id','user_id')
            ->withPivot('answer', 'rate', 'item')
            ->withTimestamps();
    }


}
