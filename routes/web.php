<?php

use App\Http\Controllers\KoperasiProfileController;
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

Route::get('/koperasi',[KoperasiProfileController::class,'index'])->name('koperasi.index');
Route::get('/kopbasic',[KoperasiProfileController::class,'baseurl'])->name('koperasi.baseurl');
// Route::get('/kopbasic',[KoperasiProfileController::class,'baseurl'])->name('koperasi.baseurl');
Route::get('/kopasync',[KoperasiProfileController::class, 'sinkronud'])->name('koperasi.kopasync');
Route::get('/kopasynccurrent',[KoperasiProfileController::class, 'cancurrent'])->name('koperasi.kopasynccurrent');
Route::get('/kopasyncsenQuery',[KoperasiProfileController::class, 'senQuery'])->name('koperasi.kopasyncsenQuery');
Route::get('/kopasyncsenParam',[KoperasiProfileController::class, 'senParam'])->name('koperasi.kopasyncsenParam');

