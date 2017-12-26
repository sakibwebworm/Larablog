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
    /*Named route*/
    public function getRouteKeyName(){
     return 'name';
    }
    /*Grab top categories*/
    public static function topCategories(){
        //grab all the categories
        $topCategories=Category::has('posts')->pluck('name','id');
        //remove the first 5 categories from categories array
        $removeCategories=$topCategories->splice(5);
        return $topCategories;
    }
}
