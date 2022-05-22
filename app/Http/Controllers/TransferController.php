<?php

namespace App\Http\Controllers;

use App\Account;
use App\AccountTransaction;
use App\Investor;
use App\Models\RegistrationCredit;
use App\Models\User;
use App\OtherSetting;
use App\Stage;
use App\Models\Tree;
use App\StageRequirement;
use Illuminate\Http\Request;

use Auth;
use LengthException;
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
        $registration_credit->transaction_description = "Transfer to ". $toInvestor->name;
        $registration_credit->transaction_date = date('Y-m-d');
        $registration_credit->debit_amount = $request->debit_amount;
        $registration_credit->credit_amount = 0;
        $registration_credit->save();

        $this->creditToInvestorAccount($registration_credit, $toInvestor, $investor);

        $account = $toInvestor->account;
        
        $toInvestorAccountNeedsActivation = $this->checkIfToInvestorNeedsActivation($account);
        
        if($toInvestorAccountNeedsActivation){
            $this->activateToInvestorAccount($account);
        }
        
        Session::flash('flash_message', 'Your transfer request has been processed.');

        return redirect()->route('transfer.index');
    }

    private function creditToInvestorAccount($registration_credit, $toInvestor, $fromInvestor){
        
        $credit = new RegistrationCredit();
        $credit->investor_id =  $toInvestor->id;
        $credit->transaction_description = "Transfer from ". $fromInvestor->name;
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
            //$account->save();
            
            $this->debitToInvestorAccount($account->investor, $registration_amount);
            
            $this->checkIfReferrerAccountNeedsUpgrade($account->referrer_investor_id);
        }
    }

    private function debitToInvestorAccount($investor, $registration_amount){
        $credit = new RegistrationCredit();
        $credit->investor_id =  $investor->id;
        $credit->transaction_description = "Account Activation Fee";
        $credit->transaction_date = date('Y-m-d');
        $credit->debit_amount = $registration_amount;
        $credit->credit_amount = 0;
        $credit->save();

        return $credit;
    }

    private function checkIfReferrerAccountNeedsUpgrade($referrer_investor_id){
        
        if($referrer_investor_id != 0){
            $investor = Investor::find($referrer_investor_id);

            $stageRequiredPeople = StageRequirement::where('stage_id', $investor->account->stage_id)->first();
            
            $investorChildrenAccounts = $this->getChildrenAccounts($investor->id, 0);
            dd($investorChildrenAccounts);
            if(count($investorChildrenAccounts) > $stageRequiredPeople->people){
                $this->updgradeAccount($investor->account);
            }
        }
    }

    private function updgradeAccount($account){
        $last_stage = Stage::last();
        if($account->stage_id < $last_stage->id){
            $account->stage = ($account->stage + 1);
            $account->save();
        }
    }

    private function getChildrenAccounts($parentInvestorId, $children){

        $childrenAccount = Account::where('referrer_investor_id', $parentInvestorId)->get();

        $count = 0;

        while ($count < count($childrenAccount)) {
            foreach($childrenAccount as $index => $child){
                echo $child->investor->name . "<br>";
                $children++;
                if($index == 1){
                    $this->getChildrenAccounts($child->investor->id, $children);
                }
            }
            echo $children . "<br>";
            
            $this->getChildrenAccounts($childrenAccount[$count]->investor->id, $children);
            $count++;
        }
        exit;
        return $childrenAccount;
        
    }
}
