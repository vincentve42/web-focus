<?php

use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\GuestChecker;
use App\Http\Middleware\LoggedInCheckerAsUser;
use Illuminate\Support\Facades\Route;

Route::middleware([GuestChecker::class])->group(function() {
    Route::get('/login', [AutentikasiController::class,'LoginUi'])->name('LoginUi');
    Route::post('/login',[AutentikasiController::class,'Login'])->name('Login');
    Route::get('/register',[AutentikasiController::class,'RegisterUi'])->name('RegisterUi');
    Route::post('/register',[AutentikasiController::class,'Register'])->name('Register');
});
Route::middleware([LoggedInCheckerAsUser::class])->group(function (){
    Route::get('/home',[HomeController::class, 'HomeUi'])->name('HomeUi');
});