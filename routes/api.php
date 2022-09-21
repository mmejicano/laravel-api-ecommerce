<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Api\V1\PersonController;
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

Route::post('/login', 'LoginController@authenticate');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/person/{person}', 'PersonController@show');
Route::prefix('v1')->group(function(){

    Route::apiResource('/person', 'Api\v1\PersonController')
    ->only('show', 'destroy', 'update', 'store');

    Route::apiResource('/people', 'Api\v1\PersonController')
    ->only('index');
});
Route::prefix('v2')->group(function(){

    Route::apiResource('/person', 'Api\v2\PersonController')
    ->only('show');


});
