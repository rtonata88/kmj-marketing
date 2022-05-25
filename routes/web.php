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
    return view('website.index');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('/admin/deposits', App\Http\COntrollers\InvestorDepositsController::class);

    Route::get('/withdrawals/process/{id}', [App\Http\COntrollers\WithdrawalController::class, 'process']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\COntrollers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('countries', App\Http\COntrollers\CountryController::class);
    Route::resource('stages', App\Http\COntrollers\StageController::class);
    Route::resource('stage-rewards', App\Http\COntrollers\StageRewardController::class);
    Route::resource('other-settings', App\Http\COntrollers\OtherSettingController::class);

    Route::resource('accounts', App\Http\COntrollers\AccountController::class);
    Route::resource('transfer', App\Http\COntrollers\TransferController::class);
    Route::resource('withdrawals', App\Http\COntrollers\WithdrawalController::class);
    Route::resource('investor', App\Http\COntrollers\InvestorController::class);
    Route::resource('bank-account', App\Http\COntrollers\BankAccountController::class);
    Route::get('/bank-info/{id}', [App\Http\COntrollers\BankController::class, 'getBankBranchesByBankId']);

    Route::get('/registration-transactions/{investor_id}', [App\Http\COntrollers\RegistrationCreditController::class, 'statement']);
    Route::get('/network/chart-view', [App\Http\Controllers\NetworkController::class, 'chartView']);
    Route::get('/network/grid-view', [App\Http\Controllers\NetworkController::class, 'gridView']);

    Route::get('/transactions', [App\Http\Controllers\AccountTransactionController::class, 'index'])->name('transactions');
});

Route::get('/home', [App\Http\Controllers\WebsiteController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\WebsiteController::class, 'about'])->name('about');
Route::get('/plans', [App\Http\Controllers\WebsiteController::class, 'plans'])->name('plans');
Route::get('/contact', [App\Http\Controllers\WebsiteController::class, 'contact'])->name('contact');

require __DIR__.'/auth.php';
