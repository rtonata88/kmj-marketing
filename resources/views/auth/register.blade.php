@extends('layouts.register')

@section('content')
<p class="text-muted text-center">Register a new account</p>

@if($errors->any())
<ul class="text-danger">
    @foreach($errors->all() as $error)
    <li>
        {{$error}}
    </li>
    @endforeach
</ul>
@endif
<form action="{{ route('register') }}" method="post" class="form-horizontal new-lg-form" id="loginform">
    {{ csrf_field() }}
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('referrer_username', 'Referrer username')}}
            {{Form::text('referrer_username', null, ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('name', 'Your Fullnames (Name and Surname)')}}
            {{Form::text('name', null, ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('mobile_number', 'Your Mobile number')}}
            {{Form::text('mobile_number', null, ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('email', 'Email address')}}
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
            {{Form::label('town_id', 'Town')}}
            {{Form::select('town_id', $towns, null, ['class' => 'form-control'])}}
        </div>
    </div>

    <hr>
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('username', 'Username')}}
            {{Form::text('username', null, ['class' => 'form-control'])}}
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            <input type="password" name="password" class="form-control" />
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            {{Form::label('password_confirmation', 'Confirm Password')}}
            <input type="password" name="password_confirmation" class="form-control" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button class="btn btn-primary px-4 col-md-12" type="submit">Register</button>
        </div>
    </div>
</form>
@endsection