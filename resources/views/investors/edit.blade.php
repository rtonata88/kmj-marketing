@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Profile</li>
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
                <strong>Update profile info</strong> | <a href="/investor"> Back</a>
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
            {!! Form::model($investor, array('route' => array('investor.update', $investor->id), 'method' => 'PATCH', 'class'=> 'form-horizontal')) !!}
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('name', 'Your Fullnames (Name and Surname)')}}
                            {{Form::text('name', null, ['class' => 'form-control'])}}
                            {{Form::hidden('id', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('mobile_number', 'Your Mobile number')}}
                            {{Form::text('mobile_number', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('email', 'Email address')}}
                            {{Form::email('email', null, ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>
                <div class="row">
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
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-info">
                            <span class="text-help text-info">
                                <strong>PlEASE NOTE: </strong>The password field can be left blank. Only fill it in if you wish to change/update it.
                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('password', 'New Password')}}
                            {{Form::password('password', ['class' => 'form-control', 'autocomplete'=>"none"])}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('password_confirmation', 'Confirm New Password')}}
                            {{Form::password('password_confirmation', ['class' => 'form-control'])}}
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