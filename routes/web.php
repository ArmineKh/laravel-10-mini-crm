<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes([
    'register' => false, 
    'reset' => false, 
    'verify' => false, 
  ]);
  
Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);

Route::get('/home', [CompanyController::class, 'index'])->name('home');
