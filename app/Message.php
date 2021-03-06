<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table='messages';

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }


    /*
     * Voyager relationships
     */
    public function userId()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
