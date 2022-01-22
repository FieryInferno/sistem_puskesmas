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
        Route::get('/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
        Route::put('/edit/{id}', [App\Http\Controllers\UserController::class, 'update']);
        Route::delete('/hapus/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
      });

      Route::prefix('poliklinik')->group(function () {
        Route::get('/', [App\Http\Controllers\PoliklinikController::class, 'index']);
        Route::get('/tambah', [App\Http\Controllers\PoliklinikController::class, 'create']);
        Route::post('/tambah', [App\Http\Controllers\PoliklinikController::class, 'store']);
        Route::get('/edit/{id}', [App\Http\Controllers\PoliklinikController::class, 'edit']);
        Route::put('/edit/{id}', [App\Http\Controllers\PoliklinikController::class, 'update']);
        Route::delete('/hapus/{id}', [App\Http\Controllers\PoliklinikController::class, 'destroy']);
      });

      Route::prefix('poster')->group(function () {
        Route::post('/tambah', [App\Http\Controllers\PosterController::class, 'store']);
        Route::delete('/hapus/{id}', [App\Http\Controllers\PosterController::class, 'destroy']);
      });

      Route::prefix('nilai')->group(function () {
        Route::get('/', [App\Http\Controllers\NilaiController::class, 'index']);
        Route::post('/tambah', [App\Http\Controllers\NilaiController::class, 'store']);
        Route::put('/edit/{id}', [App\Http\Controllers\NilaiController::class, 'update']);
        Route::delete('/hapus/{id}', [App\Http\Controllers\NilaiController::class, 'destroy']);
      });
    });
  });

  Route::middleware('is_pasien')->group(function () {
    Route::prefix('pasien')->group(function () {
      Route::get('/', [App\Http\Controllers\PasienController::class, 'index']);

      Route::prefix('poliklinik')->group(function () {
        Route::get('/', [App\Http\Controllers\PoliklinikController::class, 'index']);
      });

      Route::prefix('poster')->group(function () {
        Route::post('/tambah', [App\Http\Controllers\PosterController::class, 'store']);
        Route::delete('/hapus/{id}', [App\Http\Controllers\PosterController::class, 'destroy']);
      });

      Route::prefix('nilai')->group(function () {
        Route::get('/', [App\Http\Controllers\NilaiController::class, 'index']);
        Route::post('/tambah', [App\Http\Controllers\NilaiController::class, 'store']);
      });
    });
  });
});

require __DIR__.'/auth.php';
