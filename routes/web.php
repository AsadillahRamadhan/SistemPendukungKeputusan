<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
    return view('content.dashboard',[
        'title' =>'Dashboard',
        'active' => 'dashboard'
    ]);
});

Auth::routes();
Route::get('/electre', [ElectreController::class, 'index']);
Route::post('/electre', [ElectreController::class, 'process']);
Route::post('/save', [ElectreController::class, 'save']);
Route::get('history', [UserController::class, 'history']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
