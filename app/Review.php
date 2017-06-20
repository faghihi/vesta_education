<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviewpackage';
    protected $fillable = ['comment','enable'];
    /**
     * ManyToMany with Section Table
     * Pivot table is section_reviews table
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function package()
    {
        return $this->belongsToMany('App\Package', 'reviewpackage')
            ->withPivot('comment','rate','enable')
            ->withTimestamps();
    }
}
