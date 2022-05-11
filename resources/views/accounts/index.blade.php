@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item active">My accounts </li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="row">
    @foreach($accounts as $account)
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-primary p-3 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-bank')}}"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-primary">N${{$account["balance"]}}</div>
                    <div class="text-muted text-uppercase font-weight-bold"><strong>Account Number:</strong> {{$account["account_number"]}}</div>
                    <div class="text-muted text-uppercase font-weight-bold"><strong>Status: </strong>{{$account["status"]}}</div>
                    <div class="text-muted text-uppercase font-weight-bold">
                        @switch($account["stage"])
                        @case("Stage 1")
                        <h6><span class="badge badge-secondary">{{$account["stage"]}}</span></h6>
                        @break
                        @case("Stage 2")
                        <h6><span class="badge badge-info">{{$account["stage"]}}</span></h6>
                        @break
                        @case("Stage 3")
                        <h6><span class="badge badge-warning">{{$account["stage"]}}</span></h6>
                        @break
                        @case("Stage 4")
                        <h6><span class="badge badge-primary">{{$account["stage"]}}</span></h6>
                        @break
                        @case("Stage 5")
                        <h6><span class="badge badge-success">{{$account["stage"]}}</span></h6>
                        @break
                        @case("Stage 6")
                        <h6><span class="badge badge-danger">{{$account["stage"]}}</span></h6>
                        @break
                        @endswitch
                    </div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="text-muted d-flex justify-content-between align-items-center" href="{{route('transactions')}}"><span class="small font-weight-bold">
                        Account Statement/Transactions
                </a></span>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection