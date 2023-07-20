<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MatapelajaranController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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


Route::get('login', [AuthController::class, 'index_login'])->name('index_login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [AuthController::class, 'index_register'])->name('index_register');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    // User
    Route::prefix('user')->middleware(['permission:list user|tambah user|edit user|delete user'])->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
        Route::post('/{user}', [UserController::class, 'lock_user'])->name('lock_user');
        Route::get('tambah', [UserController::class, 'tambah'])->name('tambah_user');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit_user');
        Route::post('edit/{user}', [UserController::class, 'update'])->name('update_user');
        Route::prefix('permission')->group(function () {
            Route::get('/', [PermissionController::class, 'index_user'])->name('permission_user');
            Route::get('edit/{user}', [PermissionController::class, 'edit_user'])->name('edit_permission_user');
            Route::post('edit/{user}', [PermissionController::class, 'update_user'])->name('update_permission_user');
        });
    });
    Route::prefix('permission')->group(function () {
        Route::get('/', [PermissionController::class, 'index'])->name('permission');
        Route::get('tambah', [PermissionController::class, 'tambah'])->name('tambah_permission');
        Route::post('tambah', [PermissionController::class, 'store'])->name('tambah_permission');
        Route::delete('/{permission}', [PermissionController::class, 'delete'])->name('delete_permission');
    });
    Route::prefix('mapel')->middleware(['permission:list mapel|tambah mapel|edit mapel|detail mapel|delete mapel'])->group(function () {
        Route::get('/', [MatapelajaranController::class, 'index'])->name('mapel');
        Route::get('tambah', [MatapelajaranController::class, 'create'])->name('mapel.tambah');
        Route::post('tambah', [MatapelajaranController::class, 'store'])->name('mapel.store');
        Route::get('edit/{mapel}', [MatapelajaranController::class, 'edit'])->name('mapel.edit');
        Route::put('edit/{mapel}', [MatapelajaranController::class, 'update'])->name('mapel.update');
        Route::delete('delete/{mapel}', [MatapelajaranController::class, 'destroy'])->name('mapel.delete');
        Route::get('show/{mapel}', [MatapelajaranController::class, 'show'])->name('mapel.show');
    });
});
