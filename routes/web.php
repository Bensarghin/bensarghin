<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

//admin controllers
use App\Http\Controllers\Backoffice\BlogController;
use App\Http\Controllers\Backoffice\UserController;
use App\Http\Controllers\Backoffice\CategoryController;
use App\Http\Controllers\Backoffice\DashboardController;
use App\Http\Controllers\Backoffice\TopicController;


//visiteur controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

    Route::prefix('admin')->group(function ()  {

        Route::get('/',[DashboardController::class,'index'])->name('admin.home');
        Route::get('home',[DashboardController::class,'index'])->name('admin.home');
        Route::get('login', [AdminController::class,'login'])->name('admin.login');
        Route::post('check', [AdminController::class,'check'])->name('admin.check');
        Route::post('logout', [AdminController::class,'logout'])->name('admin.logout');
    
    Route::prefix('blogs')->name('blog.')->group(function () {
        Route::get('/', [BlogController::class,'index'])->name('index');
        Route::get('create/{user}', [BlogController::class,'create'])->name('create');
        Route::post('insert', [BlogController::class,'store'])->name('insert');
    });

    Route::prefix('users')->name('user.')->group(function () {
        Route::get('/', [UserController::class,'index'])->name('index');
        Route::get('show/{user}', [UserController::class,'show'])->name('show');
        Route::get('edit/{id}', [UserController::class,'edit'])->name('edit');
        Route::get('delete/{id}', [UserController::class,'destroy'])->name('delete');
    });

    Route::prefix('categories')->name('category.')->group(function () {
        Route::get('/', [CategoryController::class,'index'])->name('index');
        Route::get('/getcategories', [CategoryController::class,'create']);
        Route::get('/gettopics', [CategoryController::class,'gettopics']);
        Route::post('/insertcategory', [CategoryController::class,'store']);
    });

    Route::prefix('topics')->name('topic.')->group(function () {
        Route::get('/', [TopicController::class,'index'])->name('index');
        Route::get('/gettopics', [TopicController::class,'create']);
        Route::post('/inserttopic', [TopicController::class,'store']);
    });


});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
Route::get('home/', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index']);
        Route::get('/your-blogs', [HomeController::class, 'yourBlogs'])->name('your.blogs');
        Route::get('/create-blog', [HomeController::class, 'createBlog'])->name('create.blog');
        Route::post('/create-blog', [HomeController::class, 'storeBlog'])->name('store.blog');
        Route::post('/search-blog', [HomeController::class, 'searchBlog'])->name('search.blog');
        Route::get('/read-blog/{blog}', [HomeController::class, 'read'])->name('read.blog');
        Route::get('/getcomments', [HomeController::class, 'getComments']);
        Route::post('/comment', [HomeController::class, 'storeComment']);

        Route::get('/category/{category}', [HomeController::class, 'category'])->name('category.blogs');
        
Auth::routes();
//...
});