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

Route::get('/', [
	'uses' 	=> 'BlogController@index',
	'as' 	=> 'blog'
]);

Route::get('/blog/{post}', [
	'uses' 	=> 'BlogController@show',
	'as' 	=> 'blog.post'
]);

Route::get('/category/{category}', [
	'uses'	=> 'BlogController@category',
	'as' 	=> 'category'
]);

Route::get('/author/{author}', [
	'uses'	=> 'BlogController@author',
	'as' 	=> 'author'
]);

Route::get('/tag/{tag}', [
	'uses'	=> 'BlogController@tag',
	'as' 	=> 'tag'
]);

Route::post('/blog/{blog}/comments', [
	'uses'	=> 'CommentsController@store',
	'as' 	=> 'blog.comments'
]);

Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');
Route::get('/edit-account', 'Backend\HomeController@edit');
Route::put('/edit-account', 'Backend\HomeController@update');

Route::put('/backend/blog/restore/{blog}', [
	'uses'	=> 'Backend\BlogController@restore',
	'as' 	=> 'blog.restore'
]);

Route::delete('/backend/blog/force-destroy/{blog}', [
	'uses'	=> 'Backend\BlogController@forceDestroy',
	'as' 	=> 'blog.force-destroy'
]);

Route::get('/error/403', [
	'uses'	=> 'Backend\BackendController@error403'
]);

Route::post('/signout', 'Auth\LoginController@userLogout')->name('signout');

Route::resource('/backend/blog', 'Backend\BlogController');

Route::resource('/backend/categories', 'Backend\CategoriesController');

Route::get('/backend/users/confirm/{user}', [
	'uses'	=> 'Backend\UsersController@confirm',
	'as'	=> 'users.confirm'
]);
Route::resource('/backend/users', 'Backend\UsersController');

Route::get('/categories-data', [
	'uses'	=> 'Backend\CategoriesController@data',
	'as'	=> 'categories.data'
]);

Route::get('/users-data', [
	'uses'	=> 'Backend\UsersController@data',
	'as'	=> 'users.data'
]);

Route::get('/blog-data', [
	'uses'	=> 'Backend\BlogController@data',
	'as'	=> 'blog.data'
]);