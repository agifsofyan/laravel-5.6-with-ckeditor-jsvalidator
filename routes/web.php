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

// Route::get("/", 'HomeController@index');

Route::group(['prefix' => '/'], function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('pages/{slug}', 'HomeController@getPage');
    Route::get('diseases', 'ArticlesController@getIndex');
    Route::get('diseases/{slug_cat}', 'ArticlesController@getSingle');
    Route::get('diseases/{slug_cat}/{slug_post}', 'ArticlesController@getSingleTwo');
    Route::post('save_data', [
        'as'   => 'home.save_data',
        'uses' => 'HomeController@save_data'
    ]);
});

Route::group(['prefix' => 'admin'], function (){
    Auth::routes();
    Route::get('/', 'AdminsController@getIndex')->name('admin');
    Route::resource('pages', 'PagesController');
    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'CategoriesController');


    Route::get('post/trash', [
        'as'   => 'posts.trash',
        'uses' => 'PostsController@trash'
    ]);
    Route::get('post/restore/{id}', 'PostsController@restore')->name('posts.restore');
    Route::get('post/forceDelete/{id}', 'PostsController@forceDelete')->name('posts.forceDelete');

    Route::get('page/trash', [
        'as'   => 'pages.trash',
        'uses' => 'PagesController@trash'
    ]);
    Route::get('pages/restore/{id}', 'PagesController@restore')->name('pages.restore');
    Route::get('pages/forceDelete/{id}', 'PagesController@forceDelete')->name('pages.forceDelete');

    Route::get('category/trash', [
        'as'   => 'categories.trash',
        'uses' => 'CategoriesController@trash'
    ]);
    Route::get('categories/restore/{id}', 'CategoriesController@restore')->name('categories.restore');
    Route::get('categories/forceDelete/{id}', 'CategoriesController@forceDelete')->name('categories.forceDelete');
});

Route::resource('comments', 'CommentsController');
Route::post('comments/{comment}/approve', 'CommentsController@approveComment')->name('comment.approve');
Route::post('comments/{comment}/unapprove', 'CommentsController@unapproveComment')->name('comment.unapprove');
Route::get('search/{sa?}', 'SearchesController@getAIndex')->where('sa', '[\w\d]+');
Route::get('searching/{su?}', 'SearchesController@getUIndex')->where('su', '[\w\d]+');

Route::get('chat', function(){
    return redirect('https://mqa.zoosnet.net/LR/Chatpre.aspx?id=MQA87261512&lng=en');
});

Route::get('/sitemap', 'SitemapController@index');
Route::get('/sitemap/posts', 'SitemapController@posts');
Route::get('/sitemap/categories', 'SitemapController@categories');

// Route::get('log-test', ['middleware' => ['access-log', 'api-token'], 'uses' => 'HomeController@logTest']);
