<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userdiscount extends Model
{
    protected $table="user_discount";
    public function user()
    {
        return $this->hasOne('App\User');
    }
}
