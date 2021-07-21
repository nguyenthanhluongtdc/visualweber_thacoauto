
const app = {
    initJs: function () {
        $('.slider-main-carousel').owlCarousel({
            smartSpeed: 1000,
            loop: false,
            autoplay: false,
            dots: true,
            nav: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });
    }
};