<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



 
Route::group(['middleware' => ['web']], function(){
	// Authentication Routes
	Route::get('auth/login', ['as'=>'login', 'uses'=>'Auth\AuthController@getLogin']);
	Route::post('auth/login', 'Auth\AuthController@postLogin');
	Route::get('auth/logout', ['as'=>'logout','uses'=>'Auth\AuthController@getLogout']);
	// Registration Routes
	Route::get('auth/register','Auth\AuthController@getRegister');
	Route::post('auth/register','Auth\AuthController@postRegister');
	//PasswordReset Routes
	Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm');
	Route::post('password/email','Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset','Auth\PasswordController@reset');
	//Categories
	Route::resource('categories','CategoryController',['except'=>['create']]);
	Route::resource('tags','TagController',['except'=>['create']]);
	Route::get('category/{name}',  ['as' => 'category.index', 'uses' => 'BlogController@getList']);

	//Comments
	Route::post('comments/{post_id}', ['as' => 'comments.store', 'uses' => 'CommentsController@store']);
	Route::get('comments/{id}/edit', ['as' => 'comments.edit', 'uses' => 'CommentsController@edit']);
	Route::put('comments/{id}', ['as' => 'comments.update', 'uses' => 'CommentsController@update']);
	Route::delete('comments/{id}', ['as' => 'comments.destroy', 'uses' => 'CommentsController@destroy']);
	Route::get('comments/{id}/delete', ['as' => 'comments.delete', 'uses' => 'CommentsController@delete']);

	Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]{5,70}');
	Route::get('blog', ['uses'=> 'BlogController@getIndex', 'as' => 'blog.index']);
	Route::get('/contact', 'PagesController@getContact');
	Route::post('/contact', 'PagesController@postContact');
	Route::get('/about', 'PagesController@getAbout');
	Route::get('/home', 'PagesController@getHome');
	Route::get('/', 'PagesController@getHome');
	Route::post('posts/featured', 'PostController@storeFeatured');
	Route::post('posts/publish/{id}', ['as'=> 'posts.publish', 'uses' => 'PostController@publish']);
	Route::post('posts/redact/{id}', ['as'=> 'posts.redact', 'uses' => 'PostController@redact']);
	Route::resource('posts', 'PostController'); 
});