<?php

namespace App\Http\Controllers\Auth;

use App\Town;
use App\Stage;
use App\Region;
use App\Country;
use App\Models\User;
use App\OtherSetting;
use App\StageRequirement;
use App\AccountTransaction;
use App\Actions\CreditInvestorProfitAccount;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Models\RegistrationCredit;
use App\Http\Controllers\Controller;
use App\Investor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Services\CreateInvestorProfileService;
use App\Services\UpgradeAccountStageService;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id');

        $towns = Town::pluck('name', 'id');

        $regions = Region::pluck('name', 'id');

        return view('auth.register', compact('countries', 'towns', 'regions'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, CreateInvestorProfileService $createInvestor, UpgradeAccountStageService $upgradeAccount, CreditInvestorProfitAccount $creditAccount)
    {
        $request->validate([
            'referrer_username' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        $referrerInvestor = $createInvestor->getReferrerInvestor($request->referrer_username);

        if(is_null($referrerInvestor)){
            return back()->withInput()->withErrors(["referrer_username" => "Invalid referrer username provided."]);
        }
        
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $createNewInvestor = $createInvestor->createInvestorProfile($user->id, $request, $referrerInvestor);

        if ($createNewInvestor['status'] == 'failed') {
            $user->delete();

            return back()->withInput()->withErrors(["referrer_username" => $createNewInvestor['reason']]);
        }

        $newInvestor = Investor::withDepth()->find($createNewInvestor['investor']->id);

        $upgradeAccount->upgradeAncestorAccounts($newInvestor);

        $creditAccount->execute($newInvestor);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
