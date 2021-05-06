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
})->name('home')->middleware('setlocale');

Auth::routes();

Route::get('/verify/{token}', ['as' => 'register.verify', 'uses' => 'App\Http\Controllers\Auth\RegisterController@verify']);


Route::group(['middleware' => ['auth', 'role:admin', 'setlocale']], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['middleware' => ['auth', 'setlocale']], function () {
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => ['auth', 'is_admin', 'setlocale']], function () {
    Route::get('admin', ['as' => 'admin', 'uses' => 'App\Http\Controllers\AdminController@admin']);
    Route::resource('admin/products', 'App\Http\Controllers\ProductController');
	Route::get('admin/products', ['as' => 'products.index', 'uses' => 'App\Http\Controllers\ProductController@index']);
	Route::put('admin/products/create', ['as' => 'products.create', 'uses' => 'App\Http\Controllers\ProfileController@store']);
    Route::get('admin/products/{product_id}/edit', ['as' => 'products.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::get('admin/users', ['as' => 'users.index', 'uses' => 'App\Http\Controllers\UserController@index']);
});

/* Localization */
Route::get('setlocale/{locale}',function($locale){
    if (! in_array($locale, ['en', 'ru'])) {
        $locale = App::getLocale();
    }
    App::setLocale($locale);
    session(['locale' => $locale]);
    return redirect()->back();
});

