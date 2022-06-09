@include('website.partials.header')

<!-- Banner Section Starts Here -->
<section class="inner-banner bg_img padding-bottom" style="background: url(./assets/website/images/about/bg.png) no-repeat right bottom;">
    <div class="container">
        <div class="inner-banner-wrapper">
            <div class="inner-banner-content">
                <h2 class="inner-banner-title">About us</h2>
                <ul class="breadcums">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <span>About</span>
                    </li>
                </ul>
            </div>
            <div class="inner-banner-thumb about d-none d-md-block">
                <img src="{{asset('assets/website/images/about/thumb2.png')}}" alt="about">
            </div>
        </div>
    </div>
    <div class="shape1">
        <img src="{{asset('assets/website/images/about/balls.png')}}" alt="about">
    </div>
</section>
<!-- Banner Section Ends Here -->


<!-- Why Choose Us Section Starts Here -->
<section class="choose-us padding-bottom padding-top overflow-hidden">
    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-5  d-none d-lg-block">
                <div class="choose-us-thumb two">
                    <img src="{{asset('assets/website/images/choose-us/thumb2.png')}}" alt="choose-us">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="choose-us-right-content">
                    <div class="section-header">
                        <h2 class="title mx-100">Company Ownership</h2>
                        <p class=" fadeInUp" data--delay=".6s">
                            KMJ Network Marketing was founded (established) in February 2022 by Michael Kalumba and Josephina Johannes and is a 100% Namibian owned entity. This makes financial freedom possible for all Namibians in network marketing. Network marketing is a business model that depends on person-to-person sales by independent representatives, often working from home.
                        </p>
                        <p class=" fadeInUp" data--delay=".6s">
                            KMJ Network Marketing consists of the CEO, Director, Finance Manager and Country Coordinators with its headquarters in Windhoek. KMJ Network Marketing is not just limited to Namibians, but to international market at large. This company is here to change many lives of the Namibian house and beyond our borders. Our target market is young or old, all ethnic groups.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Choose Us Section Ends Here -->


<!-- Investor Section Starts Here -->
<!-- <section class="investor-section padding-bottom overflow-hidden">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-header text-center">
                    <h2 class="title">our team composition</h2>
                    <p>
                        We are made up of the following.
                    </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center gy-5">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6  slideInUp" data--delay=".3s">
                <div class="investor-item">
                    <div class="investor-thumb">
                        <img src="{{asset('assets/website/images/investor/item1.png')}}" alt="investor">
                    </div>
                    <div class="investor-content">
                        <h4 class="name">Name</h4>
                        <span class="designation">Chief Executive officer</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6  slideInUp" data--delay=".4s">
                <div class="investor-item">
                    <div class="investor-thumb">
                        <img src="{{asset('assets/website/images/investor/item2.png')}}" alt="investor">
                    </div>
                    <div class="investor-content">
                        <h4 class="name">Name</h4>
                        <span class="designation">Position name</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6  slideInUp" data--delay=".5s">
                <div class="investor-item">
                    <div class="investor-thumb">
                        <img src="{{asset('assets/website/images/investor/item3.png')}}" alt="investor">
                    </div>
                    <div class="investor-content">
                        <h4 class="name">Name</h4>
                        <span class="designation">Position</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6  slideInUp" data--delay=".6s">
                <div class="investor-item">
                    <div class="investor-thumb">
                        <img src="{{asset('assets/website/images/investor/item4.png')}}" alt="investor">
                    </div>
                    <div class="investor-content">
                        <h4 class="name">Name</h4>
                        <span class="designation">Position</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Investor Section Ends Here -->


<!-- Help Section Starts Here -->
<section class="help-section overflow-hidden">
    <div class="container">
        <div class="row align-items-center gy-5 flex-column-reverse flex-lg-row">
            <div class="col-lg-6">
                <div class="help-content">
                    <div class="section-header">
                        <h2 class="title wow fadeInUp" data-wow-delay=".5s">Vision and Mission</h2>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane show fade active" id="investor">
                            <div class="faq-wrapper">
                                <div class="faq-item wow fadeInUp" data-wow-delay=".3s">
                                    <div class="faq-title">
                                        <h5 class="title">Vision</h5>
                                        <div class="arrow">
                                            <i class="fas fa-angle-up"></i>
                                        </div>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            To be one of the leading network market entity in Namibia and spill over beyond our borders.
                                        </p>
                                    </div>
                                </div>
                                <div class="faq-item open active wow fadeInUp" data-wow-delay=".4s">
                                    <div class="faq-title">
                                        <h5 class="title">Mission</h5>
                                        <div class="arrow">
                                            <i class="fas fa-angle-up"></i>
                                        </div>
                                    </div>
                                    <div class="faq-content">
                                        <p>
                                            At KMJ, we value our customers and strive to always provide our customers with excellent customer service through innovative technology. KMJ ensures all our clients are each given opportunities while promoting teamwork and creating creative thinking among the networkers.
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
                    <img src="./assets/website/images/help/thumb.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Help Section Ends Here -->


<!-- Testimonial Two Section Starts Here -->
<!-- <section class="testimonial-section-two padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="section-header text-center">
                    <span class="subtitle  fadeInUp">client feedback</span>
                    <h2 class="title  mx-100">Happy Client What Say About Us</h2>
                    <p class=" fadeInUp" data--delay=".6s">
                        Pipsum dolor sit amet consectetur adipisicing elit. Aliquam modi explicabo nam ex unde et dolorum non dolor! Dolorum nobis
                    </p>
                </div>
            </div>
        </div>
        <div class="testimonial-slider-two">
            <div class="single-slider">
                <div class="testimonial-item-two">
                    <div class="testimonial-thumb-two">
                        <img src="./assets/website/images/testimonial/item2.png" alt="">
                    </div>
                    <div class="testimonial-content-two">
                        <div class="quote-icon">
                            <i class="las la-quote-left"></i>
                        </div>
                        <h4 class="name">Robindronat</h4>
                        <span class="designation">Hyip Investor</span>
                        <p>Placerat pellentesque eros elit lobortis eleifend amet vivamus integer sed tellus quibusdam mauris. Leo cras molestie.</p>
                    </div>
                </div>
            </div>
            <div class="single-slider">
                <div class="testimonial-item-two">
                    <div class="testimonial-thumb-two">
                        <img src="./assets/website/images/testimonial/item4.png" alt="">
                    </div>
                    <div class="testimonial-content-two">
                        <div class="quote-icon">
                            <i class="las la-quote-left"></i>
                        </div>
                        <h4 class="name">Robindronat</h4>
                        <span class="designation">Hyip Investor</span>
                        <p>Placerat pellentesque eros elit lobortis eleifend amet vivamus integer sed tellus quibusdam mauris. Leo cras molestie.</p>
                    </div>
                </div>
            </div>
            <div class="single-slider">
                <div class="testimonial-item-two">
                    <div class="testimonial-thumb-two">
                        <img src="./assets/website/images/testimonial/item3.png" alt="">
                    </div>
                    <div class="testimonial-content-two">
                        <div class="quote-icon">
                            <i class="las la-quote-left"></i>
                        </div>
                        <h4 class="name">Robindronat</h4>
                        <span class="designation">Hyip Investor</span>
                        <p>Placerat pellentesque eros elit lobortis eleifend amet vivamus integer sed tellus quibusdam mauris. Leo cras molestie.</p>
                    </div>
                </div>
            </div>
            <div class="single-slider">
                <div class="testimonial-item-two">
                    <div class="testimonial-thumb-two">
                        <img src="./assets/website/images/testimonial/item4.png" alt="">
                    </div>
                    <div class="testimonial-content-two">
                        <div class="quote-icon">
                            <i class="las la-quote-left"></i>
                        </div>
                        <h4 class="name">Robindronat</h4>
                        <span class="designation">Hyip Investor</span>
                        <p>Placerat pellentesque eros elit lobortis eleifend amet vivamus integer sed tellus quibusdam mauris. Leo cras molestie.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!-- Testimonial Two Section Ends Here -->

@include('website.partials.footer')