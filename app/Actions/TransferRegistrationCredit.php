<?php

namespace App\Actions;

use App\Models\RegistrationCredit;
use App\OtherSetting;

class TransferRegistrationCredit {

    public function execute($from, $to){

        if ($this->hasEnoughCredit($from)) {
            $amount = $this->getMinimumRegistrationCredit();

            $this->debitReferrerRegistrationAccount($from, $to,  $amount);

            $this->creditInvestorRegistrationAccount($from, $to,  $amount);

            return [
                'status' => 'success',
                'investor' => null
            ];
        } else {
            return [
                'status' => 'failed',
                'reason' => 'You have insufficient credit to register someone under you.',
                'investor' => null
            ];
        }

    }

    public function hasEnoughCredit($referrerInvestor)
    {
        $availableRegistrationCredit  = $this->calculateAvailableBalance($referrerInvestor);

        $minimumRegistrationCredit = $this->getMinimumRegistrationCredit();

        if ($availableRegistrationCredit >= $minimumRegistrationCredit) {
            return true;
        } else {
            return false;
        }
    }
    
    private function calculateAvailableBalance($investor)
    {

        $transfers = RegistrationCredit::where('investor_id', $investor->id)->get();

        $credit =  $transfers->sum('credit_amount');

        $debit =  $transfers->sum('debit_amount');

        return $credit - $debit;
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

    private function getMinimumRegistrationCredit()
    {
        return OtherSetting::select('value')
        ->where('label', '=', 'Registration Amount')
        ->first()
        ->value;
    }
}