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
        @if($noticeMessages["userAccountNotices"])

        @foreach($noticeMessages["userAccountNotices"] as $key => $userAccountNotice)
        @switch($userAccountNotice["type"])
        @case('warning')
        <div class="alert alert-warning">
            {!! $userAccountNotice["message"] !!}
        </div>
        @break
        @default
        Default case...
        @endswitch
        @endforeach
        @endif
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="card">
            <div class="card-body p-3 d-flex align-items-center">
                <div class="bg-primary p-3 mfe-3">
                    <svg class="c-icon c-icon-xl">
                        <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-group')}}"></use>
                    </svg>
                </div>
                <div>
                    <div class="text-value text-primary">{{Auth::user()->investor->descendants()->count()}}</div>
                    <div class="text-muted text-uppercase font-weight-bold">Total Members</div>
                </div>
            </div>
            <div class="card-footer px-3 py-2">
                <a class="text-muted d-flex justify-content-between align-items-center" href="/network/grid-view"><span class="small font-weight-bold">
                        My Network
                </a></span>
            </div>
        </div>
    </div>
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
                <a class="text-muted d-flex justify-content-between align-items-center" href="/transactions"><span class="small font-weight-bold">
                        Account Statement
                </a></span>
            </div>
        </div>
    </div>
    @endforeach

</div>
<div class="row">
    <div class="col-md-6 col-xs-12">
        <div class="card">
            <div class="card-header">
                <strong>Personal information</strong>
                @switch($investor->stage->name)
                @case("Stage 1")
                <h6><span class="badge badge-secondary">{{$investor->stage->name}}</span></h6>
                @break
                @case("Stage 2")
                <h6><span class="badge badge-info">{{$investor->stage->name}}</span></h6>
                @break
                @case("Stage 3")
                <h6><span class="badge badge-warning">{{$investor->stage->name}}</span></h6>
                @break
                @case("Stage 4")
                <h6><span class="badge badge-primary">{{$investor->stage->name}}</span></h6>
                @break
                @case("Stage 5")
                <h6><span class="badge badge-success">{{$investor->stage->name}}</span></h6>
                @break
                @case("Stage 6")
                <h6><span class="badge badge-danger">{{$investor->stage->name}}</span></h6>
                @break
                @endswitch
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5);width:250px;">Referrer username </th>
                        <td>{{$referrerDetails->user->username ?? ''}}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5);width:250px;">Name </th>
                        <td>{{$investor->name}}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5);width:250px;">My username </th>
                        <td>{{Auth::user()->username}}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5);width:250px;">Email </th>
                        <td>{{$investor->email}}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5)">Mobile number </th>
                        <td>{{$investor->mobile_number}}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5)">Account Status </th>
                        <td>
                            @if($investor->status == 1)
                            <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Not Active</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5)">Country </th>
                        <td>{{$investor->country->name}}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5)">Town </th>
                        <td>{{$investor->town->name}}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5)">Region </th>
                        <td>{{$investor->region->name}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="/investor/{{$investor->id}}/edit" class="btn btn-primary col-sm-12">Update Profile Information</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xs-12">
        <div class="card">
            <div class="card-header">
                <strong>Bank Accout Information</strong>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5); width:250px;">Holder name </th>
                        <td>{{$investor->bank_account->holder_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5)">Bank Name </th>
                        <td>{{$investor->bank_account->bank_name ?? '' }}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5)">Branch Code </th>
                        <td>{{$investor->bank_account->branch_code ?? ''}}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5)">Branch Name </th>
                        <td>{{$investor->bank_account->branch_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5)">Account Number </th>
                        <td>{{$investor->bank_account->account_number ?? ''}}</td>
                    </tr>
                    <tr>
                        <th style="background-color: rgba(227, 227, 227, 0.5)">Account Type </th>
                        <td>{{$investor->bank_account->account_type ?? ''}}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center">
                            <a href="/bank-account/{{$investor->id}}/edit" class="btn btn-primary col-sm-12">Update Bank Details</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection