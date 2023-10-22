<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ElectreController;

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

Route::get('/electre1', [ElectreController::class, 'electre1'])->name('electre1');
Route::get('/electre2', [ElectreController::class, 'electre2'])->name('electre2');
Route::get('/bobot-kriteria', [ElectreController::class, 'tampilkanBobotKriteria'])->name('bobot_kriteria');

