<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [App\Http\COntrollers\DashboardController::class, 'index'])->name('dashboard');

Route::resource('countries', App\Http\COntrollers\CountryController::class);
Route::resource('stages', App\Http\COntrollers\StageController::class);
Route::resource('stage-rewards', App\Http\COntrollers\StageRewardController::class);
Route::resource('other-settings', App\Http\COntrollers\OtherSettingController::class);

Route::resource('accounts', App\Http\COntrollers\AccountController::class);

Route::get('/transactions', [App\Http\Controllers\AccountTransactionController::class, 'index'])->name('transactions');

require __DIR__.'/auth.php';
