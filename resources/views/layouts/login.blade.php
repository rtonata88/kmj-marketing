@include('website.partials.header')
<!-- Banner Section Starts Here -->
<section class="inner-banner bg_img padding-bottom" style="background: url(./assets/website/images/about/bg.png) no-repeat right bottom;">
  <div class="container">
    <div class="inner-banner-wrapper">
      <div class="inner-banner-content">
        <h2 class="inner-banner-title">login your
          account</h2>
        <ul class="breadcums">
          <li>
            <a href="index.html">Home</a>
          </li>
          <li>
            <span>Login</span>
          </li>
        </ul>
      </div>
      <div class="inner-banner-thumb about d-none d-md-block">
        <img src="./assets/website/images/account/thumb.png" alt="account">
      </div>
    </div>
  </div>
  <div class="shape1 paroller" data-paroller-factor=".2">
    <img src="./assets/website/images/about/balls.png" alt="about">
  </div>
</section>
<!-- Banner Section Ends Here -->


<!-- Account Section Starts Here -->
<section class="account-section padding-top padding-bottom">
  <div class="container">
    <div class="row align-items-center gy-5">
      <div class="col-lg-7  d-none d-lg-block">
        <div class="account-thumb">
          <img src="./assets/website/images/account/login-thumb.png" alt="account">
        </div>
      </div>
      <div class="col-lg-5">
        <div class="account-wrapper">
          <h2 class="title">Sign In Your Account</h2>
          <ul class="text-danger">
            @foreach($errors->all() as $error)
            <li>
              {{$error}}
            </li>
            @endforeach
          </ul>
          <form action="{{ route('login') }}" method="post" class="account-form" id="loginform">
            {{ csrf_field() }}
            <div class="form--group">
              <i class="las la-user"></i>
              <input type="text" class="form--control" name="username" placeholder="username">
            </div>
            <div class="form--group">
              <i class="las la-lock"></i>
              <input type="password" class="form--control" name="password" placeholder="Password">
            </div>
            <div class="d-flex justify-content-between">
              <div class="form--group forgot-pass">
                <a href="#0">Forgot Password?</a>
              </div>
            </div>
            <div class="form--group">
              <button type="submit" class="custom-button">SIGN IN NOW</button>
            </div>
          </form>
          <span class="subtitle">Don't have an account yet?</span>
          <a href="{{route('register')}}" class="create-account theme-four">Create Account</a>
          <div class="shape">
            <img src="./assets/website/images/account/shape.png" alt="account">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Account Section Ends Here -->
@include('website.partials.footer')