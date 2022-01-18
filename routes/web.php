<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])->middleware('guest');

Route::middleware('auth')->group(function () {
  Route::middleware('is_admin')->group(function () {
    Route::prefix('admin')->group(function () {
      Route::get('/', [App\Http\Controllers\Admin::class, 'index']);

      
    Route::prefix('user')->group(function () {
      Route::get('/', [App\Http\Controllers\User::class, 'index']);
    });
    });
  });
});

require __DIR__.'/auth.php';
