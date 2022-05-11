<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountTransaction;
use App\Investor;
use Illuminate\Http\Request;

use Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();

        $noticeMessages = $this->getDashboardNotices($user);

        $accounts = $this->getInvestorAccounts($user);

        return view('dashboard', compact('noticeMessages', 'accounts'));
    }

    private function getInvestorAccounts($user): array{

        $investor = Investor::with('account')->where('user_id', '=', $user->id)->first();

        $account = $investor->account;

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

    private function calculateAccountBalance($account) {
        $transactions = $account->transactions;

        $balance_info = 0;

        $total_debits = $transactions->sum('debit_amount');

        $total_credits = $transactions->sum('credit_amount');

        $balance_info =  $total_debits - $total_credits;

        return  $balance_info;
    }

    private function getDashboardNotices($user){
        return [
            "userAccountNotices" => $this->userAccountNotice($user)
        ];
    }

    private function userAccountNotice($user): array {
        $notice = array();

        if($user->user_type === 'investor'){

            $investor = Investor::with('account')->where('user_id', '=', $user->id)->first();

            $account = $investor->account;

            if ($account->status == 0) {
                array_push($notice, [
                    "message" => "Your account is not active. If you just signed up please send your proof of payment to the Administrator.",
                    "type" => "warning"
                ]);
            }
        }

        return $notice;
    }
}
