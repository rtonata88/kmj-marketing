<?php

namespace App\Services;

class GetReferrerInvestor {

    public function referrerInvestor($investor){

        return $this->getReferrerUsername($investor);
    }

    private function getReferrerUsername($investor)
    {

        $children = collect();
        if($investor->descendants->count() > 1){
            if($investor->children()->count() == 2){
                foreach ($investor->descendants()->defaultOrder()->get() as $descendant) {
                    if ($descendant->children->count() < 2) {
                        $children->push([
                            'investor' => $descendant, 
                            'ancestors' => $descendant->ancestors->count(),
                            'id' => $descendant->id
                        ]);
                    }
                }
            } else {
                $children->push(['investor' => $investor, 'ancestors' => $investor->ancestors->count()]);
            }
           
        } else {
            $children->push(['investor' => $investor, 'ancestors' => $investor->ancestors->count()]);
        }

        return $children->sortBy('ancestors')->sortBy('id')->first();
    }
}