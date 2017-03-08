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
        return $this->hasOne('App\User','user_id');
    }

}
