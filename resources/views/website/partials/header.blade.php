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
                            <img src="{{asset('assets/website/images/logo.png')}}" alt="logo">
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
                            <a href="#0">Plan</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="investment-plan-01.html">Investment Plan 01</a>
                                </li>
                                <li>
                                    <a href="investment-plan-02.html">Investment Plan 02</a>
                                </li>
                                <li>
                                    <a href="investment-plan-03.html">Investment Plan 03</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#0">Pages</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="user-dashboard.html">User Dashboard</a>
                                </li>
                                <li>
                                    <a href="investor.html">Investor</a>
                                </li>
                                <li>
                                    <a href="affiliate.html">Affiliate</a>
                                </li>
                                <li>
                                    <a href="mission-vision.html">Mission & Vision</a>
                                </li>
                                <li>
                                    <a href="privacy-policy.html">Privacy & Policy</a>
                                </li>
                                <li>
                                    <a href="terms-of-service.html">Terms Of Service</a>
                                </li>
                                <li>
                                    <a href="refund-policy.html">Refund Policy</a>
                                </li>
                                <li>
                                    <a href="faq.html">Faq</a>
                                </li>
                                <li>
                                    <a href="404.html">404</a>
                                </li>
                                <li>
                                    <a href="#0">Account</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="login.html">Log In</a>
                                        </li>
                                        <li>
                                            <a href="sign-up.html">Sign Up</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#0">Blog</a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="blog.html">Blog</a>
                                </li>
                                <li>
                                    <a href="blog-details.html">Blog Details</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.html">Contact</a>
                        </li>
                        <li>
                            <a href="investment-plan-01.html" class="cmn--btn">Invest Now</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Section Ends Here -->