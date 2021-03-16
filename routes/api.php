<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\EmployeesAPIController;
use App\Http\Controllers\API\CompaniesAPIController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('employees', [EmployeesAPIController::class, 'index']);
Route::get('employees/{id}', [EmployeesAPIController::class, 'show']);
Route::post('employees', [EmployeesAPIController::class, 'store']);
Route::post('employees/{id}', [EmployeesAPIController::class, 'update']);
Route::delete('employees/{id}', [EmployeesAPIController::class, 'delete']);


Route::get('companies', [CompaniesAPIController::class, 'index']);
Route::get('companies/{id}', [CompaniesAPIController::class, 'show']);
Route::post('companies', [CompaniesAPIController::class, 'store']);
Route::post('companies/{id}', [CompaniesAPIController::class, 'update']);
Route::delete('companies/{id}', [CompaniesAPIController::class, 'delete']);

