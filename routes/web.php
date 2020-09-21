<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
Route::match(['get','post'],'/admin','AdminController@login');
Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::match(['get','post'],'/admin/dashboard','AdminController@dashboard');


Route::match(['get','post'],'/admin/add-blog','BlogController@addBlog');
Route::match(['get','post'],'/admin/view-blog','BlogController@viewBlog');
Route::match(['get','post'],'/admin/edit-blog/{BlogID}','BlogController@editBlog');
Route::match(['get','post'],'/admin/delete-blog/{BlogID}','BlogController@deleteBlog');
Route::post('/admin/update/blogstatus','BlogController@updateStatus');

Route::match(['get','post'],'/admin/add-blog-keyword','BlogKeywordsController@addblogkeywords');
Route::match(['get','post'],'/admin/view-blog-keyword','BlogKeywordsController@viewBlogKeywords');
Route::match(['get','post'],'/admin/edit-blog-keyword/{KeywordID}','BlogKeywordsController@editBlogKeywords');
Route::match(['get','post'],'/admin/delete-blog-keyword/{BlogID}','BlogKeywordsController@deleteBlogKeyword');


Route::match(['get','post'],'/admin/add-blog-seo','BlogSeoController@addBlogSeo');
Route::match(['get','post'],'/admin/view-blog-seo','BlogSeoController@viewBlogSeo');
Route::match(['get','post'],'/admin/edit-blog-seo/{KeywordID}','BlogSeoController@editBlogSeo');
Route::match(['get','post'],'/admin/delete-blog-seo/{BlogID}','BlogSeoController@deleteBlogSeo');

Route::group(['middleware' =>['auth']],function(){

	});

Route::get('/logout','AdminController@logout');