<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

// Route untuk user yang belum login (Guest)
Route::middleware(['guest'])->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login'); // Perhatikan nama route 'login', pastikan tidak bertabrakan dengan default
    Route::post('/loginRequest', [LoginController::class, 'loginRequest'])->name('login.request');
});

// Route untuk user yang sudah login (Authenticated)
//session agar admin tetap login
Route::middleware(['auth:user'])-> group(function () {
    Route::get('/home', [HomeController::class,'home']);
    Route::get('/index2', [HomeController::class,'index2']);

    Route::post('/store', [HomeController::class, 'store']);

    Route::post('/editForm', [HomeController::class,'editForm']);
    Route::post('/{kode_item}/updateProses', [HomeController::class,'updateProses']);
    Route::post('/{kode_item}/deleteProses', [HomeController::class,'deleteProses']);

    // Route::get('/logoutrequestAdmin', [AuthController::class,'logoutrequestAdmin']);

});
