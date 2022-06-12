@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">My Network</li>
        <li class="breadcrumb-item active">Chart View </li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <a href="{{route('investor.create')}}" class="btn btn-primary">
                    Add New Member
                </a>
                <a href="/network/grid-view" class="btn btn-outline-info">
                    List view
                </a>
            </div>
            <div class="card-body">
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('message') }}
                </div>
                @endif
                <input type="hidden" value="{{$network}}" id="data">
                <div style="width:100%; height:700px;" id="network"></div>
            </div>
        </div>
    </div>
</div>
@push('organo')
<script src="{{asset('js/orgchart.js')}}"></script>
@endpush
@push('network')
<script src="{{asset('js/network.js')}}"></script>
@endpush
@endsection