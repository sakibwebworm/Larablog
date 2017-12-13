<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    /*A post belongs to a user*/
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    /*A post can have many comments*/
    public function comments()
    {
        return $this->hasMany(Comment::class, 'author_id');
    }
    /*A post can have many category*/
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
}
