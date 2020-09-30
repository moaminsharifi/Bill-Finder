<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::group([
    'middleware' => 'auth:api','is_admin'
], function() {
    Route::apiResource('bill', BillController::class)->except(['destroy']);
    Route::apiResource('category', CategoryController::class)->except(['destroy']);
    Route::apiResource('building', BuildingController::class)->except(['destroy']);
    Route::apiResource('item', ItemController::class)->except(['index','destroy']);
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);

    Route::group([
        'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', [AuthController::class,'logout']);
        Route::get('user', [AuthController::class,'user']);
    });
});
