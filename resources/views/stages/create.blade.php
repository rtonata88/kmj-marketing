@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item"> <a href="/stages"> Stages </a></li>
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
                <strong>Stages</strong> | <a href="/stages"> Back</a>
            </div>
            {!! Form::open(array('url' => '/stages', 'method' => 'post', 'class'=> 'form-horizontal')) !!}
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('name', 'Stage name')}}
                        {{Form::text('name', null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><span class="fa fa-check-circle"></span> Save</button>
                <button type="reset" class="btn"><span class="fa fa-ban"></span> Reset</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection