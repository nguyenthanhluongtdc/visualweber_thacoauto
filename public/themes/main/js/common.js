$('.partner-home-carousel').owlCarousel({
    smartSpeed: 1000,
    loop: true,
    autoplay: false,
    dots: false,
    margin : 20,
    stagePadding: 150,
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
    $('.desc-none').toggle();
    $('.down-hide').toggle();
    $('.up-show').toggle();
});