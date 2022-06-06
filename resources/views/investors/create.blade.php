@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item"> <a href="/network/chart-view"> Network </a></li>
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
                <strong>New sign up</strong> | <a href="/network/chart-view"> Back</a>
            </div>
            {!! Form::open(array('route' => array('investor.store'), 'method' => 'post', 'class'=> 'form-horizontal')) !!}
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        @if($errors->any())
                        <ul class="text-danger">
                            @foreach($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('name', 'Full name')}}
                        {{Form::text('name', null, ['class' => 'form-control'])}}
                        {{Form::hidden('referrer_username', $referrerInvestor['investor']->user->username, ['class' => 'form-control', 'readonly'])}}
                        {{Form::hidden('referrer_investor', $referrerInvestor['investor']->id, ['class' => 'form-control', 'readonly'])}}
                        {{Form::hidden('status', 1, ['class' => 'form-control', 'readonly'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('mobile_number', 'Mobile number')}}
                        {{Form::text('mobile_number', null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::email('email', null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('country_id', 'Country')}}
                        {{Form::select('country_id', $countries, null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('region_id', 'Region')}}
                        {{Form::select('region_id', $regions, null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('region_id', 'Towns')}}
                        {{Form::select('town_id', $towns, null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('username', 'Username')}}
                        {{Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Username'])}}
                        <input type="hidden" name="password" value="Wealth@2022" class="form--control" placeholder="Password" />
                        <input type="hidden" name="password_confirmation" value="Wealth@2022" class="form--control" placeholder="Re-type password" />
                        <span>The default password is: <strong>Wealth@2022</strong></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><span class="fa fa-check-circle"></span> Save</button>
                <a href="/network/chart-view" class="btn"><span class="fa fa-ban"></span> Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection