<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminChecker;
use App\Http\Middleware\ChatChecker;
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
    // Kas
    Route::get('kas', [HomeController::class,'KasHomeUi'])->name('KasHomeUi');
    // Notif
    Route::get('notif', [HomeController::class,'NotifHomeUi'])->name('NotifHomeUi');
});
Route::middleware([AdminChecker::class])->group(function (){
    // Dashboard
    Route::get('/admin/dashboard',[AdminController::class,'DashboardUi'])->name('DashboardUi');
    // Absen / Presensi
    Route::get('/admin/presensi',[AdminController::class,'PresensiUi'])->name('PresensiUi');
    Route::get('/admin/presensi-user',[AdminController::class,'PresensiAllUi'])->name('PresensiAllUi');
     Route::get('/admin/presensi-view/{id}',[AdminController::class,'ViewPresensi'])->name('ViewPresensi');
    Route::get('/admin/presensi/delete/{id}',[AdminController::class,'DeleteAbsen'])->name('DeleteAbsen');
    Route::get('/admin/presensi/confirm/{id}',[AdminController::class,'ConfirmAbsen'])->name('ConfirmAbsen');
    // Laporan_Keuangan
    Route::get('/admin/laporan-keuangan',[AdminController::class,'LaporanKeuanganUi'])->name('LaporanKeuanganUi');
    Route::post('/admin/laporan-keuangan',[AdminController::class,'AddKeuangan'])->name('AddKeuangan');
    Route::get('/admin/laporan-keuangan/delete/{id}',[AdminController::class,'DeleteLaporanKeuangan'])->name('DeleteLaporanKeuangan');
    Route::get('/admin/editkeuangan/{id}',[AdminController::class,'EditLaporanKeuanganUi'])->name('EditLaporanKeuanganUi');
    Route::post('/admin/editkeuangan/{id}',[AdminController::class,'EditLaporanKeuangan'])->name('EditKeuangan');
    // Page
    Route::get('/admin/next/{panel}',[AdminController::class,'NextPage'])->name('NextPage');
    Route::get('/admin/back/{panel}',[AdminController::class,'BackPage'])->name('BackPage');
    // Dokumentasi Panel
    Route::get('admin/invite-user',[AdminController::class, 'InviteDokumUi'])->name('InviteDokumUi');
    Route::post('admin/invite-user',[AdminController::class, 'RewardUser'])->name('RewardUser');
    Route::get('admin/invite/{id}',[AdminController::class, 'InviteDokum'])->name('InviteDokum')
    // Kas
    Route::get('admin/user-kas',[AdminController::class, 'ShowUserKasUi'])->name('ShowUserKasUi');
    Route::get('admin/edit-kas/{id}',[AdminController::class, 'ShowKasUser'])->name('ShowKasUser');
    Route::post('admin/edit-kas/{id}',[AdminController::class, 'EditKasUser'])->name('EditKasUser');
    // nOTIF
    Route::get('admin/notif', [AdminController::class,'NotifUi'])->name('NotifUi');
    // Search
    Route::post('admin/search/{panel}',[AdminController::class, 'Search'])->name('Search'); 
});

Route::get('chat', [ChatController::class,'ChatUi'])->name('ChatUi')->middleware([ChatChecker::class]);
Route::post('chat', [ChatController::class,'SendMessage'])->name('SendMessage')->middleware([ChatChecker::class]);
