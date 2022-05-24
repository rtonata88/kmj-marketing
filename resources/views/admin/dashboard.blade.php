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
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-primary p-3 mfe-3">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-education')}}"></use>
                        </svg>
                    </div>
                    <div>
                        <div class="text-value text-primary">{{$investors}}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Total registrations</div>
                    </div>
                </div>
                <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="/admin/investors"><span class="small font-weight-bold">Show list</span>
                    <svg class="c-icon">
                        <use xlink:href="#cil-chevron-right"></use>
                    </svg></a>
                </div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-info p-3 mfe-3">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-money')}}"></use>
                        </svg>
                    </div>
                    <div>
                        <div class="text-value text-info">N${{number_format($deposits,2, '.', ',')}}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Total Deposits</div>
                    </div>
                </div>
                <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="/admin/deposits"><span class="small font-weight-bold">View More</span>
                    <svg class="c-icon">
                        <use xlink:href="#cil-chevron-right"></use>
                    </svg></a></div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-warning p-3 mfe-3">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-bank')}}"></use>
                        </svg>
                    </div>
                    <div>
                        <div class="text-value text-info">N${{number_format($payouts,2, '.', ',')}}</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Total Payouts</div>
                    </div>
                </div>
                <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="/withdrawals"><span class="small font-weight-bold">View More</span>
                    <svg class="c-icon">
                        <use xlink:href="#cil-chevron-right"></use>
                    </svg></a></div>
            </div>
        </div>
        <!-- /.col-->
        <div class="col-6 col-lg-3">
            <div class="card">
                <div class="card-body p-3 d-flex align-items-center">
                    <div class="bg-danger p-3 mfe-3">
                        <svg class="c-icon c-icon-xl">
                            <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-dollar')}}"></use>
                        </svg>
                    </div>
                    <div>
                        <div class="text-value text-info">0</div>
                        <div class="text-muted text-uppercase font-weight-bold small">Rewards Value</div>
                    </div>
                </div>
                <div class="card-footer px-3 py-2"><a class="btn-block text-muted d-flex justify-content-between align-items-center" href="/admin/rewards"><span class="small font-weight-bold">View More</span>
                    <svg class="c-icon">
                        <use xlink:href="#cil-chevron-right"></use>
                    </svg></a></div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    @endsection