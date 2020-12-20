<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'middleware' => 'auth:sanctum','is_admin'
], function () {
    Route::Resource('bill', BillController::class)->except(['destroy']);
    Route::Resource('category', CategoryController::class)->except(['destroy','store']);
    Route::Resource('building', BuildingController::class)->except(['destroy','store']);
    Route::Resource('item', ItemController::class)->except(['store','destroy']);
});



Route::middleware(['auth:sanctum', ])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
