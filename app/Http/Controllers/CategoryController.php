<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
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

    private function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:categories'
        ]);
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $categories = Category::select(['id', 'name', 'created_at', 'updated_at'])->get();
        return Datatables::of($categories)
            ->addColumn('action', function ($categories) {
                return '<a href="#edit-'.$categories->id.'" class="btn btn-xs btn-primary" data-edit="'.$categories->id.'" onclick=" populateForm('.$categories->id.')"><i class="glyphicon glyphicon-edit"></i> Edit</a><a href="/category/delete/'.$categories->id.'" class="btn btn-xs btn-danger" data-delete="'.$categories->id.'"><i class="glyphicon glyphicon-edit"></i> Delete</a>';
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
      $postsPerPage=$category->find($category->id)->posts;
      return view('frontend.master',compact('postsPerPage'));
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //get the category
        $category=Category::findOrFail($id);
        return view('admin.editcategory',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category=Category::findOrFail($id);
        $this->validator($request->all())->validate();
        $category->update($request->all());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Category::destroy($id);
        \Session::flash('flash_message', 'Category has been deleted!');
        return back();
    }
}
