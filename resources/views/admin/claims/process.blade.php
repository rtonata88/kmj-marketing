@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item"> <a href="/admin/reward-claims"> Claims </a></li>
        <li class="breadcrumb-item active">Process </li>
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
                <strong>Process reward claims</strong> | <a href="/admin/reward-claims"> Back</a>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('investor', 'Username')}}
                        {{Form::number('investor', $investor->user->username, ['class' => 'form-control', 'readonly'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('investor', 'Name')}}
                        {{Form::number('investor', $investor->name, ['class' => 'form-control', 'readonly'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('reward', 'Reward')}}
                        {{Form::text('reward', $claim->reward->name, ['class' => 'form-control', 'readonly'])}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('cash_yn', 'Cash (Yes/No)')}}
                        {{Form::text('cash_yn', $claim->cash_yn, ['class' => 'form-control', 'readonly'])}}
                    </div>
                </div>
                @if($claim->cash_yn == 'Yes')
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('bank_charges', 'Bank Charges')}} (N$)
                        {{Form::text('bank_charges', ($claim->reward->value - $claim->payout_amount), ['class' => 'form-control', 'readonly'])}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('payout_amount', 'Payout Amount (N$)')}}
                        {{Form::text('payout_amount', $claim->payout_amount, ['class' => 'form-control', 'readonly', 'id' => 'payout-amount'])}}
                    </div>
                </div>
                @endif
                <hr>
                @if($claim->cash_yn == 'Yes')
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
                @endif
                @if(Auth::user()->user_type == 'admin')
                <a href="/reward-claims/process/{{$claim->id}}" class="btn btn-success"><span class=" fa fa-check-circle"></span> Process</a>
                @endif
                <a href="/admin/reward-claims" class="btn"> Cancel</a>
            </div>
        </div>
    </div>
    @endsection