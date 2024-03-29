<?php

use App\Http\Controllers\ItemController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//after ending this course - change it on RESTFul API
Route::apiResource('/items', ItemController::class);
Route::prefix('/item')->group( function(){
    Route::post('/store',[ItemController::class, 'store']);
    Route::put('/{id}',[ItemController::class, 'update']);
    Route::delete('/{id}',[ItemController::class, 'destroy']);
});

