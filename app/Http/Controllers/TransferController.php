<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountTransaction;
use App\Actions\CreditRegistrationAccount;
use App\Actions\DebitRegistrationAccount;
use App\Investor;
use App\Models\RegistrationCredit;
use App\Models\User;
use App\OtherSetting;
use App\Stage;
use App\Models\Tree;
use App\StageRequirement;
use Illuminate\Http\Request;

use Auth;
use Session;

class TransferController extends Controller
{
    public function index(){
        $investor = Auth::user()->investor;

        $accountTransactions = RegistrationCredit::where('investor_id', $investor->id)
                                        ->get();

        return view('.account-transactions.registration-credits', compact('accountTransactions', 'investor'));
    }


    public function create(){
        $user = Auth::user();

        $investor = $user->investor;

        if($user->user_type == 'admin'){
            $available_balance = 10000;
        } else {
            $available_balance = $this->calculateAvailableBalance($investor);
        }

        return view('transfers.create', compact('available_balance'));
    }

    private function calculateAvailableBalance($investor){
        
        $transfers = RegistrationCredit::where('investor_id', $investor->id)
                                        ->get();
        
        $credit =  $transfers->sum('credit_amount');

        $debit =  $transfers->sum('debit_amount');

        return $credit - $debit;
    }

    public function store(Request $request){
        $request->validate([
            'debit_amount' => 'required|numeric|min:1',
            'to_username' => ['required', 'string', 'max:255'],
        ]);

        $toInvestor = $this->getToInvestor($request->to_username);
        
        if (is_null($toInvestor)) {
            return back()->withInput()->withErrors(["username" => "Invalid username provided."]);
        }

        $investor = Auth::user()->investor;

        $this->debitReferrerRegistrationAccount($investor, $toInvestor, $request->debit_amount);

        $this->creditInvestorRegistrationAccount($investor, $toInvestor, $request->debit_amount);
        
        Session::flash('flash_message', 'Your transfer request has been processed.');

        return redirect()->route('transfer.index');
    }

    private function debitReferrerRegistrationAccount($referrerInvestor, $newInvestor, $minimumRegistrationCredit)
    {
        $debitRegistrationCredit = new DebitRegistrationAccount($referrerInvestor, $newInvestor, $minimumRegistrationCredit, "Transfer to " . $newInvestor->name);

        $debitRegistrationCredit->execute();
    }

    private function creditInvestorRegistrationAccount($referrerInvestor, $newInvestor, $minimumRegistrationCredit)
    {
        $creditRegistrationCredit = new CreditRegistrationAccount($referrerInvestor, $newInvestor, $minimumRegistrationCredit, "Transfer from " . $referrerInvestor->name);

        $creditRegistrationCredit->execute();
    }

    private function getToInvestor($username)
    {

        $user = User::with('investor')
                        ->select('id')
                        ->where('username', $username)
                        ->first();
        
        if ($user) {
            return  $user->investor;
        } else {
            return null;
        }
    }
}
