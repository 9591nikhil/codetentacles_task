<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::middleware(['admin_guest'])->group(function(){
Route::get('/admin/login',[LoginController::class,'showLoginpage'])->name('admin.login.page');
Route::post('/admin/login',[LoginController::class,'login'])->name('admin.login');
});
Route::middleware(['admin_auth:admin'])->group(function(){
    Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/products/index', [ProductController::class,'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class,'create'])->name('admin.products.create');
    Route::post('/admin/products/', [ProductController::class,'store'])->name('admin.products.store');
    Route::get('/admin/products/{id}', [ProductController::class, 'show'])->name('admin.products.show');
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::get('/admin/logout',[DashboardController::class,'logout'])->name('admin.logout');
});
