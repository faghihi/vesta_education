<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $table="discounts";
    public function course()
    {
        return $this->belongsTo('App\Usecourse','course_id');
    }

    protected $fillable=['code','type','value','count'];
}
