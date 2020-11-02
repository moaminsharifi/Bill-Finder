<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BillController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\BuildingController;
use App\Http\Controllers\API\ItemController;
use App\Http\Controllers\API\AuthController;
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
//    return $request->user();
//});

Route::group([
    'middleware' => 'auth:sanctum','is_admin'
], function() {
    Route::apiResource('bill', BillController::class , ['as' => 'api'])->except(['destroy']);
    Route::apiResource('category', CategoryController::class, ['as' => 'api'])->except(['destroy']);
    Route::apiResource('building', BuildingController::class, ['as' => 'api'])->except(['destroy']);
    Route::apiResource('item', ItemController::class, ['as' => 'api'])->except(['index','destroy']);
});

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);

    Route::group([
        'middleware' => 'auth:sanctum'
    ], function() {
        Route::get('logout', [AuthController::class,'logout']);
        Route::get('user', [AuthController::class,'user']);
    });
});
