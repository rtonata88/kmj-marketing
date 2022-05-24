@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Profile</li>
        <li class="breadcrumb-item">Bank Account Details</li>
        <li class="breadcrumb-item active">{{$investor->name}}</li>
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
                <strong>Update banking details</strong> | <a href="/investor"> Back</a>
            </div>
            @if($errors->any())
            <ul class="text-danger">
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
            @endif
            {!! Form::open(array('route' => array('bank-account.update', $investor->id), 'method' => 'PATCH', 'class'=> 'form-horizontal')) !!}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('holder_name', 'Holder Fullnames (Name and Surname)')}}
                            {{Form::text('holder_name', $investor->bank_account->holder_name ?? $investor->name, ['class' => 'form-control'])}}
                            {{Form::hidden('investor_id', $investor->id, ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('account_number', 'Account number')}}
                            {{Form::number('account_number', $investor->bank_account->account_number ?? '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('account_type', 'Account Type')}}
                            {{Form::select('account_type', ['Cheque' => 'Cheque', 'Savings' => 'Savings'],  $investor->bank_account->account_type ?? 'Cheque', ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('bank_name', 'Bank')}}
                            {{Form::text('bank_name', $investor->bank_account->bank_name ?? '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('branch_name', 'Branch name')}}
                            {{Form::text('branch_name', $investor->bank_account->branch_name ?? '', ['class' => 'form-control'])}}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('branch_code', 'Branch code')}}
                            {{Form::text('branch_code', $investor->bank_account->branch_code ?? '', ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success" id="submit-btn"><span class=" fa fa-check-circle"></span> Submit</button>
                <a href="/investor" class="btn"> Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection