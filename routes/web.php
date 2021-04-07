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

Route::namespace('BackEnd')->prefix('dashboard')->middleware('admin')->group(function () {
    Route::get('/', 'HomeController@index')->name('admin.home');

    Route::resource('users', 'UsersController')->except('show', 'delete');
    Route::resource('categories', 'CategoriesController')->except('show', 'delete');
    Route::resource('skills', 'SkillsController')->except('show', 'delete');
    Route::resource('tags', 'TagsController')->except('show', 'delete');
    Route::resource('pages', 'PagesController')->except('show', 'delete');
    Route::resource('videos', 'VideosController')->except('show', 'delete');
    Route::post('comments', 'VideosController@commentStore')->name('comments.store');
    Route::get('comments/{id}', 'VideosController@commentDelete')->name('comments.delete');
    Route::post('comments/{id}', 'VideosController@commentUpdate')->name('comments.update');
    Route::resource('messages', 'MessagesController')->only('index', 'destroy', 'edit');
    Route::post('messages/replay/{id}', 'MessagesController@replay')->name('message.replay');
});

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('/');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skill')->name('front.skill');
Route::get('tag/{id}', 'HomeController@tag')->name('front.tag');
Route::get('video/{id}', 'HomeController@video')->name('front.video');
Route::get('contact-us', 'HomeController@messageStore')->name('contact.store');
Route::get('page/{id}/{slug?}', 'HomeController@page')->name('front.page');
Route::get('profile/{id}/{slug?}', 'HomeController@profile')->name('front.profile');

Route::middleware('auth')->group(function () {
    Route::get('comments/{id}', 'HomeController@commentStore')->name('front.commentStore');
    Route::post('comments/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');
    Route::post('profile', 'HomeController@profileUpdate')->name('front.profile.update');
});
