<?php

namespace App\Http\Controllers\Auth;

use App\Account;
use App\Country;
use App\Events\CreateInvestor;
use App\Http\Controllers\Controller;
use App\Investor;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Region;
use App\Town;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if(isset($request->referrer_account)){
            $referrerAccountId = $this->getReferrerAccountId($request);

            if($referrerAccountId == 0){
                return back()->withInput()->withErrors(["referrer_account" => "Invalid account number provided, please enter a valid account number."]);
            }

        } else {
            $referrerAccountId = 0;
        }
        
        $investor = $this->createInvestorProfile($request);

        $this->createInvestorAccount($investor, $referrerAccountId);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    private function createInvestorProfile($request){
        return Investor::create($request->all());
    }

    private function createInvestorAccount($investor, $referrerAccountId){
        return Account::create(
            [
                "referrer_account_id"  => $referrerAccountId,
                "investor_id"       => $investor->id,
                "account_number"    => $this->generateAccountNumber()
            ]
        );
    }

    private function getReferrerAccountId($request){
        $referrerAccount = Account::select('id')
                                    ->where('account_number', $request->referrer_account)
                                    ->where('status', 1)
                                    ->first();
        
        if($referrerAccount){
            return  $referrerAccount->id;
        } else {
            return 0;
        }
    }

    private function generateAccountNumber(){
        $account_number = rand(100000, 999999);

        if(Account::where('account_number', $account_number)->first()){
            $this->generateAccountNumber();
        } else {
            return  $account_number;
        }
    }
}
