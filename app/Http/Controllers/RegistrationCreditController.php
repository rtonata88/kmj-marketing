<?php

namespace App\Http\Controllers;

use App\Models\RegistrationCredit;
use Illuminate\Http\Request;

class RegistrationCreditController extends Controller
{
    public function statement($investor_id){

        $transactions = RegistrationCredit::where('investor_id', $investor_id)
                                            ->get();

        return view('account-transactions.registration-credits', compact('transactions', 'investor_id'));
    }
}
