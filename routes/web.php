<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes([
    'reset'=>false,
    'confirm'=>false,
    'verify'=>false,
]);


Route::get('/logout', 'Auth\LoginController@logout')->name('get-logout');

Route::middleware(['auth'])->group(function () {
    Route::group([
        'namespace' => 'Person',
        'prefix' => 'person',
        'as' => 'person.',
    ], function () {
        Route::get('/orders', 'OrderController@index')->name('orders.index');
        Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
    });

    Route::group([
        'namespace' => 'Admin',
        'prefix' => 'admin',
    ], function(){
        Route::group([
            'middleware' => 'is_admin'], function (){
                Route::get('/orders', 'OrderController@index')->name('home');
                Route::get('/orders/{order}', 'OrderController@show')->name('orders.show');
                Route::get('/admin/{order}/confirm/', 'OrderController@confirm')->name('orders.confirm');
                Route::get('/admin/{order}/cancel/', 'OrderController@cancel')->name('orders.cancel');
            });
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');  ///???
    });
});




Route::get('/', 'MainController@index')->name('index');
Route::get('/categories', 'MainController@categories')->name('categories');
Route::post('/subscription/{product}', 'MainController@subscribe')->name('subscription');


Route::group(['prefix'=>'basket'], function(){
    Route::post('/add/{product}', 'BasketController@basketAdd')->name('basket-add');

    Route::group([
        'middleware'=>'basket_not_empty',

    ], function(){
        Route::get('/', 'BasketController@basket')->name('basket');
        Route::get('/place', 'BasketController@basketPlace')->name('basket-place');
        Route::get('/placeDeliver', 'BasketController@basketPlaceDeliver')->name('basket-place-deliver');

        Route::post('/remove/{product}', 'BasketController@basketRemove')->name('basket-remove');
        Route::post('/place', 'BasketController@basketConfirm')->name('basket-confirm');
        Route::post('/placeDeliver', 'BasketController@basketConfirmDeliver')->name('basket-confirm-deliver');

    });

});


Route::get('/aboutUs', 'MainController@aboutUs')->name('aboutUs');
Route::get('/service', 'MainController@service')->name('service');
Route::get('/main', 'MainController@main')->name('main');
Route::get('/service', 'MainController@service')->name('service');

Route::get('/cat_{category}', 'MainController@category')->name('category');
Route::get('/cat_{category}/{product?}', 'MainController@product')->name('product');


Route::get('/search', 'MainController@search')->name('search');





