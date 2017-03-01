<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usecourse extends Model
{
    protected $table = 'usecourse';
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    public function teachers()
    {
        return $this->belongsToMany('App\Teacher');
    }
    public function excercises()
    {
        return $this->hasMany('App\Excercise');
    }
    public function sections()
    {
        return $this->hasMany('App\Section');
    }
}
