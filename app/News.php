<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title', 'content', 'page_number', 'image'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }
    
}
