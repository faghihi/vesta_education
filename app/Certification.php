<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $table = 'certifications';
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function course()
    {
        return $this->belongsTo('App\Usercourse','course_id');
    }
}