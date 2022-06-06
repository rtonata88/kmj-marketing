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
            foreach ($investor->descendants as $descendant) {
                if ($descendant->children->count() < 2) {
                    $children->push(['investor' => $descendant, 'ancestors' => $descendant->ancestors->count()]);
                }
            }
        } else {
            $children->push(['investor' => $investor, 'ancestors' => $investor->ancestors->count()]);
        }

        return $children->sortBy('ancestors')->first();
    }
}