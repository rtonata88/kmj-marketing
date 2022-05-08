@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item"> <a href="/stage-rewards"> Stage rewards </a></li>
        <li class="breadcrumb-item active">Edit </li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="offset-md-3 row">
    <div class="col-md-8 col-sm-12">
        <div class="card">
            <div class="card-header">
                <strong>Stage rewards</strong> | <a href="/stage-rewards"> Back</a>
            </div>
            {!! Form::model($stageReward, array('route'=>array('stage-rewards.update', $stageReward->id), 'class'=>'form-horizontal', 'method'=>'PATCH')) !!}
            <div class="card-body">
                @if ($errors->any())
                <ul class="text-danger">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('name', 'Reward description')}}
                        {{Form::text('name', null, ['class' => 'form-control'])}}
                        {{Form::hidden('id', null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('stage_id', 'Stage')}}
                        {{Form::select('stage_id', $stages, null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('value', 'Monetary value')}}
                        {{Form::text('value', null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><span class="fa fa-check-circle"></span> Save</button>
                <button type="reset" class="btn"><span class="fa fa-ban"></span> Reset</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection