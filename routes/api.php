<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ItemController;
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
Route::apiResource('bills', BillController::class)->except(['destroy']);
Route::apiResource('category', CategoryController::class)->except(['destroy']);
Route::apiResource('building', BuildingController::class)->except(['destroy']);
Route::apiResource('item', ItemController::class)->except(['index','destroy']);
