<div class="business-overview overflow-x-hidden">
    @includeIf("theme.main::views.pages.business.section.product-intro")
    <div class="distribution">
        <div class="provincial-company">
            <div class="container-remake">
                <h1 data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000" class="title font60 font-pri-bold fontmb-large">{{ __("Công ty tỉnh thành") }}</h1>
                <div data-aos="fade-left" data-aos-duration="1500" class="description desktop font20 mt-20">{!! $page->content !!}</div>
                <div data-aos="zoom-in-up" data-aos-duration="2000" class="select-list mt-40 mb-40">
                    <form action="" id="distribution-system-form">
                        @csrf
                        <select class="ui search selection dropdown city w-100" name="city_id" id="city_id">
                            <option value="">{{ __("Tỉnh/Thành phố") }}</option>
                            @foreach (get_cities() as $key => $item)
                                <option value="{{ $key }}" {{ !empty($_GET['city']) && $_GET['city'] == $key ? 'selected' : '' }}>{{ $item }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="font20 fontmb-small">{{ __("Approval") }}</button>
                    </form>
                </div>
                <div data-aos="zoom-in" data-aos-duration="2500" class="branch-wrap">
                    <img loading="lazy" class="branch-background-image" src="{{Theme::asset()->url('images/distribution/background.jpg')}}"
                        alt="Background">
                    <div class="branch-background-blur"></div>
                    <div class="left">
                        <div class="branch-overflow" id="branch-list"></div>
                        <div class="center pt-3 loading d-none w-100 h-100">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin: auto; background: none; display: block; shape-rendering: auto;" width="48px" height="48px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                                <circle cx="50" cy="50" r="44" stroke-width="7" stroke="#01498b" stroke-dasharray="69.11503837897544 69.11503837897544" fill="none" stroke-linecap="round">
                                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="0.5952380952380952s" keyTimes="0;1" values="0 50 50;360 50 50"></animateTransform>
                                </circle>
                            </svg>
                        </div>
                    </div>
                    <div class="right">
                        <div class="w-100 h-100" id="map"></div>
                    </div>
                </div>
                <div data-aos="fade-left" data-aos-duration="1500" class="description mobile font20">{!! $page->content !!}</div>
            </div>
        </div>
    </div>
</div>

<script>
    window.__distribution = {
        ajax: "{{ Language::getLocalizedURL(Language::getCurrentLocale(), route('public.ajax.distribution-system')) }}",
        readmore: "{!! __('Readmore') !!}"
    }
</script>
<style>
    #map {
        background: transparent
    }
    .leaflet-top, .leaflet-bottom {
        display: none !important
    }
</style>
<script>
    $('.ui.dropdown.city').dropdown({
        ignoreDiacritics: true,
        fullTextSearch:'exact',
    });
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: false,
        items: 2.5,
        margin: 25,
        dots: false,
        nav : false,
        responsiveClass: true,
        responsive:{
            0:{
                items: 1.3,
            },
            1081:{
                items:2.5,
            }
        }
    });
    // Go to the next item
    $('.customNextBtn').click(function() {
        owl.trigger('next.owl.carousel');
    });
    // Go to the previous item
    $('.customPrevBtn').click(function() {
        owl.trigger('prev.owl.carousel', [300]);
    });
</script>