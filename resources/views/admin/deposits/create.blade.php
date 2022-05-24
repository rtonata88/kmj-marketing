@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item"> <a href="/admin/deposits"> Deposits </a></li>
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
                <strong>Deposits</strong> | <a href="/admin/deposits"> Back</a>
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
            {!! Form::open(array('url' => '/admin/deposits', 'method' => 'post', 'class'=> 'form-horizontal')) !!}
            <div class="card-body">
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('investor_username', 'Investor username')}}
                        {{Form::text('investor_username', null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        {{Form::label('amount', 'Amount(N$)')}}
                        {{Form::number('amount', null, ['class' => 'form-control'])}}
                    </div>
                </div>
                <button type="submit" class="btn btn-success"><span class="fa fa-check-circle"></span> Save</button>
                <a href="/admin/deposits" class="btn"> Back</a>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    @endsection