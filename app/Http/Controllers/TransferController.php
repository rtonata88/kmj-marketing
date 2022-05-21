<?php

namespace App\Http\Controllers;

use App\AccountTransaction;
use App\Models\RegistrationCredit;
use App\Models\User;
use Illuminate\Http\Request;

use Auth; 
use Session;

class TransferController extends Controller
{
    public function index(){
        $investor = Auth::user()->investor;

        $accountTransactions = RegistrationCredit::where('from_id', $investor->id)
                                        ->orWhere('to_id', $investor->id)
                                        ->get();

        return view('.account-transactions.registration-credits', compact('accountTransactions', 'investor'));
    }


    public function create(){

        $investor = Auth::user()->investor;

        $available_balance = $this->calculateAvailableBalance($investor);

        return view('transfers.create', compact('available_balance'));
    }

    private function calculateAvailableBalance($investor){
        
        $transfers = RegistrationCredit::where('from_id', $investor->id)
                                        ->orWhere('to_id', $investor->id)
                                        ->get();
        
        $credit =  $transfers->where('to_id', $investor->id)->sum('credit_amount');

        $debit =  $transfers->where('from_id', $investor->id)->sum('debit_amount');

        return $credit - $debit;
    }

    public function store(Request $request){
        $request->validate([
            'debit_amount' => 'required|numeric|min:1',
            'to_username' => ['required', 'string', 'max:255'],
        ]);

        $toInvestor = $this->getToInvestor($request->to_username);
        //dd($toInvestor);
        if (is_null($toInvestor)) {
            return back()->withInput()->withErrors(["username" => "Invalid username provided."]);
        }

        $investor = Auth::user()->investor;

        $registration_credit = new RegistrationCredit();
        $registration_credit->from_id =  $investor->id;
        $registration_credit->to_id = $toInvestor->id;
        $registration_credit->from_name = $investor->name;
        $registration_credit->to_name = $toInvestor->name;
        $registration_credit->transaction_description = "Registration Credit Transfer";
        $registration_credit->transaction_date = date('Y-m-d');
        $registration_credit->debit_amount = $request->debit_amount;
        $registration_credit->credit_amount = 0;
        $registration_credit->save();
        
        Session::flash('flash_message', 'Your transfer request has been processed.');

        return redirect()->route('transfer.index');
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
