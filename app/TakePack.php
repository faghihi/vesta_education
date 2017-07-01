<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TakePack extends Model
{
    //
    protected $table='takepack';


    /*
     * Voyager relationships
     */

    public function PackageId()
    {
        return $this->belongsTo('App\Package');
    }
    public function userId()
    {
        return $this->belongsTo('App\User');
    }
}
