<?php

namespace App;
use DB;
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
        return $this->belongsToMany(Category::class, 'category_post')->withTimestamps();
    }
    /*Grab recent posts*/
    public static function grabRecentPosts(){
        $recentPosts = DB::table('posts')->select('id','title')->orderBy('id')->limit(5)->get();
        return $recentPosts;
    }
    /*Grab comments with username*/
    public function grabSinglePostComments($id){
    $singlePostComments=DB::table('users')
        ->join('comments', 'users.id', '=', 'comments.author_id')
        ->select('name', 'img_path', 'content','posted_at')
        ->where('post_id', '=', $id)
        ->get();
    return $singlePostComments;
    }
    /*Grab recent comments*/
    public static function  grabRecentComments(){
        $recentComments=DB::table('users')
            ->join('comments', 'users.id', '=', 'comments.author_id')
            ->join('posts', 'posts.id', '=', 'comments.post_id')
            ->select('name', 'title','posts.id')
            ->limit(3)
            ->get();
        return $recentComments;
    }
    /*Grab posts by category*/
    /*Post Archieve by month*/
    public function postArchieve(){
        //select MONTHNAME(created_at) as month,count(posts.id) from posts group by month
        $archieves=DB::table('posts')
            ->select(DB::raw('MONTHNAME(created_at) as month,count(posts.id) as count'))
            ->groupBy('month')
            ->get();
        return $archieves;
    }
   /**/
}
