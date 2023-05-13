<?php

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

Route::prefix('v1')->group(function () {
    Route::resource('user', UserController::class);
    Route::delete('user', 'UserController@deleteAll');

    Route::resource('enterprise', EnterpriseController::class);
    Route::delete('enterprise', 'EnterpriseController@deleteAll');

    Route::resource('category', CategoryController::class);
    Route::delete('category', 'CategoryController@deleteAll');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
