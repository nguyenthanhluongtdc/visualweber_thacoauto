<div class="distribution overflow-x-hidden">
    <div class="provincial-company">
        <div class="container-remake">
            <h1 data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000" class="title font60 fontmb-large">{{ __("Công ty tỉnh thành") }}</h1>
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
                    alt="Background công ty tỉnh thành">
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
            <div data-aos="fade-left" data-aos-duration="1500" class="description mobile font20 fontmb-small">{!! $page->content !!}</div>
        </div>
    </div>
    <div class="activity-news-desktop">
        <div class="container-remake">
            @php
                $posts = get_posts_by_category(theme_option('default_category_news'), 3);
            @endphp
            <h1 data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000" class="title font60 mb-20 fontmb-large">{{ __("tin tức hoạt động") }}</h1>
            <div class="activity-news-desktop__wrap">
                @foreach ( $posts as $post)
                    
               
                <div data-aos="fade-right" data-aos-duration="1500" class="activity-news-desktop__item">
                    <div class="img-container">
                        <div class="skewed">
                            <a href="{{$post->url}}">
                                <img loading="lazy" src="{{ Storage::disk('public')->exists($post->image) ? get_object_image($post->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="Tin tức">
                            </a>
                        </div>
                    </div>
                    <div class="news-body">
                        <a class="news-title font30" href="{{$post->url}}">{{$post->name}}</a>
                        <p class="news-description font18">{{Str::words($post->description,40)}}</p>
                        <div class="news-info">
                            <div class="news-info__item font15">
                                <p>{{ $post->city->name ?? '--' }}</p>
                            </div>
                            <div class="news-info__item font15">
                                <p>{{date_format($post->created_at,"d-m-Y")}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="activity-news-mobile font-pri">
        <div class="container-remake">
            <h2 data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000" class="title font60 mb-20 text-uppercase fontmb-large font-pri-bold">
                {{ __("tin tức hoạt động") }}
            </h2>
            @foreach ($posts as $post_mb)
            <div class="news-item">
                <div class="img-container">
                    <div class="skewed">
                        <a href="{{$post_mb->url}}">
                            <img loading="lazy" src="{{ Storage::disk('public')->exists($post_mb->image) ? get_object_image($post_mb->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="Tin tức">
                        </a>
                    </div>
                </div>
                <div class="news-body">
                    <a class="news-title font-pri-bold fontmb-middle" href="{{$post_mb->url}}">{{$post_mb->name}}</a>
                    <p class="news-description fontmb-small">{{Str::words($post_mb->description,40)}}</p>
                    <div class="news-info">
                        <div class="news-info__item fontmb-little">
                            <p>{{ $post_mb->city->name ?? '--' }}</p>
                        </div>
                        <div class="news-info__item fontmb-little">
                            <p>{{date_format($post_mb->created_at,"d-m-Y")}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
             @if(!empty($posts))
                {{ $posts->links('vendor.pagination.custom-distribution') }}
            @endif
        </div>
    </div>

    <div class="library mb-60">
        <div class="container-remake">
            <div class="library-header">
                <h1 data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000" class="title font60 fontmb-middle">{{ __("thư viện") }}</h1>
                <div class="library-button">
                    <img loading="lazy" class="customPrevBtn" src="{{Theme::asset()->url('images/distribution/icon_left.png')}}"
                        alt="Button Previous">
                    <img loading="lazy" class="customNextBtn" src="{{Theme::asset()->url('images/distribution/icon_right.png')}}"
                        alt="Button Next">
                </div>
            </div>
        </div>
        @php
            $librarys = get_posts_by_category(theme_option('default_category_gallery'), 10);
        @endphp
        <div class="container-remake container-library " data-aos="fade-up" data-aos-duration="1500"
            data-aos-anchor-placement="center-bottom">
            <div class="owl-carousel gallery-olw">
                @foreach ($librarys as $library)
                <div class="library-item">
                    <div class="img-container">
                        <div class="skewed">
                            <a data-fancybox data-type="ajax" data-src="{{$library->url}}" data-filter="#gallery" href="javascript:;">
                                <img loading="lazy" src="{{ Storage::disk('public')->exists($library->image) ? get_object_image($library->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="{{$library->name}}">
                            </a>
                        </div>
                    </div>
                    <div class="library-item__content">
                        <a  class="library-title font25 fontmb-medium" data-fancybox data-type="ajax" data-src="{{$library->url}}" data-filter="#gallery" href="javascript:;">{{$library->name}}</a>
                        {{-- <a href="{{$library->url}}" class="library-title font25 fontmb-medium">{{$library->name}}</a> --}}
                        {{-- <p class="library-description font20 fontmb-little">{{Str::words($library->description,40)}}</p> --}}
                        <span class="time">{{date_format($library->created_at,"d-m-Y")}}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    window.__distribution = {
        ajax: "{{ Language::getLocalizedURL(Language::getCurrentLocale(), route('public.ajax.distribution-system')) }}",
        readmore: "{!!__('Readmore')!!}"
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
        loop: true,
        items: 2.5,
        margin: 25,
        dots: false,
        nav : false,
        responsiveClass: true,
        responsive:{
            0:{
                items: 1.5,
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