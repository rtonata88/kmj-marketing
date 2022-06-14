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
    Route::resource('/admin/deposits', App\Http\Controllers\InvestorDepositsController::class);

    Route::get('/withdrawals/process/{id}', [App\Http\Controllers\WithdrawalController::class, 'process']);

    Route::get('/registrations', [App\Http\Controllers\InvestorController::class, 'registrations']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('countries', App\Http\Controllers\CountryController::class);
    Route::resource('stages', App\Http\Controllers\StageController::class);
    Route::resource('stage-rewards', App\Http\Controllers\StageRewardController::class);
    Route::resource('other-settings', App\Http\Controllers\OtherSettingController::class);

    Route::resource('accounts', App\Http\Controllers\AccountController::class);
    Route::resource('reward-claims', App\Http\Controllers\RewardClaimController::class);
    Route::resource('transfer', App\Http\Controllers\TransferController::class);
    Route::resource('withdrawals', App\Http\Controllers\WithdrawalController::class);
    Route::resource('investor', App\Http\Controllers\InvestorController::class);
    Route::resource('bank-account', App\Http\Controllers\BankAccountController::class);
    Route::get('/bank-info/{id}', [App\Http\Controllers\BankController::class, 'getBankBranchesByBankId']);
    Route::get('/admin/reward-claims', [App\Http\Controllers\RewardClaimController::class, 'viewClaims'])->name('admin.index.claims');
    Route::get('/admin/reward-claims/{id}/process', [App\Http\Controllers\RewardClaimController::class, 'viewProcessForm']);
    Route::get('/reward-claims/process/{id}', [App\Http\Controllers\RewardClaimController::class, 'process']);
    Route::get('/withdrawals/cancel/{id}', [App\Http\Controllers\WithdrawalController::class, 'cancel']);
    Route::get('/update-password', [App\Http\Controllers\InvestorController::class, 'showUpdatePassword']);
    Route::post('/update-password', [App\Http\Controllers\InvestorController::class, 'updatePassword'])->name('investor.update-password');

    Route::get('/registration-transactions/{investor_id}', [App\Http\Controllers\RegistrationCreditController::class, 'statement']);
    Route::get('/network/chart-view', [App\Http\Controllers\NetworkController::class, 'chartView'])->name('network.chart');
    Route::get('/network/grid-view', [App\Http\Controllers\NetworkController::class, 'gridView']);
    Route::get('/child-network/{id}', [App\Http\Controllers\NetworkController::class, 'showNetwork']);
    Route::post('/child-network/validate-username', [App\Http\Controllers\NetworkController::class, 'validateUsername'])->name('validate.username');

    Route::get('/transactions', [App\Http\Controllers\AccountTransactionController::class, 'index'])->name('transactions');
});

Route::get('/home', [App\Http\Controllers\WebsiteController::class, 'home'])->name('home');
Route::get('/about', [App\Http\Controllers\WebsiteController::class, 'about'])->name('about');
Route::get('/plans', [App\Http\Controllers\WebsiteController::class, 'plans'])->name('plans');
Route::get('/contact', [App\Http\Controllers\WebsiteController::class, 'contact'])->name('contact');

require __DIR__.'/auth.php';
