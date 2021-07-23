$('.partner-home-carousel').owlCarousel({
    smartSpeed: 1000,
    loop: true,
    autoplay: false,
    dots: false,
    margin : 20,
    stagePadding: 150,
    Horizontal: true,
    nav: true,

    navText: [
        "<div class='nav-btn prev-slide'><i class='fas fa-chevron-left'></i></div>",
        "<div class='nav-btn next-slide'><i class='fas fa-chevron-right'></i></div>",
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

$('.item-shareholder').click(function(){
    $(this).find('.desc-none').toggle();
    $(this).find('.down-hide').toggle();
    $(this).find('.up-show').toggle();
});



$(".js-example-disabled-results").select2({
    minimumResultsForSearch: Infinity,
});
$('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    vertical:true,
    asNavFor: '.slider-for',
    dots: false,
    focusOnSelect: true,
    verticalSwiping:true,
    responsive: [
    {
        breakpoint: 992,
        settings: {
          vertical: false,
        }
    },
    {
      breakpoint: 768,
      settings: {
        vertical: false,
      }
    },
    {
      breakpoint: 580,
      settings: {
        vertical: false,
        slidesToShow: 3,
      }
    },
    {
      breakpoint: 380,
      settings: {
        vertical: false,
        slidesToShow: 2,
      }
    }
    ]
});