// const { error } = require("jquery");

$('.partner-home-carousel').owlCarousel({
    loop: true,
    autoplay: true,
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
        1081: {
            items: 3
        }
    }
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
    autoplay: true,
    pagination: {
        el: ".product-intro__swiper--pagination",
        clickable: true
    },
});

var swiperDetailSlide = new Swiper(".detail-slide", {
    autoplay: true,
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
                $({ countNum: $this.text() }).animate({
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
    { slidesToShow: 1, slidesToScroll: 1, arrows: false, fade: true, asNavFor: '.slider-nav' }
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
    addSelect2toNewsFilter: function () {
        if ($('.js-example-disabled-results').length > 0) {
            $('.js-example-disabled-results').select2({ minimumResultsForSearch: Infinity });
        }
    },
    addSelect2toCarFilterProvinces: function () {
        if ($('.provinces-select2').length > 0) {
            $('.provinces-select2').select2({ minimumResultsForSearch: Infinity });
        }
    },
    RangeFilterBranddetail: function () {
        var range = $("#myRange").attr("value");
        $(".filter-value").html(range);
        $(document).on('input change', '#myRange', function () {
            $('.filter-value').html($(this).val());
            var slideWidth = $(this).val() * 100 / 20000000000;
            $(".slider-range__line").css("width", "calc(" + slideWidth + "% - " + slideWidth / 7.5 + "px)");
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
        if ($('#car-version-select').length > 0) {
            $('#car-version-select').on('click', function () {
                $(this).toggleClass('active')
                if ($(this).hasClass('active')) {
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
    },
    scrollNewsHomepage: () => {
        if ($('#hours .logo-frame').length > 0) {
            var numOfHours = $('#hours .logo-frame').length
            if (numOfHours != null) {
                for (i = 1; i <= numOfHours; i++) {
                    var cellHeight = $('#cells').children('.flag-' + i).height()
                    $('#hours').children('.flag-' + i).height(cellHeight)
                }
            }

            $('#cells').on('scroll', function () {
                $('#hours').scrollTop($(this).scrollTop());
            });
            $('#hours').on('scroll', function () {
                $('#cells').scrollTop($(this).scrollTop());
            });
        }
    },
    zeynepInit: function () {
        let is_enable_menu = false
        const zeynep = $('.zeynep').zeynep({
            opened: function () {
                is_enable_menu = true
                console.log('the side menu is opened')
            }
        })

        // dynamically bind 'closing' event
        zeynep.on('closing', function () {
            is_enable_menu = false
            console.log('this event is dynamically binded')
        })

        $('.zeynep-overlay').on('click', function (e) {
            zeynep.close()
            $("#top-nav").prop("checked", false);
        })

        // open zeynepjs side menu
        $('.zeynep-open').on('click', function (e) {
            if (is_enable_menu) {
                $("#top-nav").prop("checked", false);
                zeynep.close()
            } else {
                $("#top-nav").prop("checked", true);
                zeynep.open()
            }
        })
    }
};

let globalConfig = {
    pageNews: 2,
    disableLoadMoreNews: false
}

var Ajax = {
    postData: () => {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `ajax/get-new-posts?page=${globalConfig.pageNews}`,
            method: "GET",
            success: function ({ data, disable }) {
                $('.loading').removeClass('d-flex').addClass('d-none')
                $('#new-posts').append(data);
                globalConfig = {
                    ...globalConfig,
                    pageNews: globalConfig.pageNews + 1,
                    disableLoadMoreNews: disable
                }

                if (disable) {
                    $('#posts-load-more').addClass('d-none')
                }
            },
            error: function (xhr, thrownError) {
                console.log(xhr.responseText);
                console.log(thrownError)
                $('.loading').removeClass('d-flex').addClass('d-none')
                $('#new-post').append('Không tìm thấy');
            }
        })
    },
    postLoadMore: () => {
        if ($('#posts-load-more').length > 0) {
            // if($('.loading').length>0){
            //     $('.loading').removeClass('d-none').addClass('d-flex')
            // }
            // Ajax.postData();
            $(document).on('click', '#posts-load-more', function () {
                if (globalConfig.disableLoadMoreNews) return
                if ($('.loading').length > 0) {
                    $('.loading').removeClass('d-none').addClass('d-flex')
                }
                Ajax.postData();
            })
        }
    },

}

$(document).ready(function () {
    Ajax.postLoadMore();
    AOS.init();
    Helper.addSelect2toNewsFilter();
    Helper.transitionHeaderFixed();
    //Helper.changeColorHeader();
    Helper.addSelect2toCarFilterProvinces();
    Helper.RangeFilterBranddetail();
    Helper.dropdownCarVersions();
    Helper.scrollNewsHomepage();
    Helper.zeynepInit();
});


$(document).ready(function () {
    var docEl = $(document),
        headerEl = $('header'),
        headerWrapEl = $('.wrapHead'),
        navEl = $('nav'),
        linkScroll = $('.click_scroll');

    linkScroll.click(function (e) {
        $top = $(this.hash).offset().top - 100;
        e.preventDefault();
        $('body, html').animate({
            scrollTop: $top
        }, 500);
    });
    $(document).on('click', '#menu-footer', function () {
        console.log($(this).parent().find('.list-link'));
        $(this).parent().find('.list-link').toggleClass('active')
    })
});



// counter
if ($('.counter-value').length > 0) {
    var a = 0;
    $(window).scroll(function () {
        var oTop = $('.counter').offset().top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.counter-value').each(function () {
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
                        step: function () {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function () {
                            $this.text(this.countNum);
                        }

                    });
            });
            a = 1;
        }

    });
}

//search

$(document).ready(function() {
    if($('a[href="#search"]').length) {
        $('a[href="#search"]').click(function() {
            event.preventDefault()
            $("#search-box").toggleClass("-open");
                setTimeout(function() {
                    inputSearch.focus();
                }, 800);
            });
    
            $('a[href="#close"]').click(function() {
                event.preventDefault()
                $("#search-box").removeClass("-open");
            });
    
            $(document).keyup(function(e) {
            if (e.keyCode == 27) { // escape key maps to keycode `27`
                $("#search-box").removeClass("-open");
            }
        });
    }
})