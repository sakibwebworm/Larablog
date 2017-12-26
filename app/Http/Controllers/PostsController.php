<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class PostsController extends Controller
{
    //homepagecate
    public function index(Post $posts){
        $postsPerPage=$posts->with('comments')->paginate(3);
        $categories= $posts->categories;
        return view('frontend.master',compact('postsPerPage','recentComments'));
    }
    /*show single post*/
    public function show($id){
        $postObject=new Post();
        $singlePost=$postObject->with('user')->findOrFail($id);
        $categories=$postObject->findOrFail($id)->categories;
        $singlepostComments=$postObject->grabSinglePostComments($id);
        return view('frontend.single_post', compact('singlePost','singlepostComments','categories'));
    }
    /*Show recent comment with username*/
    public function showCommentsWithUSername(){

    }
    /*Grab popular categories*/
    public function grabPopularcategories(){

    }
}
