<?php

use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\SessionController;
use App\Models\Departemen;
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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('departemen', DepartemenController::class);

Route::get('/login', [SessionController::class,'index']);
Route::get('sesi', [SessionController::class,'index']);
Route::post('/sesi/login', [SessionController::class,'login']);
Route::get('/sesi/logout', [SessionController::class,'logout']);
