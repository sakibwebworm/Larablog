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
    array('middleware' => 'auth'), function () {
    Route::get('/createpost','PostsController@createpost');
    Route::post('/addpost','PostsController@addpost');
    Route::get('/createcategory','CategoryController@create');
    Route::post('/addcategory','CategoryController@store');
});

Route::group(
    /*User only routes*/
    array('prefix' => 'admin','middleware' => 'auth'), function () {
    Route::get('/posts',function(){
        return view('admin.posts');
    });
    Route::get('/categories',function(){
        return view('admin.categories');
    });
    Route::post('/savepost','PostsController@savepost');

});
Route::get('/getcategories', 'PostsController@anydata');
/*Admin only routes
 *User management routes can only be accessed by admin
 * Delete and update can only be done by admin
*/
Route::group(
    ['middleware' => 'App\Http\Middleware\AdminMiddleware'], function () {
    //user managment posts
    Route::get('/admin/users',function(){return view('admin.user');});
    Route::post('/updateuser/{id}','Userscontroller@update');
    Route::get('user/delete/{id}', 'Userscontroller@destroy');
    Route::get('/populateform/user/{id}','Userscontroller@edit');
    //post management

});
    //user management routes


    Route::post('/updatepost/{id}','Postscontroller@update');
    Route::get('/populateform/post/{id}','Postscontroller@edit');
    Route::get('/getcategories','Categorycontroller@anydata');
    Route::get('/getposts', 'PostsController@anydata');
    Route::post('/updatecategory/{id}','Categorycontroller@update');
    Route::get('/populateform/category/{id}','Categorycontroller@edit');
    Route::get('category/delete/{id}', 'Categorycontroller@destroy');

