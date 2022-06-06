@include('website.partials.header')
<!-- Banner Section Starts Here -->
<section class="inner-banner bg_img padding-bottom" style="background: url(./assets/website/images/about/bg.png) no-repeat right bottom;">
    <div class="container">
        <div class="inner-banner-wrapper">
            <div class="inner-banner-content">
                <h2 class="inner-banner-title">Create your
                    account</h2>
                <ul class="breadcums">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <span>Registration</span>
                    </li>
                </ul>
            </div>
            <div class="inner-banner-thumb about d-none d-md-block">
                <img src="./assets/website/images/account/thumb.png" alt="account">
            </div>
        </div>
    </div>
    <div class="shape1">
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
                    <h2 class="title">Create Your Account</h2>
                    @if($errors->any())
                    <ul class="text-danger">
                        @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <form action="{{ route('register') }}" method="post" class="account-form" id="loginform">
                        {{ csrf_field() }}
                        <div class="form--group">
                            {{Form::text('referrer_username', null, ['class' => 'form--control', 'placeholder' => 'Referrer username'])}}
                        </div>
                        <div class="form--group">
                            {{Form::text('name', null, ['class' => 'form--control', 'placeholder' => 'Your fullname'])}}
                        </div>
                        <div class="form--group">
                            {{Form::text('mobile_number', null, ['class' => 'form--control', 'placeholder' => 'Mobile number'])}}
                        </div>

                        <div class="form--group">
                            {{Form::email('email', null, ['class' => 'form--control', 'placeholder' => 'Email Address'])}}
                        </div>
                        <div class="row">
                            <div class="form--group">
                                {{Form::select('country_id', $countries, null, ['class' => 'form--control'])}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form--group">
                                {{Form::select('region_id', $regions, null, ['class' => 'form--control'])}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form--group">
                                {{Form::select('town_id', $towns, null, ['class' => 'form--control'])}}
                            </div>
                        </div>

                        <hr>
                        <div class="form--group">
                            {{Form::text('username', null, ['class' => 'form--control', 'placeholder' => 'Your username'])}}
                            <input type="hidden" name="password" value="Wealth@2022" class="form--control" placeholder="Password" />
                            <input type="hidden" name="password_confirmation" value="Wealth@2022" class="form--control" placeholder="Re-type password" />
                            <span>The default password is: <strong>Wealth@2022</strong></span>
                        </div>
                        <div class="form--group">
                            <button type="submit" class="custom-button">REGISTER</button>
                        </div>
                    </form>
                    <span class="subtitle">Already you have an account here?</span>
                    <a href="{{route('login')}}" class="create-account theme-four">Sign in</a>
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