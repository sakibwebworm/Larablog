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

Route::get('/test',function(){
   dd(Post::where(id,1)) ;
});