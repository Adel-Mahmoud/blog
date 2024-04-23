<?php

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
});

Auth::routes();
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth'])->group(function () {
  Route::group(['prefix' => 'admin'], function () { 
    Route::get("/dashboard",[\App\Http\Controllers\DashboardController::class,"index"])->name('dashboard.index');
    Route::get("/users2",[\App\Http\Controllers\UserController::class,"test"])->name('users2.test');
    Route::resource("users",\App\Http\Controllers\UserController::class);
    Route::resource("categories",\App\Http\Controllers\CategoryController::class);
    Route::resource("posts",\App\Http\Controllers\PostController::class);
    Route::resource("tags",\App\Http\Controllers\TagController::class);
    Route::resource("comments",\App\Http\Controllers\CommentController::class);
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
  });  
});

// site controller
Route::get("/blog/{id?}",[\App\Http\Controllers\SiteController::class,"index"])->name('site.index');
Route::get('blog/post/{id}', [\App\Http\Controllers\SiteController::class, 'show'])->name('site.show');
Route::get('blog/reply/{id}', [\App\Http\Controllers\SiteController::class, 'reply'])->name('site.reply');
Route::post("blog/store",[\App\Http\Controllers\SiteController::class,"store"])->name('site.store');
/*
Route::get('/users/edit', function () {
    return view('users.edit');
});
*/