<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BootStrap Link -->
    <link rel="stylesheet" href="{{asset('assets/website/css/bootstrap.min.css')}}">

    <!-- Icon Link -->
    <link rel="stylesheet" href="{{asset('assets/website/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/line-awesome.min.css')}}">

    <!-- Plugings Link -->
    <link rel="stylesheet" href="{{asset('assets/website/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/website/css/slick.css')}}">

    <!-- Custom Link -->
    <link rel="stylesheet" href="{{asset('assets/website/css/main.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/website/images/favicon.png')}}" type="image/x-icon">

    <title>{{env('APP_NAME')}}</title>

</head>

<body>
    <!-- preloader -->
    <div class="loader-bg">
        <div class="loader-p"></div>
    </div>

    <div class="overlay"></div>

    <!-- Header Section Starts Here -->
    <header class="header">
        <div class="header-bottom">
            <div class="container">
                <div class="header-area">
                    <div class="logo">
                        <a href="/">
                            <img src="{{asset('assets/website/images/logo_.png')}}" alt="logo">
                        </a>
                    </div>
                    <div class="header-trigger d-block d-lg-none">
                        <span></span>
                    </div>
                    <ul class="menu">
                        <li>
                            <a href="{{route('home')}}">Home</a>
                        </li>
                        <li>
                            <a href="{{route('about')}}">About</a>
                        </li>
                        <li>
                            <a href="{{route('plans')}}">Investment Plans</a>
                        </li>
                        <li>
                            <a href="{{route('contact')}}">Contact</a>
                        </li>
                        <li>
                            <a href="{{route('login')}}">Login</a>
                        </li>
                        <li>
                            <a href="{{route('register')}}" class="cmn--btn">Join Now</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section Ends Here -->