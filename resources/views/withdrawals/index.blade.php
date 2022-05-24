@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Withdrawals</li>
        <li class="breadcrumb-item active">List </li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card">
            @if(Auth::user()->user_type == 'investor')
            <div class="card-header">
                <a href="/withdrawals/create" class="btn btn-primary">
                    New Withdraw Request
                </a>
            </div>
            @endif
            <div class="card-body">
                @if(Session::has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('message') }}
                </div>
                @endif

                @if(Session::has('warning'))
                <div class="alert alert-warning alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ Session::get('warning') }}
                </div>
                @endif

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
                        @forelse($withdrawals as $withdrawal)
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
                            <td colspan="7">
                                You do not have any withdraw requests
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