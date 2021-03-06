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
                        <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-wallet')}}"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-primary">N${{$account["balance"]}}</div>
                    <div class="text-muted text-uppercase font-weight-bold">Profit Account</div>
                    <div class="text-muted text-uppercase font-weight-bold"><strong>Status: </strong>{{$account["status"]}}</div>
                    <!-- <div class="text-muted text-uppercase font-weight-bold">
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
                    </div> -->
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="text-muted d-flex justify-content-between align-items-center" href="{{route('transactions')}}"><span class="small font-weight-bold">
                        Account Statement/Transactions
                </a></span>
            </div>
        </div>
        @if($account["status"] == "Not active")
        <div class="alert alert-warning">
            Your account is not yet active. Please email your proof of payment to the Administrator.
        </div>
        @endif
    </div>
    @endforeach
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-info p-3 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-bank')}}"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-info">N${{number_format($available_registration_balance, 2, '.',',')}}</div>
                    <div class="text-muted text-uppercase font-weight-bold">Registration Credit</div>
                    <div class="text-muted text-uppercase font-weight-bold"><strong>Status: </strong>Active</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="text-muted d-flex justify-content-between align-items-center" href="/transfer">
                    <span class="small font-weight-bold">
                        Account Statement/Transactions
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection