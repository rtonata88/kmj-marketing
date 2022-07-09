<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountTransaction;
use App\Investor;
use App\Models\InvestorDeposit;
use App\Models\RewardClaim;
use App\Models\Withdrawal;
use App\Services\MyReferrerDetails;

use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(MyReferrerDetails $referrerDetails){
        $user = Auth::user();

        if($user->user_type == 'investor'){

            $noticeMessages = $this->getDashboardNotices($user);

            $accounts = $this->getInvestorAccounts($user);

            $investor =  $user->investor;

            $referrerDetails = $referrerDetails->details($investor);

            return view('dashboard', compact('noticeMessages', 'accounts', 'investor', 'referrerDetails'));
        } else {
            $investors = Investor::where('status', 1)->count() ?? 0;

            $deposits = InvestorDeposit::sum('amount');

            $withdraws = Withdrawal::all();

            $claims = RewardClaim::with('reward')->get();

            $payouts = $withdraws->where('status', 'processed')->sum('payout_amount');

            $total_claim_value = $this->calculateTotalRewardValues($claims);

            $pending_withdraws = $withdraws->where('status', 'pending');

            $pending_claims = $claims->where('status', 'pending');

            return view('admin.dashboard', compact('investors', 'deposits', 'payouts', 'pending_withdraws', 'total_claim_value', 'pending_claims'));
        }
    }

    private function calculateTotalRewardValues($claims){

        $value = 0;

        foreach($claims->where('status', 'processed') as $claim){
            $value += $claim->reward->value;
        }

        return  $value;
    }

    private function getInvestorAccounts($user): array{

        $investor = Investor::where('user_id', '=', $user->id)->first();
        $account_info = array();
        $account_balance = $this->calculateAccountBalance($investor);

        array_push($account_info, [
            "status" => ($investor->status == 0) ? "Not active" : "Active",
            "stage" => $investor->stage->name,
            "balance" => $account_balance
        ]);

        return $account_info;
    }

    private function calculateAccountBalance($investor) {
        $transactions = $investor->transactions;

        $balance_info = 0;

        $total_debits = $transactions->sum('debit_amount');

        $total_credits = $transactions->sum('credit_amount');

        $balance_info =   $total_credits - $total_debits;

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

            $investor = Investor::where('user_id', '=', $user->id)->first();

            if ($investor->status == 0) {
                array_push($notice, [
                    "message" => "Your account is not active. If you just signed up please send your proof of payment to the Administrator.",
                    "type" => "warning"
                ]);
            }
        }

        return $notice;
    }
}
