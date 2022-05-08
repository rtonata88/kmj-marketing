@extends('layouts.app')

{{--
@section('sidebar')
    @if(auth()->check())
        // include sidebar here
    @endif
@endsection
--}}

@section('title')
    Countries
@endsection

@section('content')
    <div class="row my-5">
        <div class="col text-left">
            <h2>Countries</h2>
        </div>
        <div class="col text-right">
            <div class="btn-toolbar" role="toolbar" aria-label="countries Context Toolbar">
                <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
                    <a href="{{route('countries.create')}}" class="btn btn-outline-primary">Add</a>
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
            @forelse($countries as $country)
                <tr>
                    <td>{{$country->id}}</td>
                    <td>{{$country->name}}</td>
                    <td>{{$country->description}}</td>
                    <td>{{$country->status}}</td>
                    <td class="text-right">
                        <div class="btn-group btn-group-sm">
                            <a href="{{route('countries.edit', $country->id)}}" type="button"
                               class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu">
                                <button type="submit" class="dropdown-item text-danger"
                                        data-toggle="modal" data-target="#delete{{className($country)}}Modal"
                                        data-id="{{$country->id}}"
                                        href="{{route('countries.edit', $country->id)}}">Delete
                                </button>
                            </div>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"><p class="text-center mb-0">No Country to show. <a
                                    class="btn btn-primary btn-sm rounded-0"
                                    href="{{route('countries.create')}}">Add One</a></p></td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $countries->links() }}
@endsection

