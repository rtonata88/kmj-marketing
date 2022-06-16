<?php

namespace App\Http\Controllers;

use App\Investor;
use App\Models\BankAccount;
use App\Models\PayoutMethod;
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

        $payout_methods = PayoutMethod::pluck('name', 'id');

        return view('reward-claims.index', compact('rewards', 'bank_charges_percentage', 'investor', 'payout_methods'));
    }

    public function store(Request $request){

        $payout_methods = PayoutMethod::find($request->payout_method);

        if($payout_methods != null){
            if($payout_methods->name == 'Bank'){

                $bank_account = BankAccount::where('investor_id', $request->investor_id)->first();

                if($bank_account != null){

                    $this->saveClaim($request);
                    return redirect()->back();

                }else{

                    return back()->with('bankInfoFailure', 'Please update your bank information to continue with the claim');
                }
            }else{

                $investor = Investor::where('id', $request->investor_id)->first();

                if($investor->mobile_number != 0){

                    $this->saveClaim($request);
                    return redirect()->back();

                }else{

                    return back()->with('celphoneInfoFailure', 'Please update your cellphone number to continue with the claim');
                }
            }

        }else{

            $this->saveClaim($request);
            return redirect()->back();
        }
    }

    public function saveClaim(Request $request){

        RewardClaim::create([
            'investor_id' => $request->investor_id,
            'request_date' => date('Y-m-d'),
            'stage_reward_id' => $request->stage_reward_id,
            'cash_yn' => (isset($request->cash_yn)) ? $request->cash_yn : 'No',
            'bank_charges' => (isset($request->bank_charges)) ? $request->bank_charges : 0,
            'payout_amount' => (isset($request->payout_amount)) ? $request->payout_amount : 0,
        ]);

        Session::flash('message', 'Your claim has been submitted.');
    }

    // public function validateMethod(Request $request){

    //     $payout_methods = PayoutMethod::find($request->payoutMehod);

    //     if($payout_methods->name = 'Bank'){

    //     }
    // }

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
