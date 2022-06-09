@include('website.partials.header')
<!-- Banner Section Starts Here -->
<section class="inner-banner bg_img overflow-initial" style="background: url(./assets/website/images/contact/bg.png) no-repeat center bottom;">
    <div class="container">
        <div class="inner-banner-wrapper d-flex contact">
            <div class="inner-banner-content contact-banner">
                <h2 class="inner-banner-title">get in touch <br>
                    with us</h2>
                <ul class="breadcums">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <span>Contact</span>
                    </li>
                </ul>
            </div>
            <div class="contact-wrapper  fadeInUp">
                <h4 class="title">Send Us a Message</h4>
                <form class="contact-form">
                    <div class="form--group">
                        <input type="text" class="form--control" placeholder="Name">
                    </div>
                    <div class="form--group">
                        <input type="email" class="form--control" placeholder="Email">
                    </div>
                    <div class="form--group">
                        <input type="tel" class="form--control" placeholder="Phone">
                    </div>

                    <div class="form--group">
                        <textarea class="form--control" cols="30" rows="10" placeholder="Message"></textarea>
                    </div>
                    <div class="form--group">
                        <button class="custom-button" type="submit">SUBMIT NOW</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="shape1 paroller" data-paroller-factor=".2">
        <img src="./assets/website/images/about/balls.png" alt="about">
    </div>
</section>
<!-- Banner Section Ends Here -->


<!-- Contact Info Section Starts Here -->
<section class="contact-info padding-top padding-bottom">
    <div class="container">
        <div class="row gy-5 flex-column-reverse flex-lg-row">
            <div class="col-lg-6 col-xl-7">
                <div class="row g-4 justify-content-center mb-4">
                    <div class="col-md-6 col-lg-10 col-xl-6  fadeInLeft">
                        <div class="contact-info-item">
                            <div class="contact-item-thumb">
                                <img src="./assets/website/images/contact/location.png" alt="contact">
                            </div>
                            <div class="contact-item-content">
                                <h4 class="title">Office Address</h4>
                                <p>ERF 1620, Elizabeth Street Khomasdal</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-10 col-xl-6  fadeInLeft">
                        <div class="contact-info-item">
                            <div class="contact-item-thumb">
                                <img src="./assets/website/images/contact/email.png" alt="contact">
                            </div>
                            <div class="contact-item-content">
                                <h4 class="title">Email Address</h4>
                                <a href="Mailto:info@kmjnetwork.net">info@kmjnetwork.net</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-10 col-xl-6  fadeInLeft">
                        <div class="contact-info-item">
                            <div class="contact-item-thumb">
                                <img src="./assets/website/images/contact/phone.png" alt="contact">
                            </div>
                            <div class="contact-item-content">
                                <h4 class="title">Contact Number</h4>
                                <p>
                                    +264 81 214 6522
                                </p>
                                <p>
                                    +264 81 327 0589
                                </p>
                                <p>
                                    +264 81 813 4571
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl-5  fadeInRight d-none d-lg-block">
                <div class="contact-info-thumb">
                    <img src="./assets/website/images/contact/thumb.png" alt="contact">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Info Section Ends Here -->

@include('website.partials.footer')