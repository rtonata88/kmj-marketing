@extends('layouts.app')

{{--
@section('sidebar')
    @if(auth()->check())
        // include sidebar here
    @endif
@endsection
--}}

@section('title')
    Accounts
@endsection

@section('content')
    <div class="row my-5">
        <div class="col text-left">
            <h2>Accounts</h2>
        </div>
        <div class="col text-right">
            <div class="btn-toolbar" role="toolbar" aria-label="accounts Context Toolbar">
                <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
                    <a href="{{route('accounts.create')}}" class="btn btn-outline-primary">Add</a>
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
            @forelse($accounts as $account)
                <tr>
                    <td>{{$account->id}}</td>
                    <td>{{$account->name}}</td>
                    <td>{{$account->description}}</td>
                    <td>{{$account->status}}</td>
                    <td class="text-right">
                        <div class="btn-group btn-group-sm">
                            <a href="{{route('accounts.edit', $account->id)}}" type="button"
                               class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <button type="submit" class="dropdown-item text-danger"
                                        data-toggle="modal" data-target="#delete{{className($account)}}Modal"
                                        data-id="{{$account->id}}"
                                        href="{{route('accounts.edit', $account->id)}}">Delete
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"><p class="text-center mb-0">No Account to show. <a
                                    class="btn btn-primary btn-sm rounded-0"
                                    href="{{route('accounts.create')}}">Add One</a></p></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $accounts->links() }}
    @include('accounts.modals.delete',['id' => "deleteAccountModal"])
@endsection

