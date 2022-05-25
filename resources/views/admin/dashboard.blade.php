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
                        <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-user')}}"></use>
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

    <div class="col-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Pending withdrawals</strong>
            </div>
            <div class="card-body p-3 d-flex align-items-center">
                <table class="table table-bordered table-striped table-sm" style="width:100%; font-size:12px">
                    <thead>
                        <tr>
                            @if(Auth::user()->user_type == 'admin')
                            <th>Name</th>
                            <th>Contact number</th>
                            @endif
                            <th>Requested Date</th>
                            <th>Requested Amount</th>
                            <th>Charges</th>
                            <th>Total Payout</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pending_withdraws as $withdrawal)
                        <tr>
                            @if(Auth::user()->user_type == 'admin')
                            <td>{{$withdrawal->investor->name}}</td>
                            <td>{{$withdrawal->investor->mobile_number}}</td>
                            @endif
                            <td>{{$withdrawal->request_date}}</td>
                            <td>{{$withdrawal->requested_amount}}</td>
                            <td>{{$withdrawal->charges}}</td>
                            <td>{{$withdrawal->payout_amount}}</td>
                            <td>
                                @if($withdrawal->status == 'pending')
                                <span class="badge badge-warning">
                                    {{$withdrawal->status}}
                                </span>
                                @endif
                                @if($withdrawal->status == 'processed')
                                <span class="badge badge-success">
                                    {{$withdrawal->status}}
                                </span>
                                @endif
                                @if($withdrawal->status == 'declined')
                                <span class="badge badge-danger">
                                    {{$withdrawal->status}}
                                </span>
                                @endif
                            </td>
                            <td>
                                @if($withdrawal->status == 'pending')
                                @if(Auth::user()->user_type == 'investor')
                                <a href="/withdrawals/cancel/{{$withdrawal->id}}"> <span class="fa fa-pencil"></span> Cancel request</a>
                                @endif
                                @if(Auth::user()->user_type == 'admin')
                                <a href="/withdrawals/{{$withdrawal->id}}"> <span class="fa fa-pencil"></span> Process</a>
                                @endif
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">
                                There are no pending withdrawals
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection