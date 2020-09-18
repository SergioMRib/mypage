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
    return view('index');
});

Route::get('/contact-me', function () {
    return view('indevelopment');
})->name('contact-me');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/demo', 'DashboardController@demo')->name('demo');

/* Route::resource('admins', 'AdminController')->only([
    'index'
]); */

Route::middleware('auth')->group( function () {
    Route::resource('dashboard/admins', 'AdminController')->only([
        'index'
    ]);
    Route::resource('dashboard/categories', 'CategoryController');
    Route::resource('dashboard/tags', 'TagController')->except(['create', 'edit', 'show', 'update']);
});
