// const { error } = require("jquery");

$('.partner-home-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    nav: true,
    dots: false,
    navText: [
        // "<div class='nav-btn prev-slide'><i class='fal fa-chevron-left'></i></div>",
        "<div class='nav-btn prev-slide'><img src='themes/main/images/main/left.png' alt='left'></" +
        "div>",
        "<div class='nav-btn prev-slide'><img src='themes/main/images/main/right.png' alt='right'><" +
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

var swiperRelatedSlide = new Swiper(".related-slide", {
    autoplay: true,
    slidesPerView: 2,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        "480": {
            slidesPerView: 2,
        },
        "768": {
            slidesPerView: 3,
        },
        "1080": {
            slidesPerView: 4.5,
        },
    },
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
            $('.js-example-disabled-results').select2();
        }
    },
    addSelect2toCarFilterProvinces: function () {
        if ($('.provinces-select2').length > 0) {
            $('.provinces-select2').select2({ minimumResultsForSearch: Infinity });
        }
    },
    RangeFilterBranddetail: function () {
        if (document.getElementById('myRange')) {
            var slideWidth = document.getElementById('myRange').value * 100 / 20000000000;
            $(".slider-range__line").css("width", "calc(" + slideWidth + "% - " + slideWidth / 7.5 + "px)");
            $(".slider-range__button").css("left", slideWidth + "%");
        }
        $(document).on('input change', '#myRange', function () {
            $('.filter-value').html($(this).val());
            var slideWidth = $(this).val() * 100 / 20000000000;
            $(".slider-range__line").css("width", "calc(" + slideWidth + "% - " + slideWidth / 7.5 + "px)");
            $(".slider-range__button").css("left", slideWidth + "%");
        });
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
    scrollNewsHomepage: () => {
        if ($('#hours .logo-frame').length > 0) {
            var numOfHours = $('#hours .logo-frame').length
            if (numOfHours != null) {
                for (i = 1; i <= numOfHours; i++) {
                    var cellHeight = $('#cells').children('.flag-' + i).outerHeight()
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
            }
        })

        // dynamically bind 'closing' event
        zeynep.on('closing', function () {
            is_enable_menu = false
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
    },
    handleToggleLoading: function (enable = true) {
        const loading = $('.js-loading')
        if (!loading) return

        enable ? loading.removeClass('d-none') : loading.addClass('d-none')
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
            url: `ajax/get-new-posts?page=${globalConfig.pageNews}&category=${globalConfig.categoryId}`,
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
            globalConfig = {
                ...globalConfig,
                categoryId: $('#posts-load-more').data('category')
            }
            $(document).on('click', '#posts-load-more', function () {
                if (globalConfig.disableLoadMoreNews) return
                if ($('.loading').length > 0) {
                    $('.loading').removeClass('d-none').addClass('d-flex')
                }
                Ajax.postData();
            })
        }
    },
    handleLoadCarOption: () => {
        const result = $('.step-first')
        if (!result) return

        $(document).on('click', '.car-version__item-link', async function (e) {
            e.preventDefault()

            const option_car = $('.option__car')
            if (!option_car) return

            const carID = $(this).data('car_id')
            option_car.empty()

            Helper.handleToggleLoading()
            const response = await $.get(window.__urlAjax, {
                car_id: carID
            })
            Helper.handleToggleLoading(false)

            const { template } = response.data

            result.html(template)
        })
    }
}

$(document).ready(function () {
    // duyệt tất cả tấm ảnh cần lazy-load
    const lazyImages = document.querySelectorAll('[lazy]');

    // chờ các tấm ảnh này xuất hiện trên màn hình
    const lazyImageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            // tấm ảnh này đã xuất hiện trên màn hình
            if (entry.isIntersecting) {
                const lazyImage = entry.target;
                const src = lazyImage.dataset.src;

                lazyImage.tagName.toLowerCase() === 'img'
                    // <img>: copy data-src sang src
                    ? lazyImage.src = src

                    // <div>: copy data-src sang background-image
                    : lazyImage.style.backgroundImage = "url(\'" + src + "\')";

                // copy xong rồi thì bỏ attribute lazy đi
                lazyImage.removeAttribute('lazy');

                // job done, không cần observe nó nữa
                observer.unobserve(lazyImage);
            }
        });
    });

    // Observe từng tấm ảnh và chờ nó xuất hiện trên màn hình
    lazyImages.forEach((lazyImage) => {
        lazyImageObserver.observe(lazyImage);
    });

    Ajax.postLoadMore();
    AOS.init();
    Helper.addSelect2toNewsFilter();
    Helper.transitionHeaderFixed();
    Helper.addSelect2toCarFilterProvinces();
    Helper.RangeFilterBranddetail();
    Helper.scrollNewsHomepage();
    Helper.zeynepInit();
    Ajax.handleLoadCarOption();
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

// Slide
var SlideSwiper = {
    slideColorCar: function () {
        var swiper = new Swiper(".mySwiperColorThumb", {
            spaceBetween: 10,
            // slidesPerView: $('.mySwiperColorThumb .swiper-slide').length,
            slidesPerView: "auto",
            freeMode: true,
            watchSlidesProgress: true,
            thumbs: {
                swiper: swiper,
            },
        });
        var swiper2 = new Swiper(".mySwiperColor", {
            spaceBetween: 10,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            thumbs: {
                swiper: swiper,
            },
        });
    }
}
//search
// Select 2
var select2 = {
    pageBrand: function () {
        if ($('.country.selectjs').length) {
            $('.country.selectjs').select2();
        }
        if ($('.showroom.selectjs').length) {
            $('.showroom.selectjs').select2({
                width: 'resolve' // need to override the changed default
            });
        }
    }
}
//
$(document).ready(function () {
    if ($('a[href="#search"]').length) {
        $('a[href="#search"]').click(function () {
            event.preventDefault()
            $("#search-box").toggleClass("-open");
            setTimeout(function () {
                inputSearch.focus();
            }, 800);
        });

        $('a[href="#close"]').click(function () {
            event.preventDefault()
            $("#search-box").removeClass("-open");
        });

        $(document).keyup(function (e) {
            if (e.keyCode == 27) { // escape key maps to keycode `27`
                $("#search-box").removeClass("-open");
            }
        });
    }

    // if ($('.form-search').length) {
    //     $('input[name=cate]').change(function () {
    //         if ($(this).val().length !== 0) {
    //             filter_data($(this).val());
    //         }
    //     });

    //     $('.trigger').trigger('change');
    // }

    // function filter_data($value) {
    //     // $('.filter_data').html('<div id="loading"></div>');
    //     let cate = $value;
    //     $.ajax({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         url: '/api/search',
    //         type: 'get',
    //         data: { cate: cate },
    //         success: function (data) {
    //             $('.section-content').html(data)
    //         }
    //     });
    // }
});

$(document).ready(function () {
    if (window.URL_SEARCH) {
        let input_id = 0;
        $(".search-bar").focus(function () {
            input_id = $(this).attr('input-id');

            $(`.form-search .box-popover-${input_id}`).css('display', 'block');

            $(this).on('keyup', function () {
                var query = $(this).val();
                $.ajax({

                    url: window.URL_SEARCH,

                    type: "GET",

                    data: { 'keyword': query },

                    success: function (data) {
                        $(`.form-search .box-popover-${input_id}`).html(data)
                    }
                })
                // end of ajax call
            });
        })

        $(`.search-bar`).focusout(function () {
            setTimeout(() => {
                $(`.box-popover-${input_id}`).css('display', 'none');
            }, 500);
        })
    }
    /**
     * Import Slide
     */
    SlideSwiper.slideColorCar();
    /**
     * Import Select
     */
    select2.pageBrand();
})