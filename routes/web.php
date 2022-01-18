<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->middleware('guest');

Route::middleware('auth')->group(function () {
  Route::middleware('is_admin')->group(function () {
    Route::prefix('admin')->group(function () {
      Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);

      
    Route::prefix('user')->group(function () {
      Route::get('/', [App\Http\Controllers\UserController::class, 'index']);
      Route::get('/tambah', [App\Http\Controllers\UserController::class, 'create']);
      Route::post('/tambah', [App\Http\Controllers\UserController::class, 'store']);
    });
    });
  });
});

require __DIR__.'/auth.php';
