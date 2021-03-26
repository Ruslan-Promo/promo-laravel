<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

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
})->middleware('setlocale');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware('is_admin')
    ->name('admin');
*/
Route::get('/verify/{token}', [App\Http\Controllers\Auth\RegisterController::class, 'verify'])->name('register.verify');

/*Route::get('/admin', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');*/
Route::get('/admin', 'App\Http\Controllers\HomeController@index')
    ->name('home')
    ->middleware('is_admin', 'setlocale');

Route::group(['middleware' => ['auth', 'is_admin', 'setlocale']], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => ['auth', 'is_admin', 'setlocale']], function () {
	Route::resource('users', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => ['auth', 'is_admin', 'setlocale']], function () {
    Route::resource('products', 'App\Http\Controllers\ProductController', ['except' => ['show']]);
	//Route::get('products', ['as' => 'products.index', 'uses' => 'App\Http\Controllers\ProductController@list']);
	//Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
});

/* Localization */
Route::get('setlocale/{locale}',function($locale){
    if (! in_array($locale, ['en', 'ru'])) {
        abort(400);
    }
    App::setLocale($locale);
    session(['locale' => $locale]);
    return redirect()->back();
});

