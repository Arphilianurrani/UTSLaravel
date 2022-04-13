<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    //return $request->user();
//});

// read data 
Route::get('/product', [ProductController::class, 'show']);
Route::get('/product/{id}', [ProductController::class, 'showById']);

// create data
Route::post('/product', [ProductController::class,'store']);

// update data
Route::put('/product/{id}', [ProductController::class, 'update']);

//delete data
Route::delete('/product/{id}', [ProductController::class, 'delete']);

Route::post('/login',[UserController::class,'login']);
