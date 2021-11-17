<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backoffice\BlogController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\Backoffice\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use PHPUnit\TextUI\XmlConfiguration\Group;

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
    return view('welcome');
});

Route::group(['prefix'=>'admin','middleware'=>'auth:admin'],function(){

    Route::get('/',function(){
        return view('Guests.login');
    })->name('admin.lg');

    Route::get('login',[AdminController::class,'login'])->name('admin.login');
    Route::get('home',[AdminController::class,'index'])->name('admin.home');
});

Auth::routes();
    
    Route::prefix('blogs')->group(function () {
        Route::get('/list', [BlogController::class,'index'])->name('blog');
        Route::get('create', [BlogController::class,'create'])->name('blog.create');
        Route::post('insert', [BlogController::class,'store'])->name('blog.insert');
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class,'index'])->name('user');
        Route::get('show/{user}', [UserController::class,'show'])->name('user.show');
        Route::get('edit/{id}', [UserController::class,'edit'])->name('user.edit');
        Route::get('delete/{id}', [UserController::class,'destroy'])->name('user.delete');
    });
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class,'index'])->name('category');
        Route::get('/get', [CategoryController::class,'create']);
    });
    
// });

Route::get('home', [HomeController::class, 'index'])->name('home');

Auth::routes();
