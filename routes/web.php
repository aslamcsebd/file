<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'welcome']);

Auth::routes();

// Group routes that require authentication
Route::middleware(['auth'])->group(function ()
{
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/file-list', [FileController::class, 'fileList']);
    Route::post('/add-category', [FileController::class, 'addCategory']);
    Route::post('/add-file', [FileController::class, 'addFile']);
    Route::get('/status/update', [HomeController::class, 'changeStatus']);
});


