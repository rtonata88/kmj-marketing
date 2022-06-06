<?php

namespace App\Services;

use App\Actions\CreditRegistrationAccount;
use App\Actions\DebitRegistrationAccount;
use App\Models\RegistrationCredit;
use App\Models\User;
use App\OtherSetting;

class CreateInvestorProfileService {

    public function createInvestorProfile($user_id, $request, $referrerInvestor) : array
    {
        
        if($this->hasEnoughCredit($referrerInvestor)){
            
            if ($referrerInvestor->children()->count() == 2) {
                return [
                    'status' => 'failed',
                    'reason' => 'The provided username already has two people under it.',
                    'investor' => null
                ];
            } else {

                $newInvestor = $referrerInvestor->children()->create(array_merge($request->all(), ['user_id' => $user_id, 'status' => 1]));

                $minimumRegistrationCredit = $this->getMinimumRegistrationCredit();
 
                $this->debitReferrerRegistrationAccount($referrerInvestor, $newInvestor, $minimumRegistrationCredit);

                $this->creditInvestorRegistrationAccount($referrerInvestor, $newInvestor, $minimumRegistrationCredit);

                $this->chargeAccountActivateFee($referrerInvestor, $newInvestor, $minimumRegistrationCredit);
                
                return [
                    'status' => 'success',
                    'reason' => 'New profile successfully created',
                    'investor' => $newInvestor
                ];
            }
        } else {
            return [
                'status' => 'failed',
                'reason' => 'You have insufficient credit to register someone under you.',
                'investor' => null
            ];
        }
    }

    public function getReferrerInvestor($referrer_username)
    {
        $referrerUser = User::with('investor')
                            ->select('id')
                            ->where('username', $referrer_username)
                            ->first();

        if ($referrerUser) {
            return  $referrerUser->investor;
        } else {
            return null;
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

    private function getMinimumRegistrationCredit()
    {
        return OtherSetting::select('value')
                            ->where('label', '=', 'Registration Amount')
                            ->first()
                            ->value;
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

    private function chargeAccountActivateFee($newInvestor, $referrerInvestor, $minimumRegistrationCredit)
    {
        $creditRegistrationCredit = new DebitRegistrationAccount($referrerInvestor, $newInvestor, $minimumRegistrationCredit, "Account activation");

        $creditRegistrationCredit->execute();
    }
    
}