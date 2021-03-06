<?php

namespace App\Http\Controllers;

use App\Investor;
use Illuminate\Http\Request;
use App\Models\User;

use Auth;

class NetworkController extends Controller
{
    public function chartView(){
        $user = Auth::user();

        $investor = Investor::withDepth()->find($user->investor->id);
        
        $network = [
            [
                'id' => $investor->id,
                'name' => $investor->name . "(". $investor->stage->name .")",
                'Mobile' => $investor->mobile_number
            ]
        ];
        $last_parent = 0;
        $last_id = 0;

        $descendants = $investor->descendants()->with('stage')->withDepth()->get();
        
        foreach ($descendants as $descendant) {
            
            if (($descendant->depth  - $investor->depth) <= 2) {
                array_push($network, [
                    'id' => $descendant->id,
                    'pid' => $descendant->parent_id,
                    'name' => $descendant->name . " (" . $descendant->stage->name . ")",
                    'Mobile' => $descendant->mobile_number
                ]);

                $last_parent = $descendant->parent_id;
                $last_id = $descendant->id;
            }
        }

        $network = json_encode($network);

        return view('network.chart', compact('network'));
    }

    public function showNetwork($id){

        $investor = Investor::withDepth()->find($id);

        $network = [
            [
                'id' => $investor->id,
                'name' => $investor->name . "(". $investor->stage->name .")",
                'Mobile' => $investor->mobile_number
            ]
        ];
        $last_parent = 0;
        $last_id = 0;

        $descendants = $investor->descendants()->with('stage')->withDepth()->get();

        foreach ($descendants as $descendant) {
            if (($descendant->depth  - $investor->depth) <= 2) {
                array_push($network, [
                    'id' => $descendant->id,
                    'pid' => $descendant->parent_id,
                    'name' => $descendant->name . " (" . $descendant->stage->name . ")",
                    'Mobile' => $descendant->mobile_number
                ]);

                $last_parent = $descendant->parent_id;
                $last_id = $descendant->id;
            }
        }
        //dd($network);
        $network = json_encode($network);

        return view('network.child-network', compact('network'));
    }

    public function validateUsername(Request $request){

        $username = User::where('username', $request->username)->first();

        if($username != null){

            $data = [
                'successfailure' => false,
            ];
            return response()->json($data);
        }else{

            $data = [
                'successfailure' => true,
            ];
            return response()->json($data);
        }
    }

    public function gridView(){
        $user = Auth::user();

        $investor = $user->investor;

        return view('network.grid', compact('investor'));
    }
}
