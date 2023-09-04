<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalesController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// Employee
Route::get('/employee', [EmployeeController::class, 'index']);
Route::post('/employee/store', [EmployeeController::class, 'store']);
Route::put('/employee/update/{employee}', [EmployeeController::class, 'update']);
Route::get('/employee/detail/{id}', [EmployeeController::class, 'detail']);
Route::delete('/employee/destroy/{employee}', [EmployeeController::class, 'destroy']);

// Sales
Route::get('/sales', [SalesController::class, 'index']);
Route::post('/sales/store', [SalesController::class, 'store']);
Route::put('/sales/update/{sales}', [SalesController::class, 'update']);
Route::get('/sales/detail/{id}', [SalesController::class, 'detail']);
Route::delete('/sales/destroy/{sales}', [SalesController::class, 'destroy']);