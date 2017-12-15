<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class PostsController extends Controller
{
    //homepage
    public function index(){
        $posts=new Post();
        $postsPerPage=$posts->with('comments')->paginate(3);
        $recentpost=$posts->grabRecentPosts();
        return view('frontend.master',compact('postsPerPage','recentpost'));
    }
    /*show single post*/
    public function show($id){
        $postObject=new Post();
        $singlePost=$postObject->with('user')->findOrFail($id);
        $singlepostComments=$postObject->grabSinglePostComments($id);
        return view('frontend.single_post', compact('singlePost','singlepostComments'));
    }
}
