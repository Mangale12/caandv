<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::middleware(['auth','web'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/users', App\Http\Controllers\Admin\UserController::class);
    Route::post('/colab/saveNote',[App\Http\Controllers\Admin\ColabController::class, 'saveNote'])->name('colab.saveNote');
    Route::get('/colab/detail/{id}',[App\Http\Controllers\Admin\ColabController::class, 'show'])->name('colab.detail');
    Route::resource('/colab', App\Http\Controllers\Admin\ColabController::class);
    Route::get('/colab/{$id}', [App\Http\Controllers\Admin\ColabController::class,'delete'])->name('colab.delete');
    Route::get('/colab/search', [App\Http\Controllers\Admin\ColabController::class,'search'])->name('colab.search');
    Route::get('/colab/sort/', [App\Http\Controllers\Admin\ColabController::class,'search'])->name('colab.sort');
    Route::resource('/questions', App\Http\Controllers\Admin\QuestionsController::class);


    Route::get('/settings', [App\Http\Controllers\Admin\SettingsController::class,'index'])->name('settings.index');
    Route::put('/settings/update/{id}', [App\Http\Controllers\Admin\SettingsController::class,'update'])->name('settings.update');
});
