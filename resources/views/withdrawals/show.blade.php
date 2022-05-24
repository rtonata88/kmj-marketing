@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item"> <a href="/withdrawals"> Withdraw Requests </a></li>
        <li class="breadcrumb-item active">Show </li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="offset-md-3 row">
    <div class="col-md-8 col-sm-12">
        @if(Session::has('warning'))
        <div class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {!! Session::get('warning') !!}
        </div>
        @endif
        <div class="card">
            <div class="card-header">
                <strong>Process withdraw request</strong> | <a href="/withdrawals"> Back</a>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('requested_amount', 'Requested amount')}}
                        {{Form::number('requested_amount', $withdrawal->requested_amount, ['class' => 'form-control', 'placeholder' => '0', 'readonly'])}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('payout_method', 'Payout Method')}}
                        {{Form::text('payout_method', $withdrawal->payout_method->name, ['class' => 'form-control', 'readonly'])}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('bank_charges', 'Bank Charges')}}
                        {{Form::text('bank_charges', $withdrawal->charges, ['class' => 'form-control', 'readonly'])}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('payout_amount', 'Payout Amount (N$)')}}
                        {{Form::text('payout_amount', $withdrawal->payout_amount, ['class' => 'form-control', 'readonly', 'id' => 'payout-amount'])}}
                    </div>
                </div>

                <hr>
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>{{Form::label('bank_account', 'Bank Account Information')}}</strong>
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th style="background-color: rgba(227, 227, 227, 0.5); width:250px;">Holder name </th>
                                <td>{{$investor->bank_account->holder_name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th style="background-color: rgba(227, 227, 227, 0.5)">Bank Name </th>
                                <td>{{$investor->bank_account->bank_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <th style="background-color: rgba(227, 227, 227, 0.5)">Branch Code </th>
                                <td>{{$investor->bank_account->branch_code ?? ''}}</td>
                            </tr>
                            <tr>
                                <th style="background-color: rgba(227, 227, 227, 0.5)">Branch Name </th>
                                <td>{{$investor->bank_account->branch_name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th style="background-color: rgba(227, 227, 227, 0.5)">Account Number </th>
                                <td>{{$investor->bank_account->account_number ?? ''}}</td>
                            </tr>
                            <tr>
                                <th style="background-color: rgba(227, 227, 227, 0.5)">Account Type </th>
                                <td>{{$investor->bank_account->account_type ?? ''}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                @if(Auth::user()->user_type == 'admin')
                <a href="/withdrawals/process/{{$withdrawal->id}}" class="btn btn-success"><span class=" fa fa-check-circle"></span> Process</a>
                @endif
                <a href="/withdrawals" class="btn"> Cancel</a>
            </div>
        </div>
    </div>
    @endsection