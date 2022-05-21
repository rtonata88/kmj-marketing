<?php

namespace App\Http\Controllers;

use App\AccountTransaction;
use App\Http\Requests\AccountTransactionUpdateRequest;
use App\Http\Requests\AccountTransactionStoreRequest;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

use Auth;
class AccountTransactionController extends Controller
{
    use RedirectsWithFlash;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $investor = Auth::user()->investor;

        $accountTransactions = AccountTransaction::where('investor_id',$investor->id)->get();

        return view('.account-transactions.profit-transactions', compact('accountTransactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountTransaction = new AccountTransaction();
        return view('.account-transactions.create', compact('accountTransaction'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AccountTransactionStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountTransactionStoreRequest $request)
    {
        AccountTransaction::create($request->except('_token'));
        return $this->success('Account Transaction added successfully!', 'account-transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AccountTransaction  $accountTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(\App\AccountTransaction $accountTransaction)
    {
        $previous = $accountTransaction->where('id', '<', $accountTransaction->id)->max('id');
        $next = $accountTransaction->where('id', '>', $accountTransaction->id)->min('id');

        return view('.account-transactions.show', compact('accountTransaction'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AccountTransaction  $accountTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\AccountTransaction $accountTransaction)
    {
        return view('.account-transactions.edit', compact('accountTransaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AccountTransactionUpdateRequest  $request
     * @param  \App\AccountTransaction  $accountTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(AccountTransactionUpdateRequest $request, AccountTransaction $accountTransaction)
    {
        $accountTransaction->update($request->except('_token'));
        return $this->success('Account Transaction updated successfully!', 'account-transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AccountTransaction  $accountTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(AccountTransaction $accountTransaction)
    {
        $accountTransaction->delete();
        return $this->success('Account Transaction deleted successfully!', 'account-transactions.index');
    }
}
