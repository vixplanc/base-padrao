<?php

use Vixplanc\BasePadrao\Controllers\AdministradorController;
use Vixplanc\BasePadrao\Controllers\DashboardController;
use Vixplanc\BasePadrao\Controllers\ProfileController;
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
    return redirect()->route('dashboard');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


Route::middleware(['auth', 'can:active-user,set-role,remove-role,set-active-user,remove-active-user'])->group(function () {
    Route::get('/admin', [AdministradorController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/setrole/{user}/{role}', [AdministradorController::class, 'set_role'])->name('admin.role.set');
    Route::delete('/admin/removerole/{user}/{role}', [AdministradorController::class, 'remove_role'])->name('admin.role.remove');
    Route::post('/admin/setactive/{user}', [AdministradorController::class, 'set_active_user'])->name('admin.set.active');
    Route::delete('/admin/removeactive/{user}', [AdministradorController::class, 'remove_active_user'])->name('admin.remove.active');
    Route::delete('/admin/resetpassword/{user}', [AdministradorController::class, 'remove_password_user'])->name('admin.remove.password');
    Route::post('/admin/upload/teste', [AdministradorController::class, 'file_upload'])->name('admin.upload.test');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

