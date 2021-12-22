<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
// IF THE ADMIN USER DON NOT LOGIN CAN ABLE TO SEE THIS ROUTES

Route::middleware(['guest:admin'])->group(function () {
  Route::post('register',    [AdminController::class, 'AdminRegisteration'])->name('register');
  Route::get('/',            [AdminController::class, 'AdminLoginForm'])->name('login.form');
  Route::post('postlogin',   [AdminController::class, 'AdminLogin'])->name('login');
});
// IF THE ADMIN USER  LOGGEDIN CAN ABLE TO SEE THIS ROUTES
Route::middleware(['auth:admin'])->group(function () {
    Route::get('dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');
    Route::post('logout',      [AdminController::class, 'AdminLogout'])->name('logout');
});