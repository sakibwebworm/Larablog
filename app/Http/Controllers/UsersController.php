<?php

namespace App\Http\Controllers;

use App\Profile;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
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
        $users = User::select(['id', 'name', 'email', 'created_at', 'updated_at'])->get();
        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary" data-edit="'.$user->id.'" onclick=" populateForm('.$user->id.')"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="/user/delete/'.$user->id.'" class="btn btn-xs btn-danger "  data-delete="'.$user->id.'" ><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name,User $user)
    {
        //replace '-' with empty space
        $nameOfAUser=$user->replace($name);
        //find the user with the name
        $singleUser=user::where('name',$nameOfAUser)->firstOrFail();
       //find profile for the user
        $profile=$singleUser->profile()->findOrFail($singleUser->id);
        //number of posts
        $numberOfPosts=$singleUser->posts()->count();
       //number of comments
        $numberOfComments=$singleUser->comments()->count();

        return view('frontend.user',compact('singleUser','profile','numberOfPosts','numberOfComments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=new User();
        $user=User::with('profile','roles')->findOrFail($id);
        $userRole=$user->roles()->pluck('name');
        $roles=Role::all()->pluck('name');
        return view('frontend.edituser',compact('user','userRole','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       $user=User::findOrFail($id);
       $user->name=$request->name;
       $user->save();
       $data=$request->all();
       if($request->has('picture')){
        $getimageName = time() . '.' . $request->picture->getClientOriginalExtension();
        $request->picture->move(public_path('images'), $getimageName);
        $data['picture'] = '/images/' . $getimageName;
        }
       $user->profile->update($data);
       $user->roles()->sync($request->role);
       //session
        \Session::flash('flash_message', 'Update Successful!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::destroy($id);
        \Session::flash('flash_message', 'User has been deleted!');
        return back();
    }
}
