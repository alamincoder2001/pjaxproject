<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::post('/update-user', [HomeController::class, 'update'])->name('update-user');
Route::get('/database-backup', [HomeController::class, 'backupDownload']);
