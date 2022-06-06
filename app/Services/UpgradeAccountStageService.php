<?php

namespace App\Services;

use App\AccountTransaction;
use App\Stage;
use App\StageRequirement;

class UpgradeAccountStageService {

    private function upgrade($investor, $last_stage)
    {
        if ($investor->stage_id <= $last_stage) {
            $investor->stage_id = ($investor->stage_id + 1);
            $investor->save();
        }

        return  $investor->stage_id;
    }

    public function upgradeAncestorAccounts($ancestors)
    {
        $last_stage = Stage::max('id');

        $stageRequirement = StageRequirement::select('stage_id', 'people', 'amount')->get();

        foreach ($ancestors as $ancestor) {

            $current_stage = $ancestor->stage_id;

            $stageRequiredPeople = $stageRequirement->where('stage_id', $current_stage)->first();

            $investorActiveChildren = $ancestor->descendants()->count();

            if ($investorActiveChildren >= $stageRequiredPeople->people) {
                
                $this->applyAllProfits($ancestor, $stageRequirement);

                $this->upgrade($ancestor, $last_stage);
            }
        }
    }

    private function applyAllProfits($ancestor, $stageRequirement){

        $stageRequirement = $stageRequirement->where('stage_id', $ancestor->stage_id)->first();

        $children = $ancestor->descendants->where('stage_id', $ancestor->stage_id);
        
        foreach ($children as $child) {
            AccountTransaction::firstOrCreate([
                'investor_id' =>  $ancestor->id,
                'transaction_description' => "Stage " . $ancestor->stage_id . " Earning",
                'descendant_id' => $child->id,
                'stage_id' =>  $ancestor->stage_id,
                'transaction_date' => date('Y-m-d'),
                'debit_amount' => 0,
                'credit_amount' => $stageRequirement->amount
            ]);
        }
    }
}