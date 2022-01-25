<?php

use App\Http\Controllers\Admin\AdminOrderController;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::name('admin.')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('products', Admin\ProductController::class);

        Route::resource('reviews', Admin\ReviewController::class);

        Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

        Route::resource('adminorders', 'Admin\AdminOrderController');
        Route::resource('prosesorders', 'Admin\ProsesOrderController');
        Route::resource('deliveryorders', 'Admin\DeliveryOrderController');
        Route::resource('finishorders', 'Admin\FinishOrderController');
        Route::resource('orders', 'Admin\OrderController');

        Route::resource('users', 'Admin\UserController');
        Route::get('adminorders/{id}/clone', 'Admin\AdminOrderController@clone')->name('adminorders.clone');
        Route::get('prosesorders/{id}/clone', 'Admin\ProsesOrderController@clone')->name('prosesorders.clone');
        Route::get('deliveryorders/{id}/clone', 'Admin\DeliveryOrderController@clone')->name('deliveryorders.clone');
        Route::post('/products/review/store/{product_id}', 'Admin\ReviewController@store')->name('admin.reviews.store');
    });
});

Route::get('/products', 'ProductController@index')->name('products.index');
Route::get('/products/{id}', 'ProductController@show')->name('products.show');
Route::get('/images/image/{imageName}', 'ProductController@image')->name('products.image');

Route::get('/carts', 'CartController@index')->name('carts.index');
Route::get('/carts/add/{id}', 'CartController@add')->name('carts.add');
Route::patch('carts/update', 'CartController@update')->name('carts.update');
Route::delete('carts/remove', 'CartController@remove')->name('carts.remove');

Route::get('/favorites', 'FavoriteController@index')->name('favorites.index');
Route::get('/favorites/add/{id}', 'FavoriteController@add')->name('favorites.add');
Route::get('/favorites/addCart/{id}', 'FavoriteController@add')->name('favorites.addCart');
Route::delete('favorites/remove', 'FavoriteController@remove')->name('favorites.remove');

Route::get('/reviews', 'Admin\ReviewController@index')->name('admin.reviews.index');
Route::get('/products/review/create/', 'ProductController@create')->name('products.create');
Route::post('/products/reviews/', 'ProductController@storeReview')->name('products.review');
