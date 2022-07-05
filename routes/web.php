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

Route::resource('/vol', 'VolController')

;
Route::get('update-vol/{id}', [VolController::class,'edit']);  

// Route::get('vols/{id}', [VolController::class,'edit']);    


Route::resource('/reservation', 'ReservationController');

