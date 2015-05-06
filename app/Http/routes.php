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


Route::group (['prefix'=>'admin', 'where'=> ['id'=>'[0-9]+']], function () {

    //group Category
    Route::group(['prefix'=>'categories'], function(){

        //Get all categories
        Route::get ('/', ['as'=>'category.index', 'uses'=> 'AdminCategoriesController@index']);

        //Create
        Route::get('create', ['as'=>'category.create', 'uses'=> 'AdminCategoriesController@create']);
        Route::post('/', ['as'=>'category.store', 'uses'=> 'AdminCategoriesController@store']);

        //Delete
        Route::get('{id}/destroy', ['as'=>'category.destroy', 'uses'=>'AdminCategoriesController@destroy']);

        //Update
        Route::get('{id}/edit', ['as'=>'category.edit', 'uses'=>'AdminCategoriesController@edit']);
        Route::put('{id}/update', ['as'=>'category.update', 'uses'=>'AdminCategoriesController@update']);


    });

    //group Product
    Route::group(['prefix'=>'products'], function(){

        //Get all products
        Route::get ('/', ['as'=>'product.index', 'uses'=> 'AdminProductsController@index']);

        //Create
        Route::get('create', ['as'=>'product.create', 'uses'=> 'AdminProductsController@create']);
        Route::post('create', ['as'=>'product.store', 'uses'=> 'AdminProductsController@store']);

        //Delete
        Route::get('{id}/destroy', ['as'=>'product.destroy', 'uses'=>'AdminProductsController@destroy']);


        //Update
        Route::get('{id}/edit', ['as'=>'product.edit', 'uses'=>'AdminProductsController@edit']);
        Route::put('{id}/update', ['as'=>'product.update', 'uses'=>'AdminProductsController@update']);

    });
});

