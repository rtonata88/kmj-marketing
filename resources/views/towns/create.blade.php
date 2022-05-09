@extends('layouts.app')

{{--
@section('sidebar')
    @if(auth()->check())
        // include sidebar here
    @endif
@endsection
--}}

@section('title')
    Add Town
@endsection

@section('content')
    <div class="row my-5">
        <div class="col text-center">
            <h2>Add Town</h2>
        </div>
        <div class="col-auto text-right">
            <div class="btn-toolbar" role="toolbar" aria-label="towns Context Toolbar">
               <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
                   <a href="{{route('towns.index')}}" class="btn btn-outline-primary">Back to list</a>
               </div>
            </div>
        </div>
    </div>
    <form action="{{route('towns.store')}}" method="post">
        <div class="row">
            {{csrf_field()}}
            <div class="col-md-8">
                @include('towns._form')
                <div class="form-group row">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <button type="submit" class="btn btn-block btn-primary ml-auto">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
