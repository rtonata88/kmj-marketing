<?php

namespace App\Http\Controllers;

use App\Investor;
use App\Http\Requests\InvestorUpdateRequest;
use App\Http\Requests\InvestorStoreRequest;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

use Auth;
class InvestorController extends Controller
{
    use RedirectsWithFlash;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $investor = $user->investor;
        
        return view('.investors.index', compact('investor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $investor = new Investor();
        return view('.investors.create', compact('investor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InvestorStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvestorStoreRequest $request)
    {
        Investor::create($request->except('_token'));
        return $this->success('Investor added successfully!', 'investors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Investor $investor)
    {
        $previous = $investor->where('id', '<', $investor->id)->max('id');
        $next = $investor->where('id', '>', $investor->id)->min('id');

        return view('.investors.show', compact('investor'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Investor $investor)
    {
        return view('.investors.edit', compact('investor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InvestorUpdateRequest  $request
     * @param  \App\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function update(InvestorUpdateRequest $request, Investor $investor)
    {
        $investor->update($request->except('_token'));
        return $this->success('Investor updated successfully!', 'investors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Investor  $investor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Investor $investor)
    {
        $investor->delete();
        return $this->success('Investor deleted successfully!', 'investors.index');
    }
}
