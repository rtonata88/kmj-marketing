@extends('layouts.app')

{{--
@section('sidebar')
    @if(auth()->check())
        // include sidebar here
    @endif
@endsection
--}}

@section('title')
    Edit Country
@endsection

@section('content')
    <div class="row my-5">
        <div class="col text-left">
            <h2>Edit Country</h2>
        </div>
        <div class="col text-right">
            <div class="btn-toolbar" role="toolbar" aria-label="countries Context Toolbar">
               <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
                   <a href="{{route('countries.index')}}" class="btn btn-outline-primary">Back to list</a>
               </div>
            </div>
        </div>
    </div>
    <form action="{{route('countries.update', $country->id)}}" method="post">
        <div class="row">
            {{csrf_field()}}
            {{method_field('patch')}}
            <div class="col-md-8">
                @include('countries._form')
                <div class="form-group row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-block btn-primary ml-auto">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
