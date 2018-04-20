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
                return '<a href="#edit-'.$post->id.'" class="btn btn-xs btn-primary" data-edit="'.$post->id.'" onclick=" populateForm('.$post->id.')"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="post/delete/'.$post->id.'" class="btn btn-xs btn-danger" data-delete="'.$post->id.'"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
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
        //get the post
        $post=Post::findOrFail($id);
        //get the category or categories for the post
        $post_categories=$post->findOrFail($id)->categories()->pluck('id')->toArray();
        //get all the categories
        $allCategory=Category::all();
        return view('admin.editpost',compact('post','post_categories','allCategory'));
    }
    public function update(Request $request, $id)
    {
        //
        $post=Post::findOrFail($id);
        $post->update($request->only('name','body'));
        $allcategory=$post->findOrFail($id)->categories()->pluck('id')->toArray();
        foreach($request->category as $category){
            if(!in_array($category,$allcategory)){
                $post->categories()->attach($category);
            }
            foreach($allcategory as $category){
                if(!in_array($category,$request->category)){
                    $post->categories()->detach($category);
                }
            }
        }

        return back();
    }
    public function destroy($id)
    {
        Post::destroy($id);
        \Session::flash('flash_message', 'Post has been deleted!');
        return back();
    }

    /*Show recent comment with username*/
    public function showCommentsWithUSername(){

    }
    /*Grab popular categories*/
    public function grabPopularcategories(){

    }
}
