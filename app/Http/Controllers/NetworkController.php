<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class NetworkController extends Controller
{
    public function chartView(){
        $user = Auth::user();

        $investor = $user->investor;

        $network = [
            [
                'id' => $investor->id,
                'name' => $investor->name . "(". $investor->stage->name .")",
            ]
        ];

        foreach($investor->descendants as $descendant){
            array_push($network, [
                'id' => $descendant->id,
                'pid' => $descendant->parent_id,
                'name' => $descendant->name . "(" . $descendant->stage->name . ")",
                'stage' => 'Stage 1'
            ]);
        }

        $network = json_encode($network);

        return view('network.chart', compact('network'));
    }

    public function gridView(){
        $user = Auth::user();

        $investor = $user->investor;

        return view('network.grid', compact('investor'));
    }
}