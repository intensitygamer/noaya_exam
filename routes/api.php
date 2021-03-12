<?php

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

Route::get('employees', 'Employees@index');
Route::get('employees/{id}', 'Employees@show');
Route::post('employees', 'Employees@store');
Route::put('employees/{id}', 'Employees@update');
Route::delete('employees/{id}', 'Employees@delete');

