<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArticalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/artical', function () {
    return '<h1>Alaa Adel Mahmoud</h1>';
});

Route::get('/index', [ArticalController::class, 'index']);
Route::get("/blog/{id?}",[\App\Http\Controllers\Api\SiteController::class,"index"]);

