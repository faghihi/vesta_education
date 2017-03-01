<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    public function courses()
    {
        return $this->belongsToMany('App\Usecourse');
    }
    public function review()
    {
        return $this->belongsTo('App\User');
    }
    public function fields()
    {
        return $this->belongsToMany('App\Tag');
    }
}
