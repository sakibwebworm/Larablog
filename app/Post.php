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
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
    /*Grab recent comments*/
    public function grabRecentComments(){
       return $this->comments()->with($this->user());
    }
    /*Grab recent posts*/
    public function grabRecentPosts(){
        $recentPosts = DB::table('posts')->select('title')->orderBy('id')->limit(5)->get();
        return $recentPosts;
    }
    /*Grab number of comments*/
    public function getTotalCommentsAttribute()
    {
        return $this->hasMany('Post')->whereUserId($this->author_id)->count();
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
}
