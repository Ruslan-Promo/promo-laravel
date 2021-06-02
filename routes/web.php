<?php

use App\Models\User;
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

Route::group(['prefix' => 'profile', 'middleware' => ['auth', 'setlocale']], function () {
	Route::get('/', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('/', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin', 'setlocale']], function () {
    Route::get('/', ['as' => 'admin', 'uses' => 'App\Http\Controllers\AdminController@admin']);
    Route::resource('products', 'App\Http\Controllers\ProductController');
	Route::get('products', ['as' => 'products.index', 'uses' => 'App\Http\Controllers\ProductController@index']);
	Route::put('products/create', ['as' => 'products.create', 'uses' => 'App\Http\Controllers\ProductController@store']);
    Route::get('products/{product_id}/edit', ['as' => 'products.edit', 'uses' => 'App\Http\Controllers\ProductController@edit']);
    Route::delete('products/{product_id}/delete', ['as' => 'products.destroy', 'uses' => 'App\Http\Controllers\ProductController@destroy']);
    Route::get('users', ['as' => 'users.index', 'uses' => 'App\Http\Controllers\UserController@index']);
    /* Admin Page */
    Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
	Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
	Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
	Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
	Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
	Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
	Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);
});

Route::group(['prefix' => 'agent', 'middleware' => ['auth', 'role:agent', 'setlocale']], function () {
    Route::get('/', ['as' => 'agent', 'uses' => 'App\Http\Controllers\AgentController@agent']);
    Route::resource('products', 'App\Http\Controllers\ProductController');
	Route::get('products', ['as' => 'products.agent.index', 'uses' => 'App\Http\Controllers\ProductController@index']);
	Route::put('products/create', ['as' => 'products.agent.create', 'uses' => 'App\Http\Controllers\ProductController@store']);
    Route::get('products/{product_id}/edit', ['as' => 'products.agent.edit', 'uses' => 'App\Http\Controllers\ProductController@edit']);
    Route::delete('products/{product_id}/delete', ['as' => 'products.destroy', 'uses' => 'App\Http\Controllers\ProductController@destroy']);
});

Route::group(['middleware' => ['setlocale']], function () {
    Route::get('products', ['as' => 'frontend.products.index', 'uses' => 'App\Http\Controllers\FrontendController@productsIndex']);
    Route::get('products/{category:slug}', ['as' => 'frontend.products.category', 'uses' => 'App\Http\Controllers\FrontendController@productsCategory']);
    Route::get('products/{category:slug}/{product}', ['as' => 'frontend.products.show', 'uses' => 'App\Http\Controllers\FrontendController@productsShow']);
    Route::get('search', ['as' => 'frontend.products.search', 'uses' => 'App\Http\Controllers\SearchController@search']);
    Route::resource('news', 'App\Http\Controllers\NewsController');
});

Route::group(['middleware' => ['auth', 'setlocale']], function () {
    Route::post('products/purchase', ['as' => 'frontend.products.purchase', 'uses' => 'App\Http\Controllers\FrontendController@productsPurchase']);
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

