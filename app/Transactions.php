<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table='transactions';

    public function userId()
    {
        return $this->belongsTo('App\User');
    }
}
