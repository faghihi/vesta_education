<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $table='certifications';


    /*
     * Voyager relations
     */

    public function userId(){
        return $this->belongsTo(User::class);
    }
    public function courseId(){
        return $this->belongsTo(Usecourse::class);
    }
}
