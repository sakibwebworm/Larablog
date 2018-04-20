<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Post;

Route::get('/', 'PostsController@index');
Route::get('/post/{id}', 'PostsController@show');
Route::get('/category/{category}', 'CategoryController@index');
Route::get('/user/{name}','UsersController@show');
Auth::routes();
Route::get('/admin',function(){
    return view('admin.user');
});
Route::get('/home', 'HomeController@index')->name('home');
/*Route::controllers('datatables', 'DatatablesController', [
    'anyData'  => 'datatables.data',
    'getIndex' => 'datatables',
]);*/

Route::get('/getusers', 'UsersController@anyData');

Route::group(
    /*User only routes*/
    array('prefix' => 'admin','middleware' => 'auth'), function () {
    Route::get('/posts',function(){
        return view('admin.posts');
    });
    Route::get('/users',function(){
        return view('admin.user');
    });
    Route::get('/categories',function(){
        return view('admin.categories');
    });
});
Route::get('/getcategories', 'PostsController@anydata');
/*Admin only routes*/

    //user management routes
    Route::get('user/delete/{id}', 'Userscontroller@destroy');
    Route::get('/populateform/user/{id}','Userscontroller@edit');
    Route::post('/updateuser/{id}','Userscontroller@update');
    Route::get('/populateform/post/{id}','Postscontroller@edit');
    Route::get('post/delete/{id}', 'Postscontroller@destroy');
    Route::get('/getposts', 'PostsController@anydata');
    Route::post('/updatecategory/{id}','Categorycontroller@update');
    Route::get('/populateform/category/{id}','Categorycontroller@edit');
    Route::get('category/delete/{id}', 'Categorycontroller@destroy');
    Route::post('/updatepost/{id}','Postscontroller@update');
