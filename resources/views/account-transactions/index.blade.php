@extends('layouts.app')

{{--
@section('sidebar')
    @if(auth()->check())
        // include sidebar here
    @endif
@endsection
--}}

@section('title')
    Account Transactions
@endsection

@section('content')
    <div class="row my-5">
        <div class="col text-left">
            <h2>Account Transactions</h2>
        </div>
        <div class="col text-right">
            <div class="btn-toolbar" role="toolbar" aria-label="account-transactions Context Toolbar">
                <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
                    <a href="{{route('account-transactions.create')}}" class="btn btn-outline-primary">Add</a>
                </div>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th class="text-right">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($accountTransactions as $accountTransaction)
                <tr>
                    <td>{{$accountTransaction->id}}</td>
                    <td>{{$accountTransaction->name}}</td>
                    <td>{{$accountTransaction->description}}</td>
                    <td>{{$accountTransaction->status}}</td>
                    <td class="text-right">
                        <div class="btn-group btn-group-sm">
                            <a href="{{route('account-transactions.edit', $accountTransaction->id)}}" type="button"
                               class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <button type="submit" class="dropdown-item text-danger"
                                        data-toggle="modal" data-target="#delete{{className($accountTransaction)}}Modal"
                                        data-id="{{$accountTransaction->id}}"
                                        href="{{route('account-transactions.edit', $accountTransaction->id)}}">Delete
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"><p class="text-center mb-0">No Account Transaction to show. <a
                                    class="btn btn-primary btn-sm rounded-0"
                                    href="{{route('account-transactions.create')}}">Add One</a></p></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $accountTransactions->links() }}
    @include('account-transactions.modals.delete',['id' => "deleteAccountTransactionModal"])
@endsection

