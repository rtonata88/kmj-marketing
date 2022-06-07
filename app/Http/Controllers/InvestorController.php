<?php

namespace App\Http\Controllers;

use App\Actions\CreditInvestorProfitAccount;
use App\Actions\CreditRegistrationAccount;
use App\Actions\DebitRegistrationAccount;
use App\Actions\TransferRegistrationCredit;
use App\Country;
use App\Investor;
use App\Http\Requests\InvestorUpdateRequest;
use App\Http\Requests\InvestorStoreRequest;
use App\Models\User;
use App\Region;
use App\Services\CreateInvestorProfileService;
use App\Services\GetReferrerInvestor;
use App\Services\UpgradeAccountStageService;
use App\Town;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

use Auth;
use Hash;
class InvestorController extends Controller
{
    use RedirectsWithFlash;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $investor = $user->investor;
        
        return view('.investors.index', compact('investor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(GetReferrerInvestor $referrerInvestor)
    {
        $investor = new Investor();

        $countries = Country::pluck('name', 'id');

        $regions = Region::pluck('name', 'id');

        $towns = Town::pluck('name', 'id');

        $investor = Auth::user()->investor;

        $referrerInvestor = $referrerInvestor->referrerInvestor($investor);
        
        return view('.investors.create', compact('investor', 'countries', 'regions', 'towns', 'referrerInvestor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InvestorStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvestorStoreRequest $request, TransferRegistrationCredit $transferRegistrationCredit, CreateInvestorProfileService $createInvestor,UpgradeAccountStageService $upgradeAccount, CreditInvestorProfitAccount $creditAccount)
    {
        $referrerInvestor = Investor::find($request->referrer_investor);

        $investor = Auth::user()->investor;
        
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        $transfer = $transferRegistrationCredit->execute($investor, $referrerInvestor);

        if ($transfer["status"] == 'failed'){
            $user->delete();

            return back()->withInput()->withErrors(["referrer_username" => $transfer['reason']]);
        }

        $createNewInvestor = $createInvestor->createInvestorProfile($user->id, $request, $referrerInvestor);

        if ($createNewInvestor['status'] == 'failed') {
            $user->delete();

            return back()->withInput()->withErrors(["referrer_username" => $createNewInvestor['reason']]);
        }
        
        $upgradeAccount->upgradeAncestorAccounts($createNewInvestor['investor']->ancestors()->withDepth()->get()->reverse());
        
        $creditAccount->execute($createNewInvestor['investor']);

        return redirect()->route('network.chart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Investor $investor)
    {
        $previous = $investor->where('id', '<', $investor->id)->max('id');
        $next = $investor->where('id', '>', $investor->id)->min('id');

        return view('.investors.show', compact('investor'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Investor $investor)
    {   
        $countries = Country::pluck('name', 'id'); 

        $towns = Town::pluck('name', 'id'); 
        
        $regions = Region::pluck('name', 'id');

        return view('.investors.edit', compact('investor', 'countries', 'towns', 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InvestorUpdateRequest  $request
     * @param  \App\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function update(InvestorUpdateRequest $request, Investor $investor)
    {
        $investor->update($request->except('_token'));

        if (isset($request->password)) {
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
            $user = Auth::user();

            $user->update(['password' => Hash::make($request->password)]);
        }

        return $this->success('Investor updated successfully!', 'investor.index');
    }

    public function registrations()
    {
        $investors = Investor::paginate(50);
        
        return view('admin.investors.index', compact('investors'));
    }
}
