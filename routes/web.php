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

Route::get("/", function(){return view('pages.index');});

Route::get('/admin', 'AdminsController@getIndex')->name('home');
// Route::get('disease/{cat_slug}', 'DiseasesController@getIndex')->name('index');
// Route::get('disease/{cat_slug}/{post_slug}', 'DiseasesController@getSingle')->name('single');

Route::resource('pages', 'PagesController');
Route::get('page/{slug}', 'PagesController@getPage')->name('page');
Route::resource('posts', 'PostsController');
Route::resource('reservations', 'ReservationsController');
Route::resource('categories', 'CategoriesController');
Route::resource('comments', 'CommentsController');
Route::post('comments/{comment}/approve', 'CommentsController@approveComment')->name('comment.approve');
Route::post('comments/{comment}/unapprove', 'CommentsController@unapproveComment')->name('comment.unapprove');
Route::get('search/{sa?}', 'SearchesController@getAIndex')->where('sa', '[\w\d]+');
Route::get('searching/{su?}', 'SearchesController@getUIndex')->where('su', '[\w\d]+');

// Added specifically for articles and article single page
Route::get('diseases/{slug_cat}/{slug_post}', 'ArticlesController@getSingleTwo');
Route::get('diseases/{slug_cat}', 'ArticlesController@getSingle');
Route::get('diseases', 'ArticlesController@getIndex');

Auth::routes();
