$('.partner-home-carousel').owlCarousel({
    loop: true,
    autoplay: false,
    nav: true,
    navText: [
        // "<div class='nav-btn prev-slide'><i class='fal fa-chevron-left'></i></div>",
        "<div class='nav-btn prev-slide'><img src='themes/main/images/main/left.png'></" +
                "div>",
        "<div class='nav-btn prev-slide'><img src='themes/main/images/main/right.png'><" +
                "/div>"
    ],
    responsive: {
        576: {
            items: 2
        },
        768: {
            items: 3
        },
        1081: {
            items: 4
        },
        1680: {
            items: 5
        }
    }
});

$('.post-relate-carousel').owlCarousel({
    smartSpeed: 1000,
    loop: true,
    autoplay: false,
    dots: false,
    margin: 50,
    nav: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 3
        }
    }
});
$('#cells').on('scroll', function () {
    $('#hours').scrollTop($(this).scrollTop());
});
$('#hours').on('scroll', function () {
    $('#cells').scrollTop($(this).scrollTop());
});

var galleryTop = new Swiper('.distribution-slide-left', {
    centeredSlides: true,
    loop: true,
    loopedSlides: 4
});
var galleryThumbs = new Swiper('.distribution-slide-right', {
    centeredSlides: true,
    slidesPerView: 3,
    direction: "vertical",
    touchRatio: 0.2,
    slideToClickedSlide: true,
    loop: true,
    loopedSlides: 4,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    }
});
galleryTop.controller.control = galleryThumbs;
galleryThumbs.controller.control = galleryTop;

var swiperProductIntro = new Swiper(".product-intro__swiper", {
    navigation: {
        nextEl: ".product-intro__swiper--next",
        prevEl: ".product-intro__swiper--prev",
    },
    pagination: {
      el: ".product-intro__swiper--pagination",
    },
});

var swiperDetailSlide = new Swiper(".detail-slide", {
    pagination: {
        el: ".swiper-pagination",
        clickable: true
    }
});

var swiperVideo = new Swiper(".video-introduce", {
    pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true
    }
});

$('.item-shareholder').click(function () {
    $(this)
        .find('.desc-none')
        .toggle();
    $(this)
        .find('.down-hide')
        .toggle();
    $(this)
        .find('.up-show')
        .toggle();
});

$(window).scroll(function () {
    if ($(".section-agent-system").length > 0) {
        var a = 0;
        var oTop = $('.section-agent-system')
            .offset()
            .top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.agent-system__showroom__number').each(function () {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({countNum: $this.text()}).animate({
                    countNum: countTo
                }, {

                    duration: 1600,
                    easing: 'swing',
                    step: function () {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function () {
                        $this.text(this.countNum);
                        //alert('finished');
                    }

                });
            });
            a = 1;
        } else if ($(window).scrollTop() <= oTop) {
            $('.agent-system__showroom__number').each(function () {
                $(this).text(0);
            });
            a = 0;
        }
    }
});

$('.slider-for').slick(
    {slidesToShow: 1, slidesToScroll: 1, arrows: false, fade: true, asNavFor: '.slider-nav'}
);
$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    vertical: true,
    asNavFor: '.slider-for',
    dots: false,
    focusOnSelect: true,
    verticalSwiping: true,
    responsive: [
        {
            breakpoint: 992,
            settings: {
                vertical: false
            }
        }, {
            breakpoint: 768,
            settings: {
                vertical: false
            }
        }, {
            breakpoint: 580,
            settings: {
                vertical: false,
                slidesToShow: 3
            }
        }, {
            breakpoint: 380,
            settings: {
                vertical: false,
                slidesToShow: 2
            }
        }
    ]
});

var swiper = new Swiper(".researchDevSwiper", {
    slidesPerView: 2,
    spaceBetween: 40,
    scrollbar: {
        el: ".swiper-scrollbar"
    },
    breakpoints: {
        "@0.00": {
          spaceBetween: 10,
        },
        "@0.75": {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        "@1.00": {
          slidesPerView: 3,
          spaceBetween: 30,
        },
      },
});

var Helper = {
    addSelect2toNewsFilter: function(){
      if($('.js-example-disabled-results').length > 0){
        $('.js-example-disabled-results').select2({minimumResultsForSearch: Infinity});
      }
    },
    addSelect2toCarFilterProvinces: function(){
        if($('.provinces-select2').length > 0){
          $('.provinces-select2').select2({minimumResultsForSearch: Infinity});
        }
    },
    RangeFilterBranddetail: function(){
        var range = $("#myRange").attr("value");
        $(".filter-value").html(range);
        $(document).on('input change', '#myRange', function() {
            $('.filter-value').html( $(this).val() );
            var slideWidth = $(this).val() * 100 / 20000000000;
            $(".slider-range__line").css("width", "calc(" + slideWidth + "% - " + slideWidth/7.5 + "px)");
            $(".slider-range__button").css("left", slideWidth + "%");
        });
    },
    changeColorHeader: function () {
        var url = window.location.href;
        var originUrl = window.location.origin;
        var enUrl = window.location.origin + '/en';
        var viUrl = window.location.origin + '/vi';
        var defaultUrl = window.location.origin + '/';

        if (url == originUrl || url == enUrl || url == viUrl || url == defaultUrl) {
            $('.header').css('background', 'rgba(0 ,0 , 0 , 0.5)')
        }
    },
    transitionHeaderFixed: function () {
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();

            //>=, not <=
            if (scroll >= 80) {
                //clearHeader, not clearheader - caps H
                $(".header").addClass("header-fixed");
                $('.header-fixed').css('opacity', '1');
            }
            if (scroll < 80) {
                //clearHeader, not clearheader - caps H
                $(".header").removeClass("header-fixed");
            }
        }); //missing );
    },
    dropdownCarVersions: function () {
        if($('#car-version-select').length>0){
            $('#car-version-select').on('click',function(){
                $(this).toggleClass('active')
                if($(this).hasClass('active')) {
                    $(this).parent().parent().find('#car-version-list').css({
                        'height': 'auto',
                        'transition': "0.2s",
                    })
                }
                else {
                    $(this).parent().parent().find('#car-version-list').css({
                        'height': '0',
                        'transition': "0.2s",
                        })
                    }
            });
        }
    }
};

$(document).ready(function () {
    AOS.init();
    Helper.addSelect2toNewsFilter();
    Helper.transitionHeaderFixed();
    //Helper.changeColorHeader();
    Helper.addSelect2toCarFilterProvinces();
    Helper.RangeFilterBranddetail();
    Helper.dropdownCarVersions();
});

$(document).ready(function(){
    var docEl = $(document),
        headerEl = $('header'),
        headerWrapEl = $('.wrapHead'),
        navEl = $('nav'),
        linkScroll = $('.click_scroll');
    
    linkScroll.click(function(e){
        $top = $(this.hash).offset().top - 100;
        e.preventDefault(); 
        $('body, html').animate({
            scrollTop: $top
        }, 500);
    });
});

// counter
if($('.counter-value').length > 0){
    var a = 0;
    $(window).scroll(function() {
      var oTop = $('.counter').offset().top - window.innerHeight;
      if (a == 0 && $(window).scrollTop() > oTop) {
        $('.counter-value').each(function() {
          var $this = $(this),
            countTo = $this.attr('data-count');
          $({
            countNum: $this.text()
          }).animate({
              countNum: countTo
            },
    
            {
    
              duration: 2000,
              easing: 'swing',
              step: function() {
                $this.text(Math.floor(this.countNum));
              },
              complete: function() {
                $this.text(this.countNum);
              }
    
            });
        });
        a = 1;
      }
    
    });
}

const button = document.querySelector(".btn-join");
const modal = document.querySelector(".overlay");
const close = document.querySelector(".btn-white");
button.addEventListener("click",function(){
  modal.classList.toggle("active");
})
close.addEventListener("click",function(){
  modal.classList.toggle("active");
})

document.body.addEventListener("click",function(e){
  if(e.target.classList[0]=="overlay") {
    modal.style.display="none" 
  }
})