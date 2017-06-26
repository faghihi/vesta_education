<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    protected $table = 'reviewcourse';
    protected $fillable = ['comment','enable','rate'];
    /**
     * Get the post that owns the comment.
     */
    public function Course()
    {
        return $this->belongsTo('App\Course');
    }


}
