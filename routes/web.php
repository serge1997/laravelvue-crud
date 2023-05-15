<?php

use Illuminate\Support\Facades\Route;
//use Illuminate\Http\Controllers\Employecontroller;
use App\Http\Controllers\EmployeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::match(['get', 'post'], 'create', [EmployeController::class, 'store']);
Route::get('/edit/getemploye/{id}', [EmployeController::class, 'getEmploye']);
Route::post('edit/update/{id}', [EmployeController::class, 'update']);
Route::post('employe/delete/{id}', [EmployeController::class, 'delete']);
Route::match(['get', 'post'],' login', [EmployeController::class, 'login']);
Route::match(['get', 'post'],' logout', [EmployeController::class, 'logout'])->middleware('auth:sanctum');

Route::get('{any}', function () {
    return view('welcome');
})->where('any', '.*');


