@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item"><a href="{{route('accounts.index')}}">My Account</a></li>
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
                <strong>Registration Account transactions</strong> | <a href="{{route('transfer.create')}}"> Transfer request</a> | <a href="{{route('accounts.index')}}"> Accounts</a>
                <a href="{{route('transfer.create')}}" class="btn btn-primary">
                    New transfer request
                </a>
            </div>
            <div class="card-body">
                @if(Session::has('flash_message'))
                <div class="alert alert-info">
                    {{Session::get('flash_message')}}
                </div>
                @endif
                <table class="table table-responsive-sm table-bordered table-sm no-wrap" style="width:100%; font-size:12px;">
                    <tr>
                        <th>Date</th>
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
                    $balance = ($transaction->credit_amount > 0) ? $balance += $transaction->credit_amount : $balance -= $transaction->debit_amount
                    ?>
                    <tr>
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