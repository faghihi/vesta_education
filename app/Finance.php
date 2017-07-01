<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    protected $table = 'userfinance';
    /**
     * Get the phone record associated with the user.
     */
    public function user()
    {
        return $this->hasOne('App\User');
    }


    /*
     * Voyager relations
     */
    public function userId()
    {
        return $this->belongsTo('App\User');
    }


    protected $fillable = ['amount','user_id'];
}
