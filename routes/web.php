<?php

use App\Http\Controllers\CatalogsControllers;
use App\Http\Controllers\ManufacturersControllers;
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







Route::get('/', [CatalogsControllers::class, 'index']);
Route::get('manufacturers/', [ManufacturersControllers::class, 'index']);

Route::get('catalogs/create', [CatalogsControllers::class, 'create']);
Route::get('manufacturers/create', [ManufacturersControllers::class, 'create']);

Route::post('catalogs/store', [CatalogsControllers::class, 'store']);
Route::post('catalogs/position', [CatalogsControllers::class, 'position']);
Route::get('catalogs/senior', [CatalogsControllers::class, 'senior']);
Route::get('catalogs/show/{id}', [CatalogsControllers::class, 'show'])->where('id', '[0-9]+');
Route::delete('catalogs/delete/{id}/', [CatalogsControllers::class, 'delete'])->where('id', '[0-9]+');
Route::get('catalogs/edit/{id}/', [CatalogsControllers::class, 'edit'])->where('id', '[0-9]+');
Route::patch('catalogs/update/{id}', [CatalogsControllers::class, 'update'])->where('id', '[0-9]+');

Route::post('manufacturers/store', [ManufacturersControllers::class, 'store']);
Route::post('manufacturers/position', [ManufacturersControllers::class, 'position']);
Route::get('manufacturers/senior', [ManufacturersControllers::class, 'senior']);
Route::get('manufacturers/show/{id}', [ManufacturersControllers::class, 'show'])->where('id', '[0-9]+')->name('manufacturers.show');
Route::delete('manufacturers/delete/{id}/', [ManufacturersControllers::class, 'delete'])->where('id', '[0-9]+');
Route::get('manufacturers/edit/{id}/', [ManufacturersControllers::class, 'edit'])->where('id', '[0-9]+');
Route::patch('manufacturers/update/{id}', [ManufacturersControllers::class, 'update'])->where('id', '[0-9]+');
