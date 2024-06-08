<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\DashboardController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::apiResource('customers', CustomerController::class);
Route::apiResource('items', ItemController::class);
Route::get('/dashboard/title-chart',[DashboardController::class, 'titleChart']);
Route::get('/dashboard/sales-chart',[DashboardController::class, 'salesChart' ]);
Route::get('/dashboard/sales-chart',[DashboardController::class, 'salesChart' ]);
Route::get('/dashboard/items-chart',[DashboardController::class, 'itemsChart']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
