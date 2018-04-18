<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Yajra\DataTables\Facades\DataTables;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('datatables.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $posts = Post::select(['id', 'user_id', 'title','body', 'created_at', 'updated_at'])->get();
        return Datatables::of($posts)
            ->addColumn('action', function ($post) {
                return '<a href="#edit-'.$post->id.'" class="btn btn-xs btn-primary" data-edit="'.$post->id.'" onclick=" populateForm('.$post->id.')"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="#delete-'.$post->id.'" class="btn btn-xs btn-danger" data-delete="'.$post->id.'"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }
    //homepagecate
    public function index(Post $posts,Request $request){
        if(!$request->has('author_id')){
            $postsPerPage=$posts->with('comments')->paginate(3);
        }
        else if ($request->has('author_id')){
            $postsPerPage=$posts->where('user_id',$request->get('author_id'))->with('comments')->get();
        }
        //archieve
        $archieve=$posts->postArchieve();
        return view('frontend.master',compact('postsPerPage','recentComments','archieve'));
    }
    /*show single post*/
    public function show($id){
        $postObject=new Post();
        $singlePost=$postObject->with('user')->findOrFail($id);
        $categories=$postObject->findOrFail($id)->categories;
        $singlepostComments=$postObject->grabSinglePostComments($id);
        return view('frontend.single_post', compact('singlePost','singlepostComments','categories'));
    }
    /*Show edit form*/
    public function edit($id){
        $post=new Post();
        $postWithcategory=$post::with('categories')->findOrFail($id);
        $allCategory=Category::all();
        return view('admin.editpost',compact('postWithcategory','allCategory'));
    }
    /*Show recent comment with username*/
    public function showCommentsWithUSername(){

    }
    /*Grab popular categories*/
    public function grabPopularcategories(){

    }
}
