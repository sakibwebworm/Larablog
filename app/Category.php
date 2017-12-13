<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    /*A category can belongs to many posts*/
    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
