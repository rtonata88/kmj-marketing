<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\BankAccount;
use Illuminate\Http\Request;

use Auth;
use Session;
class BankAccountController extends Controller
{
    public function edit(){
        $user = Auth::user();

        $investor = $user->investor;

        return view('investors.bank-account', compact('investor'));
    }

    public function update(Request $request){
        $request->validate([
            'holder_name' => 'required',
            'account_number' => ['required', 'numeric'],
            'bank_name' => ['required'],
            'branch_name' => ['required'],
            'branch_code' => ['required']
        ]);

        BankAccount::create($request->all()); 

        Session::flash('success','Your bank account information has been updated successfully.');
        
        return redirect()->route('investor.index');
    }
}
