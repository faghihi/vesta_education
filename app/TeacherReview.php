<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherReview extends Model
{
    protected $table = 'reviewteacher';
    protected $fillable = ['comment','enable','rate'];
    /**
     * Get the post that owns the comment.
     */

}
