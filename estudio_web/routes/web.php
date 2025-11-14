<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('students',StudentController::class)->middleware('checkage');

Route::get('/restricted',function(){
    return 'Area restringida';
})->middleware('checkage');

Route::get('/home',function(){
    return "Bienvenidos a HOME";
});
