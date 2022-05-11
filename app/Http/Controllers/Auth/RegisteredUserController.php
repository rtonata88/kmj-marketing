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
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        
        if(isset($request->referrer_username)){
            $referrerInvestorId = $this->getReferrerInvestorId($request->referrer_username);

            if(is_null($referrerInvestorId)){
                return back()->withInput()->withErrors(["referrer_username" => "Invalid referrer username provided."]);
            }

        } else {
            $referrerInvestorId = 0;
        }
        

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $investor = $this->createInvestorProfile($user->id, $request);

        $this->createInvestorAccount($investor, $referrerInvestorId);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }

    private function createInvestorProfile($user_id, $request){
        return Investor::create(array_merge($request->all(), ['user_id' => $user_id]));
    }

    private function createInvestorAccount($investor, $referrerInvestorId){
        return Account::create(
            [
                "referrer_investor_id"  => $referrerInvestorId,
                "investor_id"       => $investor->id,
                "account_number"    => $this->generateAccountNumber()
            ]
        );
    }

    private function getReferrerInvestorId($referrer_username){
        
        $referrerUser = User::with('investor')
                            ->select('id')
                            ->where('username', $referrer_username)
                            ->first();
        
        if($referrerUser){
            return  $referrerUser->investor->id;
        } else {
            return null;
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
