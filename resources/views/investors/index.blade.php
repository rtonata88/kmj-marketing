@extends('layouts.app')

{{--
@section('sidebar')
    @if(auth()->check())
        // include sidebar here
    @endif
@endsection
--}}

@section('title')
    Investors
@endsection

@section('content')
    <div class="row my-5">
        <div class="col text-left">
            <h2>Investors</h2>
        </div>
        <div class="col text-right">
            <div class="btn-toolbar" role="toolbar" aria-label="investors Context Toolbar">
                <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
                    <a href="{{route('investors.create')}}" class="btn btn-outline-primary">Add</a>
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
            @forelse($investors as $investor)
                <tr>
                    <td>{{$investor->id}}</td>
                    <td>{{$investor->name}}</td>
                    <td>{{$investor->description}}</td>
                    <td>{{$investor->status}}</td>
                    <td class="text-right">
                        <div class="btn-group btn-group-sm">
                            <a href="{{route('investors.edit', $investor->id)}}" type="button"
                               class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <button type="submit" class="dropdown-item text-danger"
                                        data-toggle="modal" data-target="#delete{{className($investor)}}Modal"
                                        data-id="{{$investor->id}}"
                                        href="{{route('investors.edit', $investor->id)}}">Delete
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"><p class="text-center mb-0">No Investor to show. <a
                                    class="btn btn-primary btn-sm rounded-0"
                                    href="{{route('investors.create')}}">Add One</a></p></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $investors->links() }}
    @include('investors.modals.delete',['id' => "deleteInvestorModal"])
@endsection

