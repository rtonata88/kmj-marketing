@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item"><a href="/invoices">My Account</a></li>
        <li class="breadcrumb-item active">Transactions</li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <strong>Account transactions</strong> | <a href="{{route('accounts.index')}}"> Back</a>
            </div>
            <div class="card-body">

                <table class="table table-responsive-sm table-bordered table-sm no-wrap" style="width:100%">
                    <tr>
                        <th>Transaction Reference</th>
                        <th>Transaction Date</th>
                        <th>Description</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Balance</th>
                    </tr>
                    <?php
                    $balance = 0;
                    ?>
                    @foreach($accountTransactions as $transaction)
                    <?php
                    $balance = ($transaction->debit_amount > 0) ? $balance += $transaction->debit_amount : $balance -= $transaction->credit_amount
                    ?>
                    <tr>
                        <td>{{$transaction->transaction_reference}}</td>
                        <td>{{$transaction->transaction_date}}</td>
                        <td>{{$transaction->transaction_description}}</td>
                        <td>{{number_format($transaction->debit_amount, 2, '.',',')}}</td>
                        <td>{{number_format($transaction->credit_amount, 2, '.',',')}}</td>
                        <td>{{number_format($balance, 2, '.',',')}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endsection