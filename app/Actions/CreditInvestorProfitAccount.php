<?php

namespace App\Actions;

use App\AccountTransaction;
use App\Stage;
use App\StageRequirement;

use Log;

class CreditInvestorProfitAccount {

    public function execute($newInvestor)
    {
        $stageRequirement = StageRequirement::select('stage_id', 'people', 'amount')->get();
        
        $ancestors = $newInvestor->ancestors()->withDepth()->get();

        foreach($ancestors as $ancestor){            
            
            $stageRequirement = $stageRequirement->where('stage_id', $ancestor->stage_id)->first();

            if($ancestor->stage_id == 1){
                if (($newInvestor->depth  - $ancestor->depth) <= 2) {
                    $account_transaction = AccountTransaction::where('investor_id', $ancestor->id)
                                                            ->where('descendant_id', $newInvestor->id)
                                                            ->where('stage_id', $ancestor->stage_id)
                                                            ->first();
                    if(!$account_transaction){
                        AccountTransaction::create([
                            'investor_id' =>  $ancestor->id,
                            'transaction_description' => "Stage ". $ancestor->stage_id . " Earning",
                            'descendant_id' => $newInvestor->id,
                            'stage_id' =>  $ancestor->stage_id,
                            'transaction_date' => date('Y-m-d'),
                            'debit_amount' => 0,
                            'credit_amount' => $stageRequirement->amount
                        ]);
                    }
                }
            } else {
                $descendants = $ancestor->descendants;

                $children = $descendants->where('stage_id', $ancestor->stage_id);
                
                foreach($children as $child){
                    
                    $account_transaction = AccountTransaction::where('investor_id', $ancestor->id)
                                        ->where('descendant_id', $child->id)
                                        ->where('stage_id', $ancestor->stage_id)
                                        ->first();

                    if(!$account_transaction){
                        AccountTransaction::create([
                            'investor_id' =>  $ancestor->id,
                            'transaction_description' => "Stage ". $ancestor->stage_id . " Earning",
                            'descendant_id' => $child->id,
                            'stage_id' =>  $ancestor->stage_id,
                            'transaction_date' => date('Y-m-d'),
                            'debit_amount' => 0,
                            'credit_amount' => $stageRequirement->amount
                        ]);
                    }
                }
            }
        }
    }
}
