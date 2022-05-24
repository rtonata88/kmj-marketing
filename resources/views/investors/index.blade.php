@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Profile</li>
        <li class="breadcrumb-item active">{{$investor->name}}</li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-2 col-xs-12"></div>
    <div class="col-md-8 col-xs-12">
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
                        <th style="background-color: rgba(227, 227, 227, 0.5);width:250px;">Name </th>
                        <td>{{$investor->name}}</td>
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
                            <a href="/investor/{{$investor->id}}/edit" class="btn btn-primary">Update Profile Information</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

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
                            <a href="/bank-account/{{$investor->id}}/edit" class="btn btn-primary">Update Bank Details</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection