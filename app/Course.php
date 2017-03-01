<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    public function category()
    {
        return $this->hasOne('App\Category');
    }
    public function packages()
    {
        return $this->belongsToMany('App\Package');
    }
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
    public function usecourse()
    {
        return $this->belongsTo('App\Usecourse');
    }
    
}
