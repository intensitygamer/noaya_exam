<?php

use Illuminate\Support\Facades\Route;

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

Route::get('employees', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Employees::all();
});
 
Route::get('employees/{id}', function($id) {
    return Employees::find($id);
});

Route::post('employees', function(Request $request) {
    return Employees::create($request->all);
});

Route::put('employees/{id}', function(Request $request, $id) {
    $employees = Article::findOrFail($id);
    $employees->update($request->all());

    return $article;
});

Route::delete('employees/{id}', function($id) {
    Employees::find($id)->delete();

    return 204;
});

//* Companies API 

Route::get('companies', function() {
    // If the Content-Type and Accept headers are set to 'application/json', 
    // this will return a JSON structure. This will be cleaned up later.
    return Companies::all();
});
 
Route::get('companies/{id}', function($id) {
    return Companies::find($id);
});

Route::post('companies', function(Request $request) {
    return Companies::create($request->all);
});

Route::put('companies/{id}', function(Request $request, $id) {
   
    $companies = Companies::findOrFail($id);
    $companies->update($request->all());

    return $companies;
});

Route::delete('companies/{id}', function($id) {

    Companies::find($id)->delete();

    return 204;
});
