<?php

namespace App\Http\Controllers;

use App\Account;
use App\Investor;
use Illuminate\Http\Request;

use Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();

        $noticeMessages = $this->getDashboardNotices($user);

        return view('dashboard', compact('noticeMessages'));
    }

    public function getDashboardNotices($user){
        return [
            "userAccountNotices" => $this->userAccountNotice($user)
        ];
    }

    private function userAccountNotice($user): array {
        $notice = array();

        if($user->user_type === 'investor'){

            $investor = Investor::with('accounts')->where('email', '=', $user->email)->first();

            $accounts = $investor->accounts;

            foreach ($accounts as $account) {
                if ($account->status == 0) {
                    array_push($notice, [
                        "message" => "Your account <strong>{$account->account_number} </strong> is not active. If you just signed up please send your proof of payment to the Administrator.",
                        "type" => "warning"
                    ]);
                }
            }
        }

        return $notice;
    }
}
