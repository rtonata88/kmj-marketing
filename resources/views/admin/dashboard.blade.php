@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item active">Dashboard</li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="row">

    <div class="col-md-12">
        <p>
        <h5>Hi, {{Auth::user()->name}}</h5>
        </p>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-primary p-3 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-bank')}}"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-primary">Registrations</div>
                    <div class="text-muted text-uppercase font-weight-bold"><strong>Status: </strong></div>
                    <div class="text-muted text-uppercase font-weight-bold">
                       
                    </div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="text-muted d-flex justify-content-between align-items-center" href="/transactions"><span class="small font-weight-bold">
                        Account Statement
                </a></span>
            </div>
        </div>
    </div>
</div>
@endsection