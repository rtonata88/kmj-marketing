@extends('layouts.app')
@section('breadcrumb')
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Network</li>
        <li class="breadcrumb-item active">Grid View </li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header">
                <a href="/network/chart-view" class="btn btn-outline-info">
                    Chart view
                </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped table-sm table-hover" style="width:100%; font-size:12px">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Current Stage</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($investor->descendants as $index=>$descendant)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$descendant->user->username}}</td>
                            <td>{{$descendant->stage->name}}</td>
                        <td> <a href="/child-network/{{ $descendant->id }}">Show Network</a> </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">
                                You do not have anybody under you
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
