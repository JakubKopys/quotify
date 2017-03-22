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

Route::get('/', function () {
    if (Auth::guest())
        return view('auth.login');
    else
        return Redirect::to('/home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Users routes
Route::get('/users', 'UsersController@index');
Route::get('/users/{user}', 'UsersController@show');
Route::get('/users/{user}/edit', 'UsersController@edit');
Route::patch('/users/{user}', 'UsersController@update');
//TODO: delete user

//Quotes routes
Route::get('/quotes/new', 'QuotesController@new');
Route::get('/quotes/{quote}', 'QuotesController@show');
Route::post('/quotes', 'QuotesController@create');
Route::get('/quotes/{quote}/edit', 'QuotesController@edit');
Route::patch('/quotes/{quote}', 'QuotesController@update');
//TODO: delete quote

//Categories routes
Route::get('/categories', 'CategoriesController@index');
Route::get('/categories/new', 'CategoriesController@new');
Route::get('/categories/{slug}', 'CategoriesController@show');
Route::post('/categories', 'CategoriesController@create');
Route::patch('/categories/{category}/edit', 'CategoriesController@edit');
Route::patch('/categories/{category}', 'CategoriesController@update');
//TODO: delete category

//Authors routes
Route::get('/authors', 'AuthorsController@index');
Route::get('/authors/new', 'AuthorsController@new');
Route::get('/authors/{author}', 'AuthorsController@show');
Route::post('/authors', 'AuthorsController@create');

//Likes routes
Route::post('/quotes/{quote}/likes', 'LikesController@create');
Route::delete('/quotes/{quote}/likes', 'LikesController@destroy');
