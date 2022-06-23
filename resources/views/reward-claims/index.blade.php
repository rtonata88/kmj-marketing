@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item active">Reward Claims </li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="row">
    @if(count($rewards) > 0)
    <div class="col-md-8 col-xs-12 alert alert-info">
        You qualify to claim the following rewards. Please click the <strong>Claim this reward</strong> button to claim your reward.
        All claims are processed between the 15th and the 20th of each month.
    </div>
    <div class="col-md-8 col-xs-12 alert alert-info">
        <strong>Please note: </strong>If you select cash, {{$bank_charges_percentage}}% of Bank charges will be deducted from the total reward amount.
    </div>
    @else
    <div class="col-md-8 col-xs-12 alert alert-warning">
        You do not qualify for any rewards at the moment.
    </div>
    @endif

    @if(Session::has('message'))
    <div class="col-md-8 col-xs-12 alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        {!! Session::get('message') !!}
    </div>
    @endif
    @if(Session::has('celphoneInfoFailure'))
        <div class="col-md-8 col-xs-12 alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {!! Session::get('celphoneInfoFailure') !!}
        </div>
    @endif
    @if(Session::has('bankInfoFailure'))
        <div class="col-md-8 col-xs-12 alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {!! Session::get('bankInfoFailure') !!}
        </div>
    @endif

    @foreach($rewards as $reward)
    <div class="col-md-8 col-xs-12">
        <div class="card">
            {!! Form::open(array('url' => '/reward-claims', 'method' => 'post', 'class'=> 'form-horizontal')) !!}
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>{{$reward->name}}</strong>
                        {{Form::hidden('stage_reward_id', $reward->id, ['class' => 'form-control'])}}
                        {{Form::hidden('investor_id', $investor->id, ['class' => 'form-control'])}}
                    </div>
                </div>
                @if($reward->cash_option_yn == 'Yes')
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('cash_yn', 'Do you want the cash instead?')}} <span class="text-danger">*</span>
                        {{Form::select('cash_yn', ['Yes'=>'Yes', 'No'=>'No'], null, ['class' => 'form-control cash_yn', 'required', 'placeholder' => 'Please select', 'id'=>$reward->id])}}
                    </div>
                </div>
                <div class="bank-charges-section d-none" id="bank-charges-section-{{$reward->id}}">
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
                            {{Form::text('payout_amount', ($reward->value - (($reward->value * $bank_charges_percentage) / 100)), ['class' => 'form-control', 'readonly', 'id' => 'payout-amount'])}}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('payout_method', 'Payout Method')}}
                            {{Form::select('payout_method', $payout_methods, null, ['class' => 'form-control', 'id' => 'payout-method', 'placeholder' => 'Please select'])}}
                        </div>
                    </div>
                </div>
                @endif
                <button type="submit" class="btn btn-success"><span class="fa fa-check-circle"></span> Claim this reward</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        $(document).ready(function(){

            $('[name="cash_yn"]').change(function(e){
                event.preventDefault();

                var cashYN = $('[name="cash_yn"]').val();

                if(cashYN == 'Yes'){
                    $('#payout-method').prop('required',true);
                }else{

                    $('#payout-method').prop('required',false);
                }
            })
        })
    </script>

    @endforeach

    @push('transfers')
    <script src="{{asset('js/claims.js')}}"></script>
    @endpush
    @endsection
