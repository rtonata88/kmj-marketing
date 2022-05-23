@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item"> <a href="/withdrawals"> Withdraw Requests </a></li>
        <li class="breadcrumb-item active">Add new </li>
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
                <strong>New withdraw request</strong> | <a href="/withdrawals"> Back</a>
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
            {!! Form::open(array('url' => '/withdrawals', 'method' => 'post', 'class'=> 'form-horizontal')) !!}
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('maximum_request_amount', 'Maximum amount you can request (N$)')}}
                        {{Form::text('maximum_request_amount', $maximum_request_amount, ['class' => 'form-control', 'readonly', 'id'=>'maximum-request-amount'])}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('requested_amount', 'How much would you like to withdraw?')}}
                        {{Form::number('requested_amount', null, ['class' => 'form-control', 'placeholder' => '0', 'id'=>'request-amount'])}}
                        <div class="text-danger d-none" id="error-message">
                            The request amount cannot be greater/more than the <strong>maximum request amount</strong>.
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('payout_method', 'Payout Method')}}
                        {{Form::select('payout_method', $payout_methods, null, ['class' => 'form-control'])}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('bank_charges', 'Bank Charges')}} ({{$bank_charges_percentage}}%)
                        {{Form::text('bank_charges', $bank_charges_percentage, ['class' => 'form-control', 'readonly'])}}
                        {{Form::hidden('charges', $bank_charges_percentage, ['class' => 'form-control', 'id' => 'bank-charges'])}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('payout_amount', 'Payout Amount (N$)')}}
                        {{Form::text('payout_amount', null, ['class' => 'form-control', 'readonly', 'id' => 'payout-amount'])}}
                    </div>
                </div>

                <button type="submit" class="btn btn-success" id="submit-btn"><span class=" fa fa-check-circle"></span> Submit</button>
                <a href="/transfer" class="btn"> Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @push('transfers')
    <script src="{{asset('js/withdraw.js')}}"></script>
    @endpush
    @endsection