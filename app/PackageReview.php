<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageReview extends Model
{
    protected $table = 'reviewpackage';
    protected $fillable = ['comment','enable','rate'];
    /**
     * Get the post that owns the comment.
     */
    public function Package()
    {
        return $this->belongsTo('App\Package');
    }
}
