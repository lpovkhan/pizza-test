<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'order', 'as' => 'order.', 'namespace' => 'App\\Http\\Controllers\\'], function () {
    Route::post('/', 'OrderController@create')->name('create');
    Route::get('/', 'OrderController@index')->name('list');
});

Route::group(['prefix' => 'pizza', 'as' => 'pizza.', 'namespace' => 'App\\Http\\Controllers\\'], function () {
    Route::get('/', 'PizzaController@index')->name('list');
});

Route::group(['prefix' => 'ingredient', 'as' => 'ingredient.', 'namespace' => 'App\\Http\\Controllers\\'], function () {
    Route::get('/', 'IngredientController@index')->name('list');
});

