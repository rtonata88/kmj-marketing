@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item active">Investors </li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="row">
    <div class="offset-md-1 col-md-8 col-xs-12">
        <div class="card">
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
                            <th>Investor Name</th>
                            <th>Contact number</th>
                            <th>Total sign ups</th>
                            <th>Current Stage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($investors as $investor)
                        <tr>
                            <td>{{$investor->name}}</td>
                            <td>{{$investor->mobile_number}}</td>
                            <td>{{$investor->children->count()}}</td>
                            <td>Stage {{$investor->stage_id}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$investors->links()}}
            </div>
        </div>
    </div>
</div>
@endsection