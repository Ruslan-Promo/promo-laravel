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

Route::get('/welcome', function () {
    return view('welcome');
<<<<<<< Updated upstream
});
Route::get('/', function () {
    return view('home');
=======
})->name('home')->middleware('setlocale');

Route::get('/home', function () {
    return redirect()->route('home');
});


Auth::routes();

Route::get('/verify/{token}', ['as' => 'register.verify', 'uses' => 'App\Http\Controllers\Auth\RegisterController@verify']);


Route::get('/admin', 'App\Http\Controllers\HomeController@index')
    ->name('admin')
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
	Route::resource('admin/users', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('admin/profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('admin/profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('admin/profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['middleware' => ['auth', 'is_admin', 'setlocale']], function () {
    Route::resource('admin/products', 'App\Http\Controllers\ProductController');
	Route::get('admin/products', ['as' => 'products.index', 'uses' => 'App\Http\Controllers\ProductController@index']);
	Route::put('admin/products/create', ['as' => 'products.create', 'uses' => 'App\Http\Controllers\ProfileController@store']);
    Route::get('admin/products/{product_id}/edit', ['as' => 'products.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
});

Route::group(['middleware' => ['auth', 'is_admin', 'setlocale']], function () {
    Route::resource('admin/categories', 'App\Http\Controllers\CategoryController');
	Route::get('admin/categories', ['as' => 'categories.index', 'uses' => 'App\Http\Controllers\CategoryController@index']);
	Route::put('admin/categories/create', ['as' => 'categories.create', 'uses' => 'App\Http\Controllers\CategoryController@store']);
    Route::get('admin/categories/{category_id}/edit', ['as' => 'categories.edit', 'uses' => 'App\Http\Controllers\CategoryController@edit']);
});

/* Localization */
Route::get('setlocale/{locale}',function($locale){
    if (! in_array($locale, ['en', 'ru'])) {
        $locale = App::getLocale();
    }
    App::setLocale($locale);
    session(['locale' => $locale]);
    return redirect()->back();
>>>>>>> Stashed changes
});
