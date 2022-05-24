<?php

namespace App\Http\Controllers;

use App\Models\InvestorDeposit;
use App\Models\User;
use Illuminate\Http\Request;

use Auth;
use Session;

class InvestorDepositsController extends Controller
{
    public function index(){
        $deposits = InvestorDeposit::with('investor', 'user')->paginate(50);

        return view('admin.deposits.index', compact('deposits'));
    }
    
    public function create(){
        return view('admin.deposits.create');
    }

    public function store(Request $request){
        $request->validate([
            'investor_username' => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        $user = User::where('username', $request->investor_username)->first();

        if($user){
            $deposit = new InvestorDeposit;
            $deposit->investor_id = $user->investor->id;
            $deposit->amount = $request->amount;
            $deposit->processed_by = Auth::user()->id;
            $deposit->save();
        } else {
            return back()->withInput()->withErrors(["investor_username" => "Invalid investor username provided."]);
        }

        Session::flash('message', 'Deposit succesffuly captured on the system');

        return redirect()->route('admin.deposits.index');
    }

    public function edit($id){
        $deposit = InvestorDeposit::find($id);

        return view('admin.deposits.edit', compact('deposit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'investor_username' => 'required',
            'amount' => 'required|numeric|min:1',
        ]);

        $user = User::where('username', $request->investor_username)->first();

        if ($user) {
            $deposit = InvestorDeposit::find($id);
            $deposit->investor_id = $user->investor->id;
            $deposit->amount = $request->amount;
            $deposit->processed_by = Auth::user()->id;
            $deposit->save();
        } else {
            return back()->withInput()->withErrors(["investor_username" => "Invalid investor username provided."]);
        }

        Session::flash('message', 'Deposit updated on the system');

        return redirect()->route('deposits.index');
    }
}
