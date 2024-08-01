<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\AdminAuthMiddleware;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\SettingWebController;

// ------------------------------------------------------------------------------------------ U S E R
Route::get('/',[UserController::class, 'index']);
Route::get('/order',[UserController::class, 'order']);
Route::post('/order-process',[UserController::class, 'orderProcess']);
Route::get('/order-check',[UserController::class, 'orderCheck']);

// ------------------------------------------------------------------------------------------ A D M I N
Route::get('/admin/login',[AdminController::class, 'login']);
Route::post('/admin/login-process',[AdminController::class, 'loginProcess']);
Route::get('/admin/logout',[AdminController::class, 'logout']);

Route::middleware([AdminAuthMiddleware::class])->group(function () {
    Route::get('/admin',[AdminController::class, 'index']);

    Route::resource('/admin/catalogue', CatalogueController::class);
    Route::get('/admin/order/status', [AdminController::class, 'changeOrderStatus']);
    Route::resource('/admin/order', OrderController::class);
    Route::get('/admin/cetak-laporan',[AdminController::class, 'cetakLaporan']);
    Route::resource('/admin/setting-web', SettingWebController::class);

});
