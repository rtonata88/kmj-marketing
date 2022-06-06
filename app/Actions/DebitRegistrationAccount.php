<?php

namespace App\Actions;

use App\Models\RegistrationCredit;

class DebitRegistrationAccount {

    protected $fromInvestor;

    protected $toInvestor;

    protected $amount;

    public function __construct($fromInvestor, $toInvestor, $amount, $description)
    {
        $this->fromInvestor = $fromInvestor;

        $this->toInvestor = $toInvestor;

        $this->amount = $amount;

        $this->description = $description;
    }

    
    public function execute(): RegistrationCredit
    {
        
        return RegistrationCredit::create([
            'investor_id' =>  $this->fromInvestor->id,
            'transaction_description' => $this->description,
            'transaction_date' => date('Y-m-d'),
            'debit_amount' => $this->amount,
            'credit_amount' => 0
        ]);
    }
}