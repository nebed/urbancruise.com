<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function tags()
    {
    	return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

    public function views()
    {
        return $this->hasMany('App\PostView');
    }

    public function likes()
    {
        return $this->belongsTo('App\Like');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
