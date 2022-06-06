@include('website.partials.header')

<!-- Banner Section Starts Here -->
<section class="banner-section bg_img" style="background: url({{asset('assets/website/images/banner/bg.png')}}) center bottom;">
    <div class="container">
        <div class="row">
            <div class="col-lg-4  d-none d-lg-block">
                <div class="banner-thumb">
                    <img src="{{asset('assets/website/images/banner/thumb.png')}}" alt="banner">
                    <div class="shapes ">
                        <div class="shape2">
                            <img src="{{asset('assets/website/images/banner/shape1.png')}}" alt="banner">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="banner-content">
                    <h1 class="banner-title">KMJ <span class="text--base">Network </span><span> Marketing</span></h1>
                    <span class="subtitle">People's only hope, your way to financial freedom.</span>
                    <div class="button-group d-flex flex-wrap align-items-center">
                        <a href="{{route('register')}}" class="cmn--btn btn--secondary">Join now</a>
                        <!-- <a href="https://www.youtube.com/watch?v=WOb4cj7izpE" class="video-button"><i class="las la-play"></i></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section Ends Here -->


<!-- How it Works Section Starts Here -->
<section class="how-work padding-top padding-bottom">
    <div class="container">
        <div class="row justif-content-center align-items-center">
            <div class="col-lg-6">
                <div class="how-work-left-content">
                    <div class="section-header wow fadeInUp">
                        <span class="subtitle">Why KMJ Marketing</span>
                        <h2 class="title">Easy way to make money</h2>
                        <p>At KMJ we care about you. We put in a lot of effort to provide you a smooth journey to your financial freedom.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row align-items-center gy-4">
                    <div class="col-md-6 col-sm-6">
                        <div class="row gy-4">
                            <div class="col-12 wow fadeInUp" data-wow-delay=".2s">
                                <div class="how-work-item">
                                    <div class="how-work-item-thumb theme-one">
                                        <i class="las la-atlas"></i>
                                    </div>
                                    <div class="how-work-item-content">
                                        <h4 class="title"><a href="sign-up.html">Easy model</a></h4>
                                        <p>Join only for N$150.00 and recruit 6 other members. Make money from the 1st person already.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 wow fadeInUp" data-wow-delay=".3s">
                                <div class="how-work-item gradient-two">
                                    <div class="how-work-item-thumb theme-two">
                                        <i class="las la-hand-holding-usd"></i>
                                    </div>
                                    <div class="how-work-item-content">
                                        <h4 class="title"><a href="investment-plan-01.html">Secure FREE account</a></h4>
                                        <p>Create a FREE account and see your money grow. We provide a visual representation of your network</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".4s">
                        <div class="how-work-item gradient-four">
                            <div class="how-work-item-thumb theme-four">
                                <i class="las la-wallet"></i>
                            </div>
                            <div class="how-work-item-content">
                                <h4 class="title"><a href="login.html">Quick Withdrawals</a></h4>
                                <p>Easy to withdraw your profits. Simply, complete the online form and we will handle the rest.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- How it Works Section Ends Here -->


<!-- Feature Section STarts Here -->
<section class="feature-section padding-top">
    <div class="container">
        <div class="row align-items-center gy-5 ">
            <div class="col-lg-6 col-md-10 wow fadeInLeft d-none d-lg-block">
                <div class="feature-thumb">
                    <img src="{{asset('assets/website/images/feature/thumb.png')}}" alt="feature">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInRight">
                <div class="feature-content">
                    <div class="section-header">
                        <span class="subtitle">awesome KMJ PLATFORM features</span>
                        <h2 class="title">our best PLATFORM features</h2>
                    </div>
                    <ul class="feature-info-list">
                        <li>
                            Account Management
                        </li>
                        <li>
                            Online withdrawal requests
                        </li>
                        <li>
                            Online transfer between members
                        </li>
                        <li>
                            Visual network charts
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feature Section Ends Here -->

<!-- Counter Section Starts Here -->
<section class="counter-section padding-top">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">Grow with us</span>
            <h2 class="title">Our stats at a glance</h2>
        </div>
        <div class="row justif-content-center gy-5">
            <div class="col-lg-3 col-sm-6">
                <div class="counter-wrapper">
                    <div class="counter-item">
                        <div class="counter-inner">
                            <h2 class="counter-sign">$</h2>
                            <span class="odometer title" data-odometer-final="78">k</span>
                        </div>
                    </div>
                    <span class="info">Total Payout (N$)</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-wrapper">
                    <div class="counter-item">
                        <div class="counter-inner">
                            <span class="odometer title" data-odometer-final="112">sss</span>
                            <h2 class="counter-sign">K</h2>
                        </div>
                    </div>
                    <span class="info">Registered Members</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-wrapper">
                    <div class="counter-item">
                        <div class="counter-inner">
                            <span class="odometer title" data-odometer-final="774"></span>
                            <h2 class="counter-sign">K</h2>
                        </div>
                    </div>
                    <span class="info">Worth of Awards</span>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="counter-wrapper">
                    <div class="counter-item">
                        <div class="counter-inner">
                            <span class="odometer title" data-odometer-final="7740"></span>
                        </div>
                    </div>
                    <span class="info">Total Investment Plan</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Counter Section Ends Here -->


<!-- Why Choose Us Section Starts Here -->
<!-- <section class="choose-us-three padding-top padding-bottom overflow-hidden">
        <div class="container">
            <div class="row gy-5">
                <div class="col-xl-6 col-lg-5 d-none d-lg-block wow slideInLeft">
                    <div class="choose-us-thumb">
                        <img src="{{asset('assets/website/images/choose-us/thumb.png')}}" alt="choose-us">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <div class="choose-us-right-content">
                        <div class="section-header">
                            <span class="subtitle wow fadeInUp">WHY CHOOSE US</span>
                            <h2 class="title wow fadeInUp" data-wow-delay=".5s">Why You Should Saty With Us</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">
                                Dapibus et amet sociis, arcu orci orci tincidunt neque. Purus etortors justmauris eumalesuada architecto.
                            </p>
                        </div>
                        <div class="row g-4">
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{asset('assets/website/images/choose-us/lock.png')}}" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">High Security</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{asset('assets/website/images/choose-us/live-chat.png')}}" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">Live Chat</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{asset('assets/website/images/choose-us/business-ico.png')}}" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">Free Transection</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{asset('assets/website/images/choose-us/user.png')}}" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">Supper Dashboard</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{asset('assets/website/images/choose-us/lock.png')}}" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">High Security</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="choose-item">
                                    <div class="choose-thumb">
                                        <img src="{{asset('assets/website/images/choose-us/lock2.png')}}" alt="choose-us">
                                    </div>
                                    <div class="choose-content">
                                        <h6 class="title">High Security</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
<!-- Why Choose Us Section Ends Here -->


<!-- Testimonial Section Starts Here -->
<!-- <section class="testimonial-seciton pb-180">
        <div class="container">
            <div class="row gy-4 align-items-center justify-content-center">
                <div class="col-lg-5 d-none d-lg-block  wow slideInLeft">
                    <div class="testimonial-thumb">
                        <img src="{{asset('assets/website/images/testimonial/thumb2.png')}}" alt="testimonial">
                    </div>
                </div>
                <div class="col-lg-7 col-md-10">
                    <div class="testimonial-content">
                        <div class="section-header text-center">
                            <span class="subtitle wow fadeInUp">our happly client</span>
                            <h2 class="title wow fadeInUp" data-wow-delay=".5s">Discover Our Happy
                                Client Feedback</h2>
                        </div>
                        <div class="testimonial-slider-wrapper">
                            <div class="testimonial-img">
                                <div class="testimonial-img-slider">
                                    <div class="img-item">
                                        <img src="{{asset('assets/website/images/testimonial/item1.png')}}" alt="testimonial">
                                    </div>
                                    <div class="img-item">
                                        <img src="{{asset('assets/website/images/testimonial/item1.png')}}" alt="testimonial">
                                    </div>
                                    <div class="img-item">
                                        <img src="{{asset('assets/website/images/testimonial/item1.png')}}" alt="testimonial">
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-slider">
                                <div class="content-item">
                                    <div class="quote-icon">
                                        <i class="las la-quote-left"></i>
                                    </div>
                                    <div class="content-inner">
                                        <p>
                                            Pipsum dolor sit, amet adipisicing elit. Molestiae similique facere quia! Eligendi, eveniet aut impedit deleniti autem obcaecati ni
                                        </p>
                                        <h5 class="name">Robindronath Chondro</h5>
                                        <span class="designation">Businessman</span>
                                    </div>
                                </div>
                                <div class="content-item">
                                    <div class="quote-icon">
                                        <i class="las la-quote-left"></i>
                                    </div>
                                    <div class="content-inner">
                                        <p>
                                            Mattis vestibulum elit omnis metuseu urna at facilisi loborntum turpis velsed molestie varius purus rhoncus
                                        </p>
                                        <h5 class="name">Jubayer Al Somser</h5>
                                        <span class="designation">Developer</span>
                                    </div>
                                </div>
                                <div class="content-item">
                                    <div class="quote-icon">
                                        <i class="las la-quote-left"></i>
                                    </div>
                                    <div class="content-inner">
                                        <p>
                                            Kikit Mattis vestibulum elit omnis metuseu urna at facilisi loborntum turpis velsed molestie varius purus rhoncus incidunt ipsam soluta rem ipsum.
                                        </p>
                                        <h5 class="name">Raihan Rafuj</h5>
                                        <span class="designation">Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
<!-- Testimonial Section Ends Here -->


<!-- Help Section Starts Here -->
<!-- <section class="help-section  overflow-hidden">
        <div class="container">
            <div class="row align-items-center gy-5 flex-column-reverse flex-lg-row">
                <div class="col-lg-6">
                    <div class="help-content">
                        <div class="section-header">
                            <span class="subtitle wow fadeInUp">we are ready for your help</span>
                            <h2 class="title wow fadeInUp" data-wow-delay=".5s">How We Can Help You?</h2>
                            <p class="wow fadeInUp" data-wow-delay=".6s">
                                Dapibus et amet sociis, arcu orci orci tincidunt neque. Purus etortor sjustmauris eumalesuada architecto.
                            </p>
                        </div>
                        <div class="faq-tab-menu nav-tabs nav border-0 row g-4 justify-content-center">
                            <div class="col-6 col-sm-4 col-md-4 col-lg-6 col-xl-4 wow fadeInLeft" data-wow-delay=".2s">
                                <a href="#investor" class="item active" data-bs-toggle="tab">
                                    <div class="thumb">
                                        <img src="{{asset('assets/website/images/help/trading.png')}}" alt="">
                                    </div>
                                    <h5>Become an investor</h5>
                                </a>
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 col-lg-6 col-xl-4 wow fadeInLeft" data-wow-delay=".3s">
                                <a href="#privacy" class="item" data-bs-toggle="tab">
                                    <div class="thumb">
                                        <img src="{{asset('assets/website/images/help/password.png')}}" alt="">
                                    </div>
                                    <h5>our company privacy</h5>
                                </a>
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 col-lg-6 col-xl-4 wow fadeInLeft" data-wow-delay=".4s">
                                <a href="#account" class="item" data-bs-toggle="tab">
                                    <div class="thumb">
                                        <img src="{{asset('assets/website/images/help/support.png')}}" alt="">
                                    </div>
                                    <h5>how setting account</h5>
                                </a>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane show fade active" id="investor">
                                <div class="faq-wrapper">
                                    <div class="faq-item wow fadeInUp" data-wow-delay=".3s">
                                        <div class="faq-title">
                                            <h5 class="title">Why You Should Become An Investor?</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis distinctio quas at, voluptates saepe asperiores nesciunt nulla dolor dolore alias! Saepe laboriosam aliquid, ullam nihil nostrum quibusdam iste expedita inventore?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="faq-item open active wow fadeInUp" data-wow-delay=".4s">
                                        <div class="faq-title">
                                            <h5 class="title">Can I Invest Using Cryptocurrency?</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis distinctio quas at, voluptates saepe asperiores nesciunt nulla dolor dolore alias! Saepe laboriosam aliquid, ullam nihil nostrum quibusdam iste expedita inventore?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="faq-item wow fadeInUp" data-wow-delay=".5s">
                                        <div class="faq-title">
                                            <h5 class="title">Why You Choose Us?</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis distinctio quas at, voluptates saepe asperiores nesciunt nulla dolor dolore alias! Saepe laboriosam aliquid, ullam nihil nostrum quibusdam iste expedita inventore?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane show fade" id="privacy">
                                <div class="faq-wrapper">
                                    <div class="faq-item">
                                        <div class="faq-title">
                                            <h5 class="title">Frequently gets updated based on new data insights.</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis distinctio quas at, voluptates saepe asperiores nesciunt nulla dolor dolore alias! Saepe laboriosam aliquid, ullam nihil nostrum quibusdam iste expedita inventore?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="faq-item open active">
                                        <div class="faq-title">
                                            <h5 class="title">Drives internal pageviews to.</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis distinctio quas at, voluptates saepe asperiores nesciunt nulla dolor dolore alias! Saepe laboriosam aliquid, ullam nihil nostrum quibusdam iste expedita inventore?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <div class="faq-title">
                                            <h5 class="title">Showcases expertise, trust, and authority.</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis distinctio quas at, voluptates saepe asperiores nesciunt nulla dolor dolore alias! Saepe laboriosam aliquid, ullam nihil nostrum quibusdam iste expedita inventore?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane show fade" id="account">
                                <div class="faq-wrapper">
                                    <div class="faq-item">
                                        <div class="faq-title">
                                            <h5 class="title">Frequently gets updated based on new data insights.</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis distinctio quas at, voluptates saepe asperiores nesciunt nulla dolor dolore alias! Saepe laboriosam aliquid, ullam nihil nostrum quibusdam iste expedita inventore?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="faq-item open active">
                                        <div class="faq-title">
                                            <h5 class="title">Drives internal pageviews to.</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis distinctio quas at, voluptates saepe asperiores nesciunt nulla dolor dolore alias! Saepe laboriosam aliquid, ullam nihil nostrum quibusdam iste expedita inventore?
                                            </p>
                                        </div>
                                    </div>
                                    <div class="faq-item">
                                        <div class="faq-title">
                                            <h5 class="title">Showcases expertise, trust, and authority.</h5>
                                            <div class="arrow">
                                                <i class="fas fa-angle-up"></i>
                                            </div>
                                        </div>
                                        <div class="faq-content">
                                            <p>
                                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nobis distinctio quas at, voluptates saepe asperiores nesciunt nulla dolor dolore alias! Saepe laboriosam aliquid, ullam nihil nostrum quibusdam iste expedita inventore?
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block wow fadeInRight">
                    <div class="help-thumb ">
                        <img src="{{asset('assets/website/images/help/thumb.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section> -->
<!-- Help Section Ends Here -->


<!-- Affiliate Section Starts Here -->
<!-- <section class="affiliate-section padding-top padding-bottom overflow-hidden">
        <div class="container">
            <div class="row gy-5 align-items-center">
                <div class="col-lg-5 d-lg-block d-none wow fadeInLeft">
                    <div class="affiliate-thumb">
                        <img src="{{asset('assets/website/images/affiliate/thumb.png')}}" alt="affiliate">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="affiliate-content">
                        <div class="section-header">
                            <span class="subtitle  fadeInUp">Affiliate program</span>
                            <h2 class="title  fadeInUp" data--delay=".5s">Make Money By Affiliate With Out Invest</h2>
                        </div>
                        <div class="affilate-tab-menu row g-4">
                            <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 tab-item  fadeInUp" data--delay=".3s">
                                <div class="affiliate-tab-item">
                                    <div class="item-inner">
                                        <h3 class="percentage">05%</h3>
                                        <span class="serial">1st</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 tab-item  fadeInUp" data--delay=".4s">
                                <div class="affiliate-tab-item">
                                    <div class="item-inner">
                                        <h3 class="percentage">07%</h3>
                                        <span class="serial">2nd</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-4 col-md-4 col-lg-4 col-xl-4 tab-item  fadeInUp" data--delay=".5s">
                                <div class="affiliate-tab-item">
                                    <div class="item-inner">
                                        <h3 class="percentage">12%</h3>
                                        <span class="serial">3rd</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="affiliate-item-content">
                            <h4 class="title">Dapibus et amet sociis, arcu orci orci tinci dunt neque. Purus etortor sjust mauris eumales uada architecto.</h4>
                            <p>Pulvinar a diam ipsum volutpat, bibendum bibendum quia urna id eros. Laoreet fusce dictum amet, purus facilisis pellentesque sed est tristique, ut ligula ac aut integer per, eu purus commodo, id fermentum semper nisl a. Interdum purus molestie. Volutpat quisque justo tellus arcu eget, nonummy vel luctus hendrerit etiam, integer congue aliquam, nunc velit sunt ut at ve</p>
                            <a href="affiliate.html" class="cmn--btn">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape">
            <img src="{{asset('assets/website/images/affiliate/bg-map.png')}}" alt="affiliate">
        </div>
    </section> -->
<!-- Affiliate Section Ends Here -->


<!-- Blog Section Start Here -->
<!-- <section class="blog-section padding-bottom overflow-hidden">
        <div class="container">
            <div class="row justify-content-center ">
                <div class="col-lg-7">
                    <div class="section-header text-center">
                        <span class="subtitle wow fadeInUp">Hyip investment blog post</span>
                        <h2 class="title wow fadeInUp" data-wow-delay=".5s">Best Comunity Platform
                            for investment</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            Praesent nibh aut vivamusad quis in tortor aenean ligula non lacinia quisque. Purus nunc tellus ac nulla praesent quis porttitor sit arcu congue auctor ut amet.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gy-4">
                <div class="col-lg-4 col-md-6 col-sm-10 wow slideInUp" data-wow-delay=".3s">
                    <div class="post-item">
                        <div class="post-thumb">
                            <a href="blog-details.html">
                                <img src="{{asset('assets/website/images/blog/item1.png')}}" alt="blog">
                            </a>
                        </div>
                        <div class="post-content">
                            <h4 class="post-title">
                                <a href="blog-details.html">Auctor gravida vestibulu</a>
                            </h4>
                            <ul class="meta-post">
                                <li>
                                    <a href="#0">
                                        <i class="las la-tag"></i>
                                        Investment
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="las la-calendar-check"></i>
                                        09 May 2020
                                    </a>
                                </li>
                            </ul>
                            <p>Phasellus nulla inceptos. vivamumnaametn quisque tortor. Integer lacu ornare cum.an ante nec situspendisse.</p>
                            <a href="blog-details.html" class="read-more-button">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 wow slideInUp" data-wow-delay=".4s">
                    <div class="post-item">
                        <div class="post-thumb">
                            <a href="blog-details.html">
                                <img src="{{asset('assets/website/images/blog/item2.png')}}" alt="blog">
                            </a>
                        </div>
                        <div class="post-content">
                            <h4 class="post-title">
                                <a href="blog-details.html">Auctor gravida vestibulu</a>
                            </h4>
                            <ul class="meta-post">
                                <li>
                                    <a href="#0">
                                        <i class="las la-tag"></i>
                                        Investment
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="las la-calendar-check"></i>
                                        09 May 2020
                                    </a>
                                </li>
                            </ul>
                            <p>Phasellus nulla inceptos. vivamumnaametn quisque tortor. Integer lacu ornare cum.an ante nec situspendisse.</p>
                            <a href="blog-details.html" class="read-more-button">Read More...</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 wow slideInUp" data-wow-delay=".5s">
                    <div class="post-item">
                        <div class="post-thumb">
                            <a href="blog-details.html">
                                <img src="{{asset('assets/website/images/blog/item3.png')}}" alt="blog">
                            </a>
                        </div>
                        <div class="post-content">
                            <h4 class="post-title">
                                <a href="blog-details.html">Auctor gravida vestibulu</a>
                            </h4>
                            <ul class="meta-post">
                                <li>
                                    <a href="#0">
                                        <i class="las la-tag"></i>
                                        Investment
                                    </a>
                                </li>
                                <li>
                                    <a href="#0">
                                        <i class="las la-calendar-check"></i>
                                        09 May 2020
                                    </a>
                                </li>
                            </ul>
                            <p>Phasellus nulla inceptos. vivamumnaametn quisque tortor. Integer lacu ornare cum.an ante nec situspendisse.</p>
                            <a href="blog-details.html" class="read-more-button">Read More...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
<!-- Blog Section Ends Here -->


<!-- Payment Gateway Section Starts Here -->
<!-- <section class="payment-gateway padding-bottom">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-5">
                    <div class="section-header">
                        <h2 class="title wow fadeInUp" data-wow-delay=".5s">Choose Yor Payment
                            Gateway</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">
                            Risus et ut arcu sem nulla. Sit lacus lorem, sed turpis erat rhoncus nibh. Lacinia mauris vel, nibh sociis praesent aliquam proin, sit ut nec ultrices, odio lacus
                        </p>
                    </div>
                </div>
                <div class="col-lg-7 wow fadeInRight">
                    <div class="payment-gateway-slider">
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{asset('assets/website/images/gateway/icon1.png')}}" alt="gateway">
                                <span class="coin-name">Bitcoin</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{asset('assets/website/images/gateway/icon2.png')}}" alt="gateway">
                                <span class="coin-name">Bitcoin</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{asset('assets/website/images/gateway/icon3.png')}}" alt="gateway">
                                <span class="coin-name">Ethereum</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{asset('assets/website/images/gateway/icon4.png')}}" alt="gateway">
                                <span class="coin-name">Ripple</span>
                            </div>
                        </div>
                        <div class="sigle-slider">
                            <div class="gateway-item">
                                <img src="{{asset('assets/website/images/gateway/icon2.png')}}" alt="gateway">
                                <span class="coin-name">Ethereum</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
<!-- Payment Gateway Section Ends Here -->


<!-- Profit Calculation Section Starts Here -->
<!-- <section class="profit-calculation wow slideInUp overflow-hidden">
        <div class="container">
            <div class="profit-calculation-wrapper">
                <h3 class="title">Calculate How Much You Profit</h3>
                <form class="profit-form">
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6">
                            <div class="form--group">
                                <select>
                                    <option value="plan01">Select the Plan</option>
                                    <option value="plan01">Business Plan</option>
                                    <option value="plan01">Professional Plan</option>
                                    <option value="plan01">Individual Plan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form--group">
                                <select>
                                    <option value="plan01">Select the Currency</option>
                                    <option value="plan01">Bitcoin</option>
                                    <option value="plan01">Ethereum</option>
                                    <option value="plan01">Ripple</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form--group">
                                <input type="text" class="form--control" placeholder="Enter the Ammount" required>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="profit-title-wrapper d-flex justify-content-between my-5 mb-3">
                    <h5 class="daily-profit text--secondary">Daily Profit - <span class="ammount">0.1200</span>BTC</h5>
                    <h5 class="daily-profit theme-four">Total Profit - <span class="ammount">24.1200</span>BTC</h5>
                </div>
                <div class="invest-range-area">
                    <div class="main-amount">
                        <input type="text" class="calculator-invest" id="btc-amount" readonly>
                    </div>
                    <div class="invest-amount" data-min="01 BTC" data-max="10000 BTC">
                        <div id="btc-range" class="invest-range-slider"></div>
                    </div>
                    <button type="submit" class="custom-button px-0">Invest now</button>
                </div>
            </div>
        </div>
    </section> -->
<!-- Profit Calculation Section Ends Here -->


@include('website.partials.footer')