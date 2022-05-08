<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountUpdateRequest;
use App\Http\Requests\AccountStoreRequest;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

class AccountController extends Controller
{
    use RedirectsWithFlash;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accounts = Account::paginate(15);
        return view('.accounts.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $account = new Account();
        return view('.accounts.create', compact('account'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AccountStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountStoreRequest $request)
    {
        Account::create($request->except('_token'));
        return $this->success('Account added successfully!', 'accounts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Account $account)
    {
        $previous = $account->where('id', '<', $account->id)->max('id');
        $next = $account->where('id', '>', $account->id)->min('id');

        return view('.accounts.show', compact('account'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Account $account)
    {
        return view('.accounts.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AccountUpdateRequest  $request
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(AccountUpdateRequest $request, Account $account)
    {
        $account->update($request->except('_token'));
        return $this->success('Account updated successfully!', 'accounts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        $account->delete();
        return $this->success('Account deleted successfully!', 'accounts.index');
    }
}
