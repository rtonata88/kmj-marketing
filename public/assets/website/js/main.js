
'user strict';

// Preloader
$(window).on('load', function () {
  $('.loader-bg').fadeOut(1000);
  });

//Menu Dropdown
$("ul>li>.sub-menu").parent("li").addClass("has-sub-menu");

$('.menu li a').on('click', function (e) {
  var element = $(this).parent('li');
  if (element.hasClass('open')) {
    element.removeClass('open');
    element.find('li').removeClass('open');
    element.find('ul').slideUp(400, "swing");
  } else {
    element.addClass('open');
    element.children('ul').slideDown(400, "swing");
    element.siblings('li').children('ul').slideUp(400, "swing");
    element.siblings('li').removeClass('open');
    element.siblings('li').find('li').removeClass('open');
    element.siblings('li').find('ul').slideUp(400, "swing");
  }
});
$('.menu li .cmn--btn').on('click', function (e) {
  var ele = $(this).parent('li');
  ele.removeClass('open')
});


var overlay = $('.overlay');
overlay.on('click', function() {
  $('.search-box').removeClass('open');
  $('.overlay').removeClass('active');
  $('.dashboard-sidebar').removeClass('active');

});

    
// Responsive Menu
var headerTrigger = $('.header-trigger');
headerTrigger.on('click', function(){
    $('.menu,.header-trigger').toggleClass('active')
    $('.overlay').toggleClass('overlay-color')
    $('.overlay').removeClass('active')
});

var over = $('.overlay');
over.on('click', function() {
  $('.overlay').removeClass('overlay-color')
  $('.menu, .header-trigger').removeClass('active')
})


// Sticky Menu
window.addEventListener('scroll', function(){
  var header = document.querySelector('header');
  header.classList.toggle('sticky', window.scrollY > 0);

});
var prevScrollpos = window.pageYOffset;
var scrollPosition = window.scrollY;
if (scrollPosition >= 1) {
  $(".header").addClass('active');
}
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    $(".header-atop").addClass('active');
    $(".header-atop").removeClass('inActive');
  } else {
    $(".header-atop").removeClass('active');
    $(".headera-top").addClass('inActive');
  }
  prevScrollpos = currentScrollPos;
  if (currentScrollPos === 0) {
    $(".headera-top").removeClass('active');
  }
} ;

    
// WoW
new WOW().init();
var wow = new WOW({
  boxClass: 'wow',
  animateClass: 'animated',
  offset: 0,
  mobile: false,
  live: true
});

// Video Pop Up
$('.video-button').magnificPopup({
  type:'iframe',
});
$('.video').magnificPopup({
  type:'iframe',
});
$('.img-link').magnificPopup({
  type:'image',
  gallery: {
    enabled: true
}
});


// Nice Select
$('select').niceSelect();

// Scroll To Top 
var scrollTop = $(".scrollToTop");
$(window).on('scroll', function () {
  if ($(this).scrollTop() < 500) {
    scrollTop.removeClass("active");
  } else {
    scrollTop.addClass("active");
  }
});

//Click event to scroll to top
$('.scrollToTop').on('click', function () {
  $('html, body').animate({
    scrollTop: 0
  }, 300);
  return false;
});

$('.pagination li a').on('click', function() {
  $('.pagination li a').removeClass('active')
  $(this).addClass('active')
} )



$('.banner-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  swipe: true,
  swipeToSlide: true,
  touchMove: true,
  dots: false,
  arrows: true,
  nextArrow: '<i class="las la-angle-left arrow-left"></i>',
  prevArrow: '<i class="las la-angle-right arrow-right"></i> arrow-left',
  autoplay: true,
  autoplaySpeed: 5000,
  pauseOnHover: true, 
  fade: true,
  speed: 1000,
});
   

$('.sponsor-slider').slick({
  slidesToShow: 6,
  slidesToScroll: 2,
  infinite: true,
  dots: false,
  arrows: false,
  autoplay: true,
  autoplaySpeed: 3000,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },

  ]
});
$('.payment-gateway-slider').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  infinite: true,
  dots: false,
  arrows: true,
  autoplay: true,
  autoplaySpeed: 3000,
  margin: 20,
  arrows:true,
  nextArrow: '<i class="las la-angle-right arrow-left"></i>',
  prevArrow: '<i class="las la-angle-left arrow-right"></i>',
  responsive: [
    {
      breakpoint: 991,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 500,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },

  ]
});

$(".counter-item").each(function () {
  $(this).isInViewport(function (status) {
    if (status === "entered") {
      for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
        var el = document.querySelectorAll('.odometer')[i];
        el.innerHTML = el.getAttribute("data-odometer-final");
      }
    }
  });
});
   

$('.testimonial-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  arrows: true,
  dots: false,
  autoplay: true,
  pauseOnHover: true,
  centerMode: true,
  fade: true,
  asNavFor: '.testimonial-img-slider',
  nextArrow: '<i class="las la-arrow-right arrow-right"></i>',
  prevArrow: '<i class="las la-arrow-left arrow-left"></i> ',
});
$('.testimonial-img-slider').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  asNavFor: '.testimonial-slider',
  dots: true,
  centerMode: true,
  infinite: true,
  focusOnSelect: true,
  autoplay: true,
  pauseOnHover: true,
  arrows: false,
  fade: true,
  speed: 1000,
});

//Faq
$('.faq-wrapper .faq-title, .faq-wrapper-two .faq-title-two').on('click', function (e) {
  var element = $(this).parent('.faq-item, .faq-item-two');
  if (element.hasClass('open')) {
    element.removeClass('open');
    element.find('.faq-content, .faq-content-two').removeClass('open');
    element.find('.faq-content, .faq-content-two').slideUp(300, "swing");
  } else {
    element.addClass('open');
    element.children('.faq-content, .faq-content-two').slideDown(300, "swing");
    element.siblings('.faq-item, .faq-item-two').children('.faq-content, .faq-content-two').slideUp(300, "swing");
    element.siblings('.faq-item, .faq-item-two').removeClass('open');
    element.siblings('.faq-item, .faq-item-two').find('.faq-title, .faq-title-two').removeClass('open');
    element.siblings('.faq-item, .faq-item-two').find('.faq-content, .faq-content-two').slideUp(300, "swing");
  }
});

$('.faq-tab-menu .item').on('click' ,function() {
  $('.faq-tab-menu .item').removeClass('active')
  $(this).addClass('active')
});


$('.testimonial-slider-two').slick({
  slidesToShow: 3,
  slidesToScroll: 1,
  infinite: true,
  dots: false,
  arrows: false,
  autoplay: true,
  autoplaySpeed: 2000,
  margin: 20,
  centerMode:true,
  responsive: [
    {
      breakpoint: 1199,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    },
    

  ]
});

$( function() {
  $( "#btc-range" ).slider({
    range: "min",
    value: 6000,
    min: 1,
    max: 10000,
    slide: function( event, ui ) {
      $( "#btc-amount" ).val( ui.value + " BTC" );
    }
  });
  $( "#btc-amount" ).val( "BTC " +  $( "#btc-range" ).slider( "value" ) );
});

$('.privacy-policy-sidebar-menu li a').on('click' ,function() {
  $('.privacy-policy-sidebar-menu li a').removeClass('active')
  $(this).addClass('active')
});

$('.user-toggler').on('click', function () {
  $('.dashboard-sidebar').toggleClass('active')
  $('.overlay').toggleClass('overlay-color')
});
$('.close-dashboard').on('click', function () {
  $('.dashboard-sidebar').removeClass('active')
  $('.overlay').removeClass('overlay-color')
});