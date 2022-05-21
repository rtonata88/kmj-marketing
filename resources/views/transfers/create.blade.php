@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item"> <a href="/transfer"> Transfers </a></li>
        <li class="breadcrumb-item active">Add new </li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="offset-md-3 row">
    <div class="col-md-8 col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong>Transactions</strong> | <a href="/transfer"> Back</a>
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
            {!! Form::open(array('url' => '/transfer', 'method' => 'post', 'class'=> 'form-horizontal')) !!}
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('available_balance', 'Avalaible Transfer Credit (N$)')}}
                        {{Form::text('available_balance', $available_balance, ['class' => 'form-control', 'readonly', 'id'=>'available-credit'])}}
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('debit_amount', 'How much would you like to transfer?')}}
                        {{Form::number('debit_amount', null, ['class' => 'form-control', 'placeholder' => '0', 'id'=>'transfer-credit'])}}
                        <div class="text-danger d-none" id="error-message">
                            The transfer amount cannot be greater/more than the <strong>available transfer credit</strong>.
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('to_username', 'Recipient username')}}
                        {{Form::text('to_username', null, ['class' => 'form-control', 'placeholder' => 'Please enter username'])}}
                    </div>
                </div>

                <button type="submit" class="btn btn-success" id="submit-btn"><span class=" fa fa-check-circle"></span> Submit</button>
                <a href="/transfer" class="btn"> Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @push('transfers')
    <script src="{{asset('js/transfers.js')}}"></script>
    @endpush
    @endsection