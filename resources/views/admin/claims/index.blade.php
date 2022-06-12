@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Management</li>
        <li class="breadcrumb-item active">Reward Claims </li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                Claims
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
                            <th>Investor</th>
                            <th>Username</th>
                            <th>Number</th>
                            <th>Reward</th>
                            <th>Cash (Yes/No)</th>
                            <th>Payout (N$)</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($claims as $claim)
                        <tr>
                            <td>{{$claim->investor->name}}</td>
                            <td>{{$claim->investor->user->username}}</td>
                            <td>{{$claim->investor->mobile_number}}</td>
                            <td>{{$claim->reward->name}}</td>
                            <td>{{$claim->cash_yn}}</td>
                            <td>
                                @if($claim->cash_yn == 'Yes')
                                {{$claim->payout_amount}}
                                @else
                                0.00
                                @endif
                            </td>
                            <td>
                                @if($claim->status == 'pending')
                                <span class="badge badge-warning">Pending</span>
                                @else
                                <span class="badge badge-success">Processed</span>
                                @endif
                            </td>
                            <td>
                                <a href="/admin/reward-claims/{{$claim->id}}/process"> <span class="fa fa-pencil"></span> Process</a>
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