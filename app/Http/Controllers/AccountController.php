<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountTransaction;
use App\Http\Requests\AccountUpdateRequest;
use App\Http\Requests\AccountStoreRequest;
use App\Investor;
use App\Models\RegistrationCredit;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

use Auth;

class AccountController extends Controller
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

        $accounts = $this->getInvestorAccounts($user);

        $investor =  $user->investor;

        $available_registration_balance = $this->calculateAvailableBalance($investor);

        return view('.accounts.index', compact('accounts', 'investor', 'available_registration_balance'));
    }

    private function calculateAvailableBalance($investor)
    {

        $transfers = RegistrationCredit::where('investor_id', $investor->id)
            ->get();

        $credit =  $transfers->sum('credit_amount');

        $debit =  $transfers->sum('debit_amount');

        return $credit - $debit;
    }

    private function getInvestorAccounts($user): array
    {
        $account = $user->investor->account;

        $account_info = array();

        $account_balance = $this->calculateAccountBalance($account);

        array_push($account_info, [
            "account_number" => $account->account_number,
            "status" => ($account->status == 0) ? "Not active" : "Active",
            "stage" => $account->stage->name,
            "balance" => $account_balance
        ]);

        return $account_info;
    }

    private function calculateAccountBalance($account)
    {
        $transactions = $account->transactions;

        $balance_info = 0;

        $total_debits = $transactions->sum('debit_amount');

        $total_credits = $transactions->sum('credit_amount');

        $balance_info =  $total_debits - $total_credits;

        return  $balance_info;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account = new Account();
        return view('.accounts.create', compact('account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AccountStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountStoreRequest $request)
    {
        
        if (isset($request->referrer_account)) {
            $referrerAccountId = $this->getReferrerAccountId($request);

            if ($referrerAccountId == 0) {
                return back()->withInput()->withErrors(["referrer_account" => "Invalid referrer account number provided, please enter a valid account number."]);
            }
        } else {
            $referrerAccountId = 0;
        }

        $investor = Investor::where('email', '=', Auth::user()->email)->first();

        $other_data = [
            "investor_id" => $investor->id,
            "referrer_account_id" =>  $referrerAccountId,
            "account_number" =>  $this->generateAccountNumber()
        ];

        Account::create(array_merge($request->except('_token'), $other_data));

        return $this->success('Account added successfully!', 'accounts.index');
    }

    private function getReferrerAccountId($request)
    {
        $referrerAccount = Account::select('id')
            ->where('account_number', $request->referrer_account)
            ->where('status', 1)
            ->first();

        if ($referrerAccount) {
            return  $referrerAccount->id;
        } else {
            return 0;
        }
    }

    private function generateAccountNumber()
    {
        $account_number = rand(100000, 999999);

        if (Account::where('account_number', $account_number)->first()) {
            $this->generateAccountNumber();
        } else {
            return  $account_number;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Account $account)
    {
        $previous = $account->where('id', '<', $account->id)->max('id');
        $next = $account->where('id', '>', $account->id)->min('id');

        return view('.accounts.show', compact('account'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Account $account)
    {
        return view('.accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AccountUpdateRequest  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(AccountUpdateRequest $request, Account $account)
    {
        $account->update($request->except('_token'));
        return $this->success('Account updated successfully!', 'accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return $this->success('Account deleted successfully!', 'accounts.index');
    }
}
