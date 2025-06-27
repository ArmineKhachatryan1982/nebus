<?php

use App\Http\Controllers\API\ActivityController;
use App\Http\Controllers\API\filterController;
use App\Http\Controllers\API\IncomeController;
use App\Http\Controllers\API\MapController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\SaleController;
use App\Http\Controllers\API\StockController;
use App\Http\Controllers\API\OrganizationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('orders',OrderController::class);
// Route::get('sales',SaleController::class);
// Route::get('stocks',StockController::class);
// Route::get('incomes',IncomeController::class);


// ====
// Route::middleware(['static_api_key'])->group(function () {
Route::get('/buildings/{building}/organizations', [OrganizationController::class, 'organizationsByBuilding']);
Route::get('/activities/{activity}/organizations',[ActivityController::class,'organizationsByActivity']);
// Для радиуса
Route::get( 'organizations-radius',[MapController::class,'organizationsInRadius']);
// Для прямоугольной области
Route::get('/organizations-box', [MapController::class, 'organizationsInBox']);

Route::get('/organizations/{id}', [OrganizationController::class, 'show'])->middleware('api.key');
Route::get('filter-by-activity',filterController::class);

// });

