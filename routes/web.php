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

Route::get('/contact', [
	'uses' 	=> 'BlogController@contact',
	'as' 	=> 'contact'
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

Route::get('/roles-data', [
	'uses'	=> 'Backend\RolesController@data',
	'as'	=> 'roles.data'
]);

VisitStats::routes();

Route::resource('backend/permissions', 'Backend\PermissionsController');
Route::resource('/backend/roles', 'Backend\RolesController');

Route::get('/pusher', function () {
	event(new App\Events\NewComment('livi'));
	return redirect()->route('blog.data');
});
Route::get('/backend/sosmeds', [
	'uses'	=> 'Backend\SosmedController@index',
	'as'	=> 'sosmeds.index'
]);

Route::put('/backend/sosmeds', [
	'uses'	=> 'Backend\SosmedController@update',
	'as'	=> 'sosmeds.update'
]);
Route::resource('/backend/comments', 'Backend\CommentsController');

Route::get('backend/about', [
	'uses'	=>	'Backend\AboutController@index',
	'as'	=>	'about.index'
]);

Route::put('backend/about', [
	'uses'	=>	'Backend\AboutController@update',
	'as'	=>	'about.update'
]);

Route::get('/about', [
	'uses'	=>	'BlogController@about',
	'as'	=>	'about'
]);

Route::resource('/backend/tags', 'Backend\TagsController');
Route::get('/register', [
	'uses'	=> 'Auth\RegisterController@register',
	'as'	=> 'register.create'
]);

Route::post('/register', [
	'uses'	=> 'Auth\RegisterController@store',
	'as'	=> 'register.store'
]);
