<?php

namespace App\Actions;

use App\Models\RegistrationCredit;

class CreditRegistrationAccount {

    protected $fromInvestor;

    protected $toInvestor;

    protected $amount;

    protected $description;

    public function __construct($fromInvestor, $toInvestor, $amount, $description){
        $this->fromInvestor = $fromInvestor;

        $this->toInvestor = $toInvestor;

        $this->amount = $amount;

        $this->description = $description;
    }

    public function execute() : RegistrationCredit
    {
        return RegistrationCredit::create([
            'investor_id' =>  $this->toInvestor->id,
            'transaction_description' => $this->description,
            'transaction_date' => date('Y-m-d'),
            'debit_amount' => 0,
            'credit_amount' => $this->amount
        ]);
    
    }
}