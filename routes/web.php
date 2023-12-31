<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

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

Route::get("/",[IndexController::class,'index']);
Route::get("/show",[IndexController::class,'show']);
//
Route::resource('eleves',EleveController::class);
//
Route::controller(ClasseController::class)
->name('classes.')
->group(function(){
    Route::get('/classes','index')->name('index');
    Route::post('/classes','store')->name('store');
    Route::get('/classes/{classe}','show')->name('show');
});