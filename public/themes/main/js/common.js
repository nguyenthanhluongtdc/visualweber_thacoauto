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

$('.gallery-olw').owlCarousel({

    dots: false,
    margin: 50,
    nav: false,
    responsive: {
        // 0: {
        //     items: 1
        // },
        1680: {
            items: 3
        }
    }
});


var SlideSwiper = {
    slideColorCar: function() {
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

var swiperHotnews = new Swiper('.swiper-hotnews', {
    slidesPerView: 3,
    direction: "vertical",
    breakpoints: {
        "480": {
            slidesPerView: 3,
        },
        "768": {
            slidesPerView: 4,
        },
    },
});
var swiperHotnewsTitle = new Swiper('.swiper-hotnews-title', {
    slidesPerView: 3,
    direction: "vertical",
    scrollbar: {
        el: ".swiper-scrollbar",
        draggable: true,
        // scrollHiden: false
    },
    breakpoints: {
        "480": {
            slidesPerView: 3,
        },
        "768": {
            slidesPerView: 4,
        },
    },
});

swiperHotnewsTitle.controller.control = swiperHotnews;
swiperHotnews.controller.control = swiperHotnewsTitle;

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
    autoplay: {
        delay: 3000,
        disableOnInteraction: false,
    },
    slidesPerView: 2,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        "0": {
            navigation: {
                nextEl: "",
                prevEl: "",
            },
            slidesPerView: 1.85,
        },
        "576": {
            slidesPerView: 2.5,
        },
        "992": {
            slidesPerView: 3.5,
        },
        "1080": {
            navigation: false,
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

// $('.item-shareholder').click(function() {
//     $(this)
//         .find('.desc-none')
//         .toggle();
//     $(this)
//         .find('.down-hide')
//         .toggle();
//     $(this)
//         .find('.up-show')
//         .toggle();
// });

$(window).scroll(function() {
    if ($(".section-agent-system").length > 0) {
        var a = 0;
        var oTop = $('.section-agent-system')
            .offset()
            .top - window.innerHeight;
        if (a == 0 && $(window).scrollTop() > oTop) {
            $('.agent-system__showroom__number').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');
                $({ countNum: $this.text() }).animate({
                    countNum: countTo
                }, {

                    duration: 1600,
                    easing: 'swing',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                        //alert('finished');
                    }

                });
            });
            a = 1;
        } else if ($(window).scrollTop() <= oTop) {
            $('.agent-system__showroom__number').each(function() {
                $(this).text(0);
            });
            a = 0;
        }
    }
});

$('.slider-for').slick({ slidesToShow: 1, slidesToScroll: 1, arrows: false, fade: true, asNavFor: '.slider-nav' });
$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    vertical: true,
    asNavFor: '.slider-for',
    dots: false,
    focusOnSelect: true,
    verticalSwiping: true,
    responsive: [{
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
    }]
});

var swiper = new Swiper(".researchDevSwiper", {
    slidesPerView: 3,
    spaceBetween: 40,
    loop: true,
    centeredSlides: true,
    scrollbar: {
        el: ".swiper-scrollbar"
    },
    // breakpoints: {
    //     "@0.00": {
    //         spaceBetween: 10,
    //     },
    //     // "@0.75": {
    //     //     slidesPerView: 2,
    //     //     spaceBetween: 20,
    //     // },
    //     // "@1.00": {
    //     //     slidesPerView: 3,
    //     //     spaceBetween: 30,
    //     // },
    // },
});

$('.top-right-item').mouseover(function() {
    // alert(123);
    $('div').siblings('.top-right-item.item-1').addClass('active');
    $('div').siblings('.top-right-item.item-2').addClass('active');
    $('div').siblings('.top-right-item.item-3').addClass('active');
    $('div').siblings('.top-right-item.item-4').addClass('active');



}).mouseout(function() {
    $('div').siblings('.top-right-item.item-1').removeClass('active');
    $('div').siblings('.top-right-item.item-2').removeClass('active');
    $('div').siblings('.top-right-item.item-3').removeClass('active');
    $('div').siblings('.top-right-item.item-4').removeClass('active');
});

var Helper = {
    addSelect2toNewsFilter: function() {
        if ($('.js-example-disabled-results').length > 0) {
            $('.js-example-disabled-results').select2();
        }
    },
    addSelect2toCarFilterProvinces: function() {
        if ($('.provinces-select2').length > 0) {
            $('.provinces-select2').select2({ minimumResultsForSearch: Infinity });
        }
    },
    RangeFilterBranddetail: function() {
        if (document.getElementById('myRange')) {
            var slideWidth = document.getElementById('myRange').value * 100 / 20000000000;
            $(".slider-range__line").css("width", "calc(" + slideWidth + "% - " + slideWidth / 7.5 + "px)");
            $(".slider-range__button").css("left", slideWidth + "%");
        }
        $(document).on('input change', '#myRange', function() {
            $('.filter-value').html($(this).val());
            var slideWidth = $(this).val() * 100 / 20000000000;
            $(".slider-range__line").css("width", "calc(" + slideWidth + "% - " + slideWidth / 7.5 + "px)");
            $(".slider-range__button").css("left", slideWidth + "%");
        });
    },
    transitionHeaderFixed: function() {
        $(window).scroll(function() {
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
    matchHeight: function () {
        $('.match')
          .matchHeight({})
        ;
      },
    zeynepInit: function() {
        let is_enable_menu = false
        const zeynep = $('.zeynep').zeynep({
            opened: function() {
                is_enable_menu = true
            }
        })

        // dynamically bind 'closing' event
        zeynep.on('closing', function() {
            is_enable_menu = false
        })

        $('.zeynep-overlay').on('click', function(e) {
            zeynep.close()
            $("#top-nav").prop("checked", false);
        })

        // open zeynepjs side menu
        $('.zeynep-open').on('click', function(e) {
            if (is_enable_menu) {
                $("#top-nav").prop("checked", false);
                zeynep.close()
            } else {
                $("#top-nav").prop("checked", true);
                zeynep.open()
            }
        })
    },
    handleToggleLoading: function(enable = true) {
        const loading = $('.js-loading')
        if (!loading) return

        enable ? loading.removeClass('d-none') : loading.addClass('d-none')
    },
    resetTotalLoan: function() {
        $('#total-loan-per-month').html("")
        $('#total-month').html("")
        $('#total-bank').html("")
        $('#total-loan').html("")
    },
    hoverChangeImage: function() {
        if ($('.hover-image-homepage').length) {
            $('.hover-image-homepage').hover(function() {
                $(this).children('.blue').removeClass('invisible-height-0')
                $(this).children('.black').addClass('invisible-height-0')
                    // $(this).children('.symbol').children('blue').removeClass('invisible-height-0 ')
                    // $(this).children('.symbol').children('black').addClass('invisible-height-0 ')
            }, function() {
                $(this).children('.black').removeClass('invisible-height-0')
                $(this).children('.blue').addClass('invisible-height-0')
                    // $(this).children('.symbol').children('black').removeClass('invisible-height-0 ')
                    // $(this).children('.symbol').children('blue').addClass('invisible-height-0 ')
            })
        }
    }
};

let globalConfig = {
    pageNews: 2,
    disableLoadMoreNews: false
}

const resultBank = $('#installment-modal')
let loanAmount = {
    bank: "",
    total: "",
    month: "",
    loanMoney: "",
    loanMoneyPerMonth: "",
    interestRate: "",
    interestRatePerMonth: "",
}


var Ajax = {
    postData: () => {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: `ajax/get-new-posts?page=${globalConfig.pageNews}&category=${globalConfig.categoryId}`,
            method: "GET",
            success: function({ data, disable }) {
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
            error: function(xhr, thrownError) {
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
            $(document).on('click', '#posts-load-more', function() {
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

        $(document).on('click', '.car-version__item-link', async function(e) {
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
            setTimeout(function() {
                SlideSwiper.slideColorCar();
            }, 500)
        })
    },
    getMonthsAcceptLoans: () => {

        if (!resultBank) return

        $(document).on('change', '#banks', function(e) {
            Helper.resetTotalLoan()
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: getMonthsAcceptLoans_url,
                data: {
                    bank: $(this).val()
                },
                method: "GET",
                dataType: "json",
                beforeSend: function() {
                    $('.loading').removeClass('d-none')
                    $('#loan-month-form').dropdown('clear');
                    $('#percent-loan-form').dropdown('clear');
                    $('#interest-rate-form').dropdown('clear');
                    if (!$('#percent-loan-form').hasClass('disabled')) {
                        $('#percent-loan-form').addClass('disabled')
                    }
                    if (!$('#interest-rate-form').hasClass('disabled')) {
                        $('#interest-rate-form').addClass('disabled')
                    }
                    loanAmount.bank = ""
                    loanAmount.month = 0
                },
                success: function(data) {
                    if ($('#loan-month-value').length) {
                        $('#loan-month-value').html(data.month)
                    }
                    $('#loan-month-form').removeClass('disabled')
                    loanAmount.bank = data.bank
                },
                error: function(xhr, thrownError) {
                    console.log(xhr.responseText);
                    console.log(thrownError)
                    $('.loading').addClass('d-none')
                },
                complete: function(xhr, status) {
                    $('.loading').addClass('d-none')
                }
            })
        })
    },
    getPercentLoans: () => {
        if (!resultBank) return
        Helper.resetTotalLoan()
        $(document).on('change', '#loan-month', function(e) {

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: getPercentLoans_url,
                data: {
                    loan_id: $(this).val(),
                    total: $('#money').val(),
                },
                method: "GET",
                dataType: "json",
                beforeSend: function() {
                    $('.loading').removeClass('d-none')
                    $('#percent-loan-form').dropdown('clear');
                    $('#interest-rate-form').dropdown('clear');
                    if (!$('#interest-rate-form').hasClass('disabled')) {
                        $('#interest-rate-form').addClass('disabled')
                    }
                    loanAmount.month = ""
                    loanAmount.interestRate = ""
                    loanAmount.total = ""
                    loanAmount.interestRatePerMonth = ""
                },
                success: function(data) {
                    if ($('#percent-loan-value').length) {
                        $('#percent-loan-value').html(data.percentLoan)
                    }
                    if ($('#interest-rate-value').length) {
                        $('#interest-rate-value').html(data.outputInterestRate)
                    }
                    // console.log(data.percentLoan);
                    // console.log(data.interestRate);
                    $('#percent-loan-form').removeClass('disabled')
                    loanAmount.total = $('#money').val()
                    loanAmount.month = data.month
                    loanAmount.interestRate = data.interestRate / 100
                    loanAmount.interestRatePerMonth = loanAmount.interestRate / loanAmount.month
                },
                error: function(xhr, thrownError) {
                    console.log(xhr.responseText);
                    console.log(thrownError)
                    $('.loading').addClass('d-none')
                },
                complete: function(xhr, status) {
                    $('.loading').addClass('d-none')
                }
            })
        })
    },
    onChangePercentLoan: () => {
        $(document).on('change', '#percent-loan', function(e) {
            $('#interest-rate-form').removeClass('disabled')
        })
    },
    getTotalLoan: () => {
        if (!resultBank) return
        $(document).on('change', '#interest-rate', function(e) {
            percent = $('#percent-loan').val()
            if (loanAmount.total != "") {
                loanAmount.loanMoney = loanAmount.total * percent / 100
                loanAmount.loanMoneyPerMonth = loanAmount.loanMoney / loanAmount.month
                var total = loanAmount.loanMoneyPerMonth + loanAmount.loanMoneyPerMonth * loanAmount.interestRatePerMonth
                $('#total-loan-per-month').html(total.toLocaleString("it-IT", { style: "currency", currency: "VND", minimumFractionDigits: 0 }))

            }
            if (loanAmount.month != "") {
                $('#total-month').html(loanAmount.month)

            }
            if (loanAmount.bank != "") {
                $('#total-bank').html(loanAmount.bank)

            }
            if (loanAmount.loanMoney != "") {
                var total = loanAmount.loanMoney + loanAmount.loanMoney * loanAmount.interestRate
                $('#total-loan').html(total.toLocaleString("it-IT", { style: "currency", currency: "VND", minimumFractionDigits: 0 }))
            } else {
                Helper.resetTotalLoan()
            }
        })
    },
    getShareholder: () => {
        const shareholderResult = $('.section-shareholder-home')
        if (!shareholderResult) return
        $(document).on('click', '.shareholder-link', function() {
            $(this).addClass('active').parent().siblings().children().removeClass('active')
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: getShareholderUrl,
                data: {
                    categoryId: $(this).data('category')
                },
                method: "GET",
                dataType: "json",
                beforeSend: function() {
                    $('.loading').removeClass('d-none')
                },
                success: function(data) {
                    if ($('.list-content').length) {
                        $('.list-content').html(data.shareholders)
                    }
                    if ($('.tab-content-left img').length) {
                        $('.tab-content-left').html(
                            '<img loading="lazy" src="' + data.image + '" alt="Icon">'
                        )
                    }
                },
                error: function(xhr, thrownError) {
                    console.log(xhr.responseText);
                    console.log(thrownError)
                    $('.loading').addClass('d-none')
                },
                complete: function(xhr, status) {
                    $('.loading').addClass('d-none')
                }
            })
        })
    },
}

$(document).ready(function() {
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
                    ?
                    lazyImage.src = src

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
    Helper.zeynepInit();
    Helper.matchHeight();
    Helper.hoverChangeImage();
    Ajax.handleLoadCarOption();
    Ajax.getMonthsAcceptLoans();
    Ajax.getPercentLoans();
    Ajax.onChangePercentLoan();
    Ajax.getTotalLoan();
    Ajax.getShareholder()
});

$(document).ready(function() {
    var docEl = $(document),
        headerEl = $('header'),
        headerWrapEl = $('.wrapHead'),
        navEl = $('nav'),
        linkScroll = $('.click_scroll');

    linkScroll.click(function(e) {
        $top = $(this.hash).offset().top - 100;
        e.preventDefault();
        $('body, html').animate({
            scrollTop: $top
        }, 500);
    });
    $(document).on('click', '#menu-footer', function() {
        $(this).parent().find('.list-link').toggleClass('active')
    })
});


// counter
if ($('.counter-value').length > 0) {
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


//search
// Select 2
var select2 = {
        pageBrand: function() {
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
$(document).ready(function() {
    if ($('a[href="#search"]').length) {
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

    if ($('.form-search').length && window.URL_FILER) {
        let uri_filter = window.URL_FILER;

        $('input[type="date"]').change(function() {
            filter_data(uri_filter)
        })

        $('input[name=category]').change(function() {
            filter_data(uri_filter)
        });
    }

    function filter_data(uri_filter) {
        // $('.filter_data').html('<div id="loading"></div>');
        var formdata = $(".form-search").serializeArray();
        var filter = {};
        $(formdata).each(function(index, obj) {
            filter[obj.name] = obj.value;
        });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: uri_filter,
            type: 'get',
            data: { filter: filter },
            success: function(data) {
                $('.result-main').html(data)
            }
        });
    }
});

$(document).ready(function() {
    if (window.URL_SEARCH) {
        let input_id = 0;
        $(".search-bar").focus(function() {
            input_id = $(this).attr('input-id');

            $(`.form-search .box-popover-${input_id}`).css('display', 'block');

            $(this).on('keyup', function() {
                var query = $(this).val();
                $.ajax({

                        url: window.URL_SEARCH,

                        type: "GET",

                        data: { 'keyword': query },

                        success: function(data) {
                            $(`.form-search .box-popover-${input_id}`).html(data)
                        }
                    })
                    // end of ajax call
            });
        })

        $(`.search-bar`).focusout(function() {
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