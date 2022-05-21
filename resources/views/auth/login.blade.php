@extends('layouts.login')

@section('content')
<div class="col-md-6 m-auto">
  <img src="{{asset('assets/Logo.png')}}" class="img-fluid">
</div>

<p class="text-muted text-center">Sign In to your account</p>
@if($errors->any())
<ul class="text-danger">
  @foreach($errors->all() as $error)
  <li>
    {{$error}}
  </li>
  @endforeach
</ul>
@endif
<form action="{{ route('login') }}" method="post" class="form-horizontal new-lg-form" id="loginform">
  {{ csrf_field() }}
  <div class="input-group mb-3">
    <div class="input-group-prepend"><span class="input-group-text">
        <svg class="c-icon">
          <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-user')}}"></use>
        </svg></span></div>
    <input class="form-control" type="text" required="" name="username" placeholder="Username">
    @if ($errors->has('username'))
    <span class="help-block text-danger">
      <strong>{{ $errors->first('username') }}</strong>
    </span>
    @endif
  </div>
  <div class="input-group mb-4">
    <div class="input-group-prepend"><span class="input-group-text">
        <svg class="c-icon">
          <use xlink:href="{{asset('new/node_modules/@coreui/icons/sprites/free.svg#cil-lock-locked')}}"></use>
        </svg></span></div>
    <input class="form-control" type="password" required="" name="password" placeholder="Password">
    @if ($errors->has('password'))
    <span class="help-block text-danger ">
      <strong>{{ $errors->first('password') }}</strong>
    </span>
    @endif
  </div>
  <div class="row">
    <div class="col-6">
      <button class="btn btn-primary px-4" type="submit">Login</button>
    </div>
  </div>
</form>
@endsection