<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('exemplo', 'WelcomeController@exemplo');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/* FASE 2
Route::get('admin/categories', 'AdminCategoriesController@index');
Route::get('admin/products', 'AdminProductsController@index');
*/


Route::group (['prefix'=>'admin'], function () {

    Route::pattern('category', '[0-9]+');
    Route::pattern('product', '[0-9]+');

    //group Category
    Route::group(['prefix'=>'category'], function(){

        //Create
        Route::post('create', ['as'=>'category.create', 'uses'=> 'AdminCategoriesController@index']);

        //Update
        Route::put('update/{category?}', ['as'=>'category.update', function (\CodeCommerce\Category $category){
            dd($category);
        }]);

        //Delete
        Route::delete('delete/{category?}', ['as'=>'category.delete', function (\CodeCommerce\Category $category){
            dd($category);
        }]);

        //Read
        Route::get('{category?}', ['as'=>'category.get', function (\CodeCommerce\Category $category){
            dd($category);
        }]);

    });

    //group Product
    Route::group(['prefix'=>'product'], function(){

        //Create
        Route::post('create', ['as'=>'product.create',  'uses'=>'AdminProductsController@index']);

        //Update
        Route::put('update/{product?}', ['as'=>'product.update', function (\CodeCommerce\Product $product){
            dd($product);
        }]);

        //Delete
        Route::delete('delete/{product?}',['as'=>'product.delete', function (\CodeCommerce\Product $product){
            dd($product);
        }]);

        //Read
        Route::get('{product?}', ['as'=>'product.get', function (\CodeCommerce\Product $product){
            dd($product);
        }]);
    });
});

