$('.partner-home-carousel').owlCarousel({
    smartSpeed: 1000,
    loop: true,
    autoplay: false,
    dots: false,
    margin: 20,
    stagePadding: 150,
    Horizontal: true,
    nav: true,

    navText: [
        // "<div class='nav-btn prev-slide'><i class='fal fa-chevron-left'></i></div>",
        "<div class='nav-btn prev-slide'><img src='themes/main/images/main/left.png'></" +
                "div>",
        "<div class='nav-btn prev-slide'><img src='themes/main/images/main/right.png'><" +
                "/div>"
    ],
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 3
        },
        1000: {
            items: 4
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

var swiper = new Swiper(".product-intro__swiper", {
    navigation: {
        nextEl: ".product-intro__swiper--next",
        prevEl: ".product-intro__swiper--prev",
    },
    pagination: {
      el: ".product-intro__swiper--pagination",
    },
});

var swiper = new Swiper(".detail-slide", {
    pagination: {
        el: ".swiper-pagination",
        clickable: true
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
    }
};

$(document).ready(function () {
    AOS.init();
    Helper.addSelect2toNewsFilter();
    Helper.transitionHeaderFixed();
    Helper.changeColorHeader();
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

    var swiper = new Swiper(".video-introduce", {
        pagination: {
          el: ".swiper-pagination",
          dynamicBullets: true,
        },
    });
});