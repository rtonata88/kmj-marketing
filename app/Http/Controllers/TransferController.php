<?php

namespace App\Http\Controllers;

use App\AccountTransaction;
use App\Models\RegistrationCredit;
use App\Models\User;
use App\OtherSetting;
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

        $investor = Auth::user()->investor;

        $available_balance = $this->calculateAvailableBalance($investor);

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

        $registration_credit = new RegistrationCredit();
        $registration_credit->investor_id =  $investor->id;
        $registration_credit->from_id =  $investor->id;
        $registration_credit->to_id = $toInvestor->id;
        $registration_credit->from_name = $investor->name;
        $registration_credit->to_name = $toInvestor->name;
        $registration_credit->transaction_description = "Registration Credit Transfer";
        $registration_credit->transaction_date = date('Y-m-d');
        $registration_credit->debit_amount = $request->debit_amount;
        $registration_credit->credit_amount = 0;
        $registration_credit->save();

        $this->creditToInvestorAccount($registration_credit, $toInvestor);

        $account = $toInvestor->with('account')->first()->account;

        $toInvestorAccountNeedsActivation = $this->checkIfToInvestorNeedsActivation($account);

        if($toInvestorAccountNeedsActivation){
            $this->activateToInvestorAccount($account);
        }
        
        Session::flash('flash_message', 'Your transfer request has been processed.');

        return redirect()->route('transfer.index');
    }

    private function creditToInvestorAccount($registration_credit, $toInvestor){
        
        $credit = new RegistrationCredit();
        $credit->investor_id =  $toInvestor->id;
        $credit->from_id =  $registration_credit->from_id;
        $credit->to_id = $registration_credit->to_id;
        $credit->from_name = $registration_credit->from_name;
        $credit->to_name = $registration_credit->to_name;
        $credit->transaction_description = "Registration Credit Transfer";
        $credit->transaction_date = date('Y-m-d');
        $credit->debit_amount = 0;
        $credit->credit_amount = $registration_credit->debit_amount;
        $credit->save();
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

    private function checkIfToInvestorNeedsActivation($account){
        
        if($account->status == 0){
            return true;
        } else {
            return false;
        }
    }

    private function activateToInvestorAccount($account){
        
        $available_balance = $this->calculateAvailableBalance($account->investor);
        
        $registration_amount = OtherSetting::select('value')
                                            ->where('label', '=', 'Registration Amount')
                                            ->first()
                                            ->value;

        //Check if investor has enough credits to activate account                                            
        if($available_balance >= $registration_amount){
            $account->status = 1;
            $account->save();
        }
    }
}
