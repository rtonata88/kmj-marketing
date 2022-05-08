@extends('layouts.app')

{{--
@section('sidebar')
    @if(auth()->check())
        // include sidebar here
    @endif
@endsection
--}}

@section('content')
    <div class="row my-5">
        <div class="col text-left">
            <h2>Country</h2>
        </div>
        <div class="col text-right">
            <div class="btn-toolbar" role="toolbar" aria-label="countries Context Toolbar">
               <div class="btn-group btn-group-sm ml-auto" role="group" aria-label="">
                   <a href="{{route('countries.index')}}" class="btn btn-outline-primary">Back to list</a>
               </div>
            </div>
        </div>
    </div>
    @component('components.record-navigator', [
        'heading'=> $country->name,
        'route' => 'countries.show',
        'previous' => $previous,
        'next' => $next
    ])@endcomponent

    <p>Display fields here.</p>
@endsection



