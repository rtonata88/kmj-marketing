<?php

namespace App\Http\Controllers;

use App\Investor;
use App\Models\RewardClaim;
use App\OtherSetting;
use App\StageRequirement;
use App\StageReward;
use Illuminate\Http\Request;

use Auth;
use Session;

class RewardClaimController extends Controller
{
    public function index(){
        // $investor = Auth::user()->investor;

        $settings = OtherSetting::all();

        $bank_charges_percentage = $settings->where('label', '=', 'Withdrawal Commission %')->first()->value;

        $investor = Investor::withDepth()->find(Auth::user()->investor->id);

        $stageRequirement = StageRequirement::select('people')
                                            ->where('stage_id', $investor->stage_id)
                                            ->first();

        $descendants = $investor->descendants()->withDepth()->where('stage_id',$investor->stage_id)->get();
        
        $people = 0;

        foreach($descendants as $descendant){
            if(($descendant->depth - $investor->depth) <= 2){
                 $people++;
            }
        }


        $stages = range(0, ($investor->stage_id - 1));

        if($people >= $stageRequirement->people){
            array_push($stages, $investor->stage_id);
        } 

        $claims = RewardClaim::where('investor_id',$investor->id)->pluck('stage_reward_id');

        $rewards = StageReward::whereIn('stage_id', $stages)->whereNotIn('id', $claims)->get();

        return view('reward-claims.index', compact('rewards', 'bank_charges_percentage', 'investor'));
    }

    public function store(Request $request){
        RewardClaim::create([
            'investor_id' => $request->investor_id,
            'request_date' => date('Y-m-d'),
            'stage_reward_id' => $request->stage_reward_id,
            'cash_yn' => (isset($request->cash_yn)) ? $request->cash_yn : 'No',
            'bank_charges' => (isset($request->bank_charges)) ? $request->bank_charges : 0,
            'payout_amount' => (isset($request->payout_amount)) ? $request->payout_amount : 0,
        ]);

        Session::flash('message', 'Your claim has been submitted.');

        return redirect()->back();
    }

    public function viewClaims(){
        $claims = RewardClaim::with('investor', 'reward')->paginate(25);

        return view('admin.claims.index', compact('claims'));
    }

    public function viewProcessForm($id){
        $claim = RewardClaim::with('investor', 'reward')->where('id', $id)->first();

        $investor = $claim->investor;

        return view('admin.claims.process', compact('claim', 'investor'));
    }

    public function process($id){
        $claim = RewardClaim::find($id);

        $claim->process_date = date('Y-m-d');
        $claim->status = 'processed';
        $claim->processed_by = Auth::user()->id;
        $claim->save();

        Session::flash('message', 'Claim processed successfully');

        return redirect()->route('admin.index.claims');
    }
}