<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminChecker;
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
    Route::get('/absen',[HomeController::class, 'PresensiHomeUi'])->name('PresensiHomeUi');
    Route::post('/absen',[HomeController::class, 'SubmitAbsen'])->name('SubmitAbsen');
});
Route::middleware([AdminChecker::class])->group(function (){
    Route::get('/admin/dashboard',[AdminController::class,'DashboardUi'])->name('DashboardUi');
    Route::get('/admin/presensi',[AdminController::class,'PresensiUi'])->name('PresensiUi');
    Route::get('/admin/presensi/delete/{id}',[AdminController::class,'DeleteAbsen'])->name('DeleteAbsen');
    Route::get('/admin/presensi/confirm/{id}',[AdminController::class,'ConfirmAbsen'])->name('ConfirmAbsen');
    Route::get('/admin/presensi/next',[AdminController::class,'NextPage'])->name('NextPage');
    Route::get('/admin/presensi/back',[AdminController::class,'BackPage'])->name('BackPage');
});