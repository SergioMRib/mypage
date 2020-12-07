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


/* 
    These are the public routes
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/contact-me', function () {
    return view('indevelopment');
})->name('contact-me');

Route::get('/projects/{category}', 'PublicProjectsController@index')->name('projects');


/* 
    Enable routes for authentication
    Registration is protected and can only happen when already logged in. 
*/
Auth::routes();


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/demo', 'DashboardController@demo')->name('demo');

/* 
    Routes for administrative actions
    Only for authenticated users
*/
Route::middleware('auth')->group( function () {
    Route::resource('dashboard/admins', 'AdminController')->only([
        'index'
    ]);
    Route::resource('dashboard/categories', 'CategoryController');
    Route::resource('dashboard/tags', 'TagController')->except(['create', 'edit', 'show', 'update']);
    Route::resource('dashboard/projects', 'ProjectController');
});
