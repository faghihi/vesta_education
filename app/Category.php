<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Redis;
use Cache;


class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['id','name','description'];
    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function fetchAll()
    {
        $result = Cache::remember('categories_cache',10,function (){
            return $this->get();
        });
        return $result;
    }

    public function fetch($id)
    {
        $this->id = $id;
        $storage = Redis::connection();
        $storage->pipeline(function ($pipe)
        {
            $pipe->zIncrBy('courseViews',1,'course:'.$this->id);
            $pipe->incr('course:'.$this->id.':views');
        });
        return $this->where('id',$id)->first();
    }

    public function getCategoryViews($id)
    {
        $storage = Redis::connection();
        return $storage->get('course:'.$id.':views');
    }
}
