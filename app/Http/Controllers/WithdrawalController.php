<?php

namespace App\Http\Controllers;

use App\AccountTransaction;
use App\Models\PayoutMethod;
use App\Models\Withdrawal;
use App\OtherSetting;
use Illuminate\Http\Request;

use Auth;
use Session;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->user_type == 'investor'){
            $withdrawals = Withdrawal::where('investor_id', $user->investor->id)->paginate(25);
        } else {
            $withdrawals = Withdrawal::where('status','=','pending')->paginate(25);
        }

        return view('withdrawals.index', compact('withdrawals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();

        $settings = OtherSetting::all();

        $payout_methods = PayoutMethod::pluck('name', 'id');

        $account_balance = $this->calculateAccountBalance($user->investor);

        $minimum_account_balance = $settings->where('label', '=', 'Minimum Account Balance')->first()->value;

        $withdrawal_mini_balance = $settings->where('label', '=', 'Withdrawal Minimum Balance')->first()->value;

        $maximum_request_amount = $account_balance - $minimum_account_balance;

        if($account_balance <= $withdrawal_mini_balance){
            Session::flash('warning', 'You have insufficient funds to request for a withdrawal. You need more than N$' . $withdrawal_mini_balance . ' to withdraw.');

            return redirect()->back();
        }

        $bank_charges_percentage = $settings->where('label', '=', 'Withdrawal Commission %')->first()->value;

        return view('withdrawals.create', compact('payout_methods', 'account_balance', 'maximum_request_amount', 'bank_charges_percentage'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'requested_amount' => ['required', 'numeric', 'min:20'],
            'payout_amount' => ['required', 'string'],
        ]);


        if ($request->requested_amount > $request->maximum_request_amount) {
            Session::flash('warning', "The request amount cannot be greater/more than the <strong>maximum request amount</strong>.");

            return redirect()->back();
        }

        $user = Auth::user();

        Withdrawal::create([
            'investor_id' => $user->investor->id,
            'request_date' => date('Y-m-d'),
            'requested_amount' => $request->requested_amount,
            'charges' => $request->requested_amount - $request->payout_amount,
            'payout_amount' => $request->payout_amount,
            'payout_method_id' => $request->payout_method
        ]);

        Session::flash('message', "Your request to withdraw funds from the account has been received. It will be processed next Wednesday.");

        return redirect()->route('withdrawals.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $withdrawal = Withdrawal::find($id);

        $investor = $withdrawal->investor;

        return view('withdrawals.show', compact('withdrawal', 'investor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function process($id){
        $withdrawal = Withdrawal::find($id);

        $withdrawal->status = 'processed';
        $withdrawal->process_date = date('Y-m-d');
        $withdrawal->processed_by = Auth::user()->id;
        $withdrawal->save();

        $this->debitInvestorAccount($withdrawal);

        Session::flash('message', "Withdrawal request processed succussfully.");

        return redirect()->route('withdrawals.index');
    }

    public function cancel($id)
    {
        $withdrawal = Withdrawal::find($id);

        $withdrawal->status = 'canceled';
        $withdrawal->process_date = date('Y-m-d');
        $withdrawal->processed_by = Auth::user()->id;
        $withdrawal->save();

        Session::flash('message', "Withdrawal request canceled succussfully.");

        return redirect()->route('withdrawals.index');
    }

    private function debitInvestorAccount($withdrawal){
        $account_transaction = new AccountTransaction();
        $account_transaction->investor_id = $withdrawal->investor_id;
        $account_transaction->transaction_description = "Payout Request";
        $account_transaction->transaction_date = date('Y-m-d');
        $account_transaction->descendant_id = 0;
        $account_transaction->stage_id = 0;
        $account_transaction->debit_amount = $withdrawal->requested_amount;
        $account_transaction->credit_amount = 0;
        $account_transaction->save();
    }
}
