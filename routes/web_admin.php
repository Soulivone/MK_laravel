<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\UserController;
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
    return view('welcome');
})->name('welcome');

Route::group([], function () {
    Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('admin/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

    // Admin Mangament
    Route::get('/admin/admin', [AdminController::class, 'index'])->name('admin.admin.index');
    Route::get('/admin/admin/create', [AdminController::class, 'create'])->name('admin.admin.create');
    Route::post('/admin/admin/store', [AdminController::class, 'store'])->name('admin.admin.store');
    Route::get('/admin/admin/edit/{id}', [AdminController::class, 'edit'])->name('admin.admin.edit');
    Route::put('/admin/admin/update/{id}', [AdminController::class, 'update'])->name('admin.admin.update');
    Route::delete('/admin/admin/delete/{id}', [AdminController::class, 'destroy'])->name('admin.admin.delete');

    // User Mangament
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/admin/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/delete/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
});
