<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ShopController;

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

Route::get('/profile', [UserController::class,'apiviewall']);
Route::get('/profile/{uname}', [UserController::class,'apiview']);

Route::get('/categories', [CategoryController::class,'apiall']);
Route::get('/categories/{id}', [CategoryController::class,'apiCatById']);
Route::put('/categories/{id}', [CategoryController::class,'apiPutCatById']);
Route::delete('/categories/{id}', [CategoryController::class,'apiDeleteCatById']);
Route::post('/categories', [CategoryController::class,'apicreate']);




/* -------------------------------------------------------------------------- */
/*                                  For Shop                                  */
/* -------------------------------------------------------------------------- */
Route::get('/employee', [employeeController::class,'FetchEmployee']);
Route::get('/employee/{id}', [employeeController::class,'FetchEmployeeById']);
Route::put('/employee/{id}', [employeeController::class,'PutEmployeeById']);
Route::delete('/employee/{id}', [employeeController::class,'DeleteEmployeeById']);
Route::post('/employee', [employeeController::class,'CreateEmployee']);
/* -----------------------------  For Product ----------------------------- */
Route::get('/product', [employeeController::class,'FetchProduct']);
Route::get('/product/{id}', [employeeController::class,'FetchProductById']);
Route::put('/product/{id}', [employeeController::class,'PutProductById']);
Route::delete('/product/{id}', [employeeController::class,'DeleteProductById']);
Route::post('/product', [employeeController::class,'CreateProduct']);
