<?php

use App\Http\Controllers\Web\ColabController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    Auth::logout();
	return redirect(route('login'));
});

Route::get('clear', function () {
	Artisan::call('cache:clear');
	Artisan::call('config:clear');
	Artisan::call('config:cache');
	Artisan::call('route:cache');
	// return redirect()->back();
});
// Auth::routes();

Route::post('saveForm', [ColabController::class, 'store'])->name('forms.saveForm');
Route::post('country/get_state_by_country', [ColabController::class, 'get_state_by_country'])->name('country.get_state_by_country');
Route::post('country/get_city_by_state', [ColabController::class, 'get_city_by_state'])->name('country.get_city_by_state');


Route::get('formsuccess', function () { return view('formsuccess'); })->name('formsuccess');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
