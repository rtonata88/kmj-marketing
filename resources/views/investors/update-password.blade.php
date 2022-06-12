@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Update password</li>
        <li class="breadcrumb-item active">{{Auth::user()->investor->name}}</li>
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
            {!! Form::open(array('route' => array('investor.update-password'), 'method' => 'post', 'class'=> 'form-horizontal')) !!}
            <div class="card-body">
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('message') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('password', 'New Password')}}
                            {{Form::password('password', ['class' => 'form-control', 'autocomplete'=>"none"])}}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{Form::label('password_confirmation', 'Confirm New Password')}}
                            {{Form::password('password_confirmation', ['class' => 'form-control'])}}
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success" id="submit-btn"><span class=" fa fa-check-circle"></span> Update</button>
                <a href="/investor" class="btn"> Cancel</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection