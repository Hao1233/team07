<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutoControllers;
use App\Http\Controllers\CatalogsControllers;
use App\Http\Controllers\ManufacturersControllers;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [AutoControllers::class, 'register']);

Route::post('login',  [AutoControllers::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('catalogs', [CatalogsControllers::class, 'api_catalogs']);
        Route::patch('catalogs', [CatalogsControllers::class, 'api_update']);
        Route::delete('catalogs', [CatalogsControllers::class, 'api_delete']);
        Route::get('manufacturers', [ManufacturersControllers::class, 'api_manufacturers']);
        Route::patch('manufacturers', [ManufacturersControllers::class, 'api_update']);
        Route::delete('manufacturers', [ManufacturersControllers::class, 'api_delete']);

});