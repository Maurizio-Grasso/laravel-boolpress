<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index')->name('guest-home');                // Home Page redirects to blog index

Route::get('/blog' , 'PostController@index')->name('posts.index');          // ! modidicato da posts a blog
Route::get('/blog/{slug}' , 'PostController@show')->name('posts.show');     // ! modidicato da posts a blog

Route::get('/categories' , 'CategoryController@index')->name('categories.index');
Route::get('/categories/{slug}' , 'CategoryController@show')->name('categories.show');


Auth::routes();

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('admin-home');
        Route::get('/profile', 'HomeController@profile')->name('admin.profile');
        Route::post('/profile/generate-token', 'HomeController@generateToken')->name('admin.generate-token');
        Route::resource('/posts' , PostController::class)->names([
            'index'     => 'admin.posts.index' ,
            'create'    => 'admin.posts.create' ,
            'destroy'   => 'admin.posts.destroy' ,
            'show'      => 'admin.posts.show' ,
            'update'    => 'admin.posts.update' ,
            'edit'      => 'admin.posts.edit' ,
            'store'      => 'admin.posts.store' ,
        ]);
        Route::resource('/categories' , CategoryController::class)->names([
            'index'     => 'admin.categories.index' ,
            'create'    => 'admin.categories.create' ,
            'destroy'   => 'admin.categories.destroy' ,
            'show'      => 'admin.categories.show' ,
            'update'    => 'admin.categories.update' ,
            'edit'      => 'admin.categories.edit' ,
            'store'      => 'admin.categories.store' ,
        ]);
        Route::resource('/tags' , TagController::class)->names([
            'index'     => 'admin.tags.index' ,
            'create'    => 'admin.tags.create' ,
            'destroy'   => 'admin.tags.destroy' ,
            'show'      => 'admin.tags.show' ,
            'update'    => 'admin.tags.update' ,
            'edit'      => 'admin.tags.edit' ,
            'store'      => 'admin.tags.store' ,
        ]);
    });