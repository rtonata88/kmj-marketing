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

        $transfers = RegistrationCredit::where('investor_id', $investor->id)->get();

        $credit =  $transfers->sum('credit_amount');

        $debit =  $transfers->sum('debit_amount');

        return $credit - $debit;
    }

    private function getInvestorAccounts($user): array
    {
        $investor = $user->investor;

        $account_info = array();

        $account_balance = $this->calculateAccountBalance($investor);

        array_push($account_info, [
            "status" => ($investor->status == 0) ? "Not active" : "Active",
            "stage" => $investor->stage->name,
            "balance" => $account_balance
        ]);

        return $account_info;
    }

    private function calculateAccountBalance($investor)
    {
        $transactions = $investor->transactions;

        $balance_info = 0;

        $total_debits = $transactions->sum('debit_amount');

        $total_credits = $transactions->sum('credit_amount');

        $balance_info =   $total_credits - $total_debits;

        return  $balance_info;
    }

}
