<?php

use App\Http\Controllers\API\IncomeController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\SaleController;
use App\Http\Controllers\API\StockController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('orders',OrderController::class);
Route::get('sales',SaleController::class);
Route::get('stocks',StockController::class);
Route::get('incomes',IncomeController::class);

Route::middleware('static.key')->group(function () {
    Route::get('/buildings/{building}/organizations', [OrganizationController::class, 'organizationsByBuilding']);
});

