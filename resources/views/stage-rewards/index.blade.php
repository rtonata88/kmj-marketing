@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Settings</li>
        <li class="breadcrumb-item active">Stage Rewards </li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="row">
    <div class="offset-md-2 col-md-6 col-xs-12">
        <div class="card">
            <div class="card-header">

                <a href="/stage-rewards/create" class="btn btn-primary">
                    Add New
                </a>
            </div>
            <div class="card-body">
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('message') }}
                </div>
                @endif

                <table class="table table-bordered table-striped table-sm" style="width:100%">
                    <thead>
                        <tr>
                            <th>Reward</th>
                            <th>Monetary value (N$)</th>
                            <th>Stage</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stageRewards as $reward)
                        <tr>
                            <td>{{$reward->name}}</td>
                            <td>{{$reward->value}}</td>
                            <td>{{$reward->stage->name}}</td>
                            <td>
                                <a href="/stage-rewards/{{$reward->id}}/edit"> <span class="fa fa-pencil"></span> Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection