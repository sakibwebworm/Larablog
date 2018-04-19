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
Route::get('/posts',function(){
    return view('admin.posts');
});
Route::get('/categories',function(){
    return view('admin.categories');
});
Route::get('user/delete/{id}', 'Userscontroller@destroy');
Route::get('/getposts', 'PostsController@anydata');
Route::get('/getcategories', 'CategoryController@anydata');
//Route::get('/populateform/user/{id}','PagesController@populateFormdata');
Route::get('/populateform/user','PagesController@populateForm');
Route::get('/populateform/user/{id}','Userscontroller@edit');
Route::get('/populateform/post/{id}','Postscontroller@edit');
Route::post('/updateuser/{id}','Userscontroller@update');
Route::post('/updatepost/{id}','Postscontroller@update');