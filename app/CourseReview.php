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
        return $this->belongsTo('App\Usecourse');
    }

    /*
     * voyager relations
     */
    public function courseId()
    {
        return $this->belongsTo('App\Usecourse');
    }
    public function userId()
    {
        return $this->belongsTo('App\User');
    }

}
