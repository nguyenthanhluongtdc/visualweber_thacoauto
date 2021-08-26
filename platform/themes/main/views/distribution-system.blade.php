<div class="distribution">
    <div class="provincial-company">
        <div class="container-remake">
            <h1 data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000" class="title font60 fontmb-large">{{ __("Công ty tỉnh thành") }}</h1>
            <div data-aos="fade-left" data-aos-duration="1500" class="description desktop font20 mt-20">{!! $page->content !!}</div>
            <div data-aos="zoom-in-up" data-aos-duration="2000" class="select-list mt-40 mb-40">
                @php
                    $citys = get_cities();
                    foreach($citys as $key => $value) {
                        $cityIdFirst = $key;
                    }
                @endphp
                <form action="" id="distribution-system-form">
                    @csrf
                    <select class="ui search selection dropdown city w-100" name="city_id" id="city_id">
                        <option value="">{{ __("Tỉnh/Thành phố") }}</option>
                        @foreach ($citys as $key => $item)
                            <option value="{{ $key }}" {{ !empty($_GET['city']) && $_GET['city'] == $key ? 'selected' : '' }}>{{ $item }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="font20 fontmb-small">{{ __("Approval") }}</button>
                </form>
            </div>
            <div data-aos="zoom-in" data-aos-duration="2500" class="branch-wrap">
                <img class="branch-background-image" src="{{Theme::asset()->url('images/distribution/background.jpg')}}"
                    alt="">
                <div class="branch-background-blur"></div>
                <div class="left">
                    <div class="branch-overflow" id="branch-list"></div>
                </div>
                <div class="right">
                    <div class="w-100 h-100" id="map"></div>
                </div>
            </div>
            <div data-aos="fade-left" data-aos-duration="1500" class="description mobile font20">{!! $page->content !!}</div>
        </div>
    </div>
    <div class="activity-news-desktop">
        <div class="container-remake">
            @php
                $posts = get_posts_by_category(theme_option('default_category_news'), 4);
            @endphp
            <h1 data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000" class="title font60 mb-20 fontmb-large">{{ __("tin tức hoạt động") }}</h1>
            <div class="activity-news-desktop__wrap">
                @if (!empty($posts[0]))
                <div data-aos="fade-right" data-aos-duration="1500" class="activity-news-desktop__item">
                    <div class="img-container">
                        <div class="skewed">
                            <a href="{{$posts[0]->url}}">
                                <img src="{{ Storage::disk('public')->exists($posts[0]->image) ? get_object_image($posts[0]->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="Tin tức">
                            </a>
                        </div>
                    </div>
                    <div class="news-body">
                        <a class="news-title font30" href="{{$posts[0]->url}}">{{$posts[0]->name}}</a>
                        <p class="news-description font20">{{Str::words($posts[0]->description,40)}}</p>
                        <div class="news-info">
                            <div class="news-info__item font15">
                                <p>{{ $posts[0]->city->name ?? '--' }}</p>
                            </div>
                            <div class="news-info__item font15">
                                <p>{{date_format($posts[0]->created_at,"d-m-Y")}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="activity-news-desktop__item">
                    @if (!empty($posts[1]))
                    <div data-aos="flip-up" data-aos-duration="1500" class="item-top news-body">
                        <a class="news-title font25" href="{{$posts[1]->url}}">{{$posts[1]->name}}</a>
                        <p class="news-description">{{Str::words($posts[1]->description,40)}}</p>
                        <div class="news-info">
                            <div class="news-info__item font15">
                                <p>{{ $posts[1]->city->name ?? '--' }}</p>
                            </div>
                            <div class="news-info__item font15">
                                <p>{{date_format($posts[1]->created_at,"d-m-Y")}}</p>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if (!empty($posts[2]))
                    <div data-aos="flip-down" data-aos-duration="1500" class="item-bottom">
                        <div class="img-container">
                            <div class="skewed">
                                <a href="{{$posts[2]->url}}">
                                    <img src="{{ Storage::disk('public')->exists($posts[2]->image) ? get_object_image($posts[2]->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="Tin tức">
                                </a>
                            </div>
                        </div>
                        <div class="news-body">
                            <a class="news-title font25" href="{{$posts[2]->url}}">{{$posts[2]->name}}</a>
                            <div class="news-info">
                                <div class="news-info__item font15">
                                    <p>{{ $posts[2]->city->name ?? '--' }}</p>
                                </div>
                                <div class="news-info__item font15">
                                    <p>{{date_format($posts[2]->created_at,"d-m-Y")}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @if (!empty($posts[3]))
                <div data-aos="fade-left" data-aos-duration="1500" class="activity-news-desktop__item">
                    <div class="img-container">
                        <div class="skewed">
                            <a href="{{$posts[3]->url}}">
                                <img src="{{ Storage::disk('public')->exists($posts[3]->image) ? get_object_image($posts[3]->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="Tin tức">
                            </a>
                        </div>
                    </div>
                    <div class="news-body">
                        <a class="news-title font30" href="{{$posts[3]->url}}">{{$posts[3]->name}}</a>
                        <p class="news-description fontmb-little">{{Str::words($posts[3]->description,40)}}</p>
                        <div class="news-info">
                            <div class="news-info__item font15">
                                <p>{{ $posts[3]->city->name ?? '--' }}</p>
                            </div>
                            <div class="news-info__item font15">
                                <p>{{date_format($posts[3]->created_at,"d-m-Y")}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

    <div class="activity-news-mobile font-pri">
        <div class="container-remake">
            <h2 data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000" class="title font60 mb-20 text-uppercase fontmb-large font-pri-bold">
                {{ __("tin tức hoạt động") }}
            </h2>
            @if (!empty($posts[0]))
            <div class="news-item">
                <div class="img-container">
                    <div class="skewed">
                        <a href="{{$posts[0]->url}}">
                            <img src="{{ Storage::disk('public')->exists($posts[0]->image) ? get_object_image($posts[0]->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="Tin tức">
                        </a>
                    </div>
                </div>
                <div class="news-body">
                    <a class="news-title font-pri-bold fontmb-middle" href="{{$posts[0]->url}}">{{$posts[0]->name}}</a>
                    <p class="news-description fontmb-small">{{Str::words($posts[0]->description,40)}}</p>
                    <div class="news-info">
                        <div class="news-info__item fontmb-little">
                            <p>{{ $posts[0]->city->name ?? '--' }}</p>
                        </div>
                        <div class="news-info__item fontmb-little">
                            <p>{{date_format($posts[0]->created_at,"d-m-Y")}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (!empty($posts[1]))
            <div class="news-item">
                <div class="img-container">
                    <div class="skewed">
                        <a href="{{$posts[1]->url}}">
                            <img src="{{ Storage::disk('public')->exists($posts[1]->image) ? get_object_image($posts[1]->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="Tin tức">
                        </a>
                    </div>
                </div>
                <div class="news-body">
                    <a class="news-title font-pri-bold fontmb-middle" href="{{$posts[1]->url}}">{{$posts[1]->name}}</a>
                    <p class="news-description fontmb-small">{{Str::words($posts[1]->description,40)}}</p>
                    <div class="news-info">
                        <div class="news-info__item fontmb-little">
                            <p>{{ $posts[1]->city->name ?? '--' }}</p>
                        </div>
                        <div class="news-info__item  fontmb-little">
                            <p>{{date_format($posts[1]->created_at,"d-m-Y")}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if (!empty($posts[2]))
            <div class="news-item">
                <div class="img-container">
                    <div class="skewed">
                        <a href="{{$posts[2]->url}}">
                            <img src="{{ Storage::disk('public')->exists($posts[2]->image) ? get_object_image($posts[2]->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="Tin tức">
                        </a>
                    </div>
                </div>
                <div class="news-body">
                    <a class="news-title font-pri-bold fontmb-middle" href="{{$posts[2]->url}}">{{$posts[2]->name}}</a>
                    <p class="news-description fontmb-small">{{Str::words($posts[2]->description,40)}}</p>
                    <div class="news-info">
                        <div class="news-info__item  fontmb-little">
                            <p>{{ $posts[2]->city->name ?? '--' }}</p>
                        </div>
                        <div class="news-info__item fontmb-little">
                            <p>{{date_format($posts[2]->created_at,"d-m-Y")}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif

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
                    <img class="customPrevBtn" src="{{Theme::asset()->url('images/distribution/icon_left.png')}}"
                        alt="">
                    <img class="customNextBtn" src="{{Theme::asset()->url('images/distribution/icon_right.png')}}"
                        alt="">
                </div>
            </div>
        </div>
        @php
            $librarys = get_posts_by_category(theme_option('default_category_gallery'), 10);
        @endphp
        <div class="container-library" data-aos="fade-up" data-aos-duration="1500"
            data-aos-anchor-placement="center-bottom">
            <div class="owl-carousel owl-theme">
                @foreach ($librarys as $library)
                <div class="library-item">
                    <div class="img-container">
                        <div class="skewed">
                            <a href="{{$library->url}}">
                                <img src="{{ Storage::disk('public')->exists($library->image) ? get_object_image($library->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="Thư viện ảnh">
                            </a>
                        </div>
                    </div>
                    <div class="library-item__content">
                        <a href="{{$library->url}}" class="library-title font25 fontmb-medium">{{$library->name}}</a>
                        <p class="library-description font20 fontmb-little">{{Str::words($library->description,40)}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    window.__distribution = {
        ajax: "{{ Language::getLocalizedURL(Language::getCurrentLocale(), route('public.ajax.distribution-system')) }}"
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
    const Distribution = {
        initSearchState: function() {
            if(!$('.city')) return

            $('.ui.dropdown.city').dropdown({
                ignoreDiacritics: true,
                sortSelect: true,
                fullTextSearch:'exact',
            });
        },
        getTemplateDistrubition: function() {
            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                },
                url: window.__distribution.ajax,
                method: "GET",
                data: {
                    city: $('#city_id').val()
                },
                dataType: "json",
                success: function(result, status, xhr) {
                    const { data, template } = result.data
                    if($('#branch-list')) {
                        $('#branch-list').html(template)
                    }

                    window.__distribution = {
                        ...window.__distribution,
                        data
                    }
                },
            });
        }
    }


    $(document).ready(function() {
        Distribution.getTemplateDistrubition()
        $("#city_id").change(function(e) {
            Distribution.getTemplateDistrubition()
        });

    })
    Distribution.initSearchState()


    // if($('.city').length){
    //     var ignoreDiacritics = true;
    //     $('.ui.dropdown.city').dropdown({
    //         ignoreDiacritics: ignoreDiacritics,
    //         sortSelect: true,
    //         fullTextSearch:'exact',
    //     });
    // };
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
    //Map
    const initMap = () => {
        // var map = L.map('map', {
        //     maxZoom: 3,
        //     minZoom: 1,
        //     crs: L.CRS.Simple
        // }).setView([0, 0], 1);

        // map.setMaxBounds(new L.LatLngBounds([0,500], [500,0]));

        // var imageUrl = "{{ Theme::asset()->url('images/distribution/map.png') }}"
        // var imageBounds = [[250,0], [0,250]];

        // L.imageOverlay(imageUrl, imageBounds).addTo(map);
        // var map = L.map('map', {
        //     crs: L.CRS.Simple
        // });
        // // var bounds = [[0,0], [1000,1000]];
        // L.imageOverlay("{{ Theme::asset()->url('images/distribution/map.png') }}").addTo(map);
        // map.fitBounds(bounds);

        // var map = L.map('map').setView([51.505, -0.09], 13);

        // L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        // }).addTo(map);

        // L.marker([51.5, -0.09]).addTo(map)
        //     .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        //     .openPopup();
        // };
        var map = L.map('map', {
            minZoom: 1,
            maxZoom: 3,
            center: [0, 0],
            zoom: 1,
            crs: L.CRS.Simple
        });
        var w = 2049;
        var h = 3185;
        var url = "{{ Theme::asset()->url('images/distribution/map.png') }}";
        var southWest = map.unproject([ 0, h], map.getMaxZoom()-1);
        var northEast = map.unproject([ w, 0], map.getMaxZoom()-1);
        var bounds = new L.LatLngBounds( southWest, northEast);
        window.__map = map

        L.imageOverlay( url, bounds).addTo(map);

        map.setMaxBounds(bounds);

        var yx = L.latLng;

        var xy = function(x, y) {
            if (L.Util.isArray(x)) {    // When doing xy([x, y]);
                return yx(x[1], x[0]);
            }
            return yx(y, x);  // When doing xy(x, y);
        };

        var greenIcon = L.icon({
            iconUrl: "{{ Theme::asset()->url('images/distribution/marker.png') }}",

            iconSize:     [30, 30], // size of the icon
            iconAnchor:   [20, 20], // point of the icon which will correspond to marker's location
            popupAnchor:  [-3, -25] // point from which the popup should open relative to the iconAnchor
        });

        let popup = `<div class="branch-popup">
                        <h2 class="branch-name font20">thaco an sương</h2>
                        <div class="branch-body">
                            <div class="branch-body-item">
                                <p class="info-number font30">70</p>
                                <p class="info-text font15">Lorem Isum</p>
                            </div>
                            <div class="branch-body-item">
                                <p class="info-number font30">1000</p>
                                <p class="info-text font15">Lorem Isum</p>
                            </div>
                            <div class="branch-body-item">
                                <p class="info-number font30">99%</p>
                                <p class="info-text font15">Lorem Isum</p>
                            </div>
                        </div>
                        <div class="branch-footer">
                            <a href="#"><button>{!! __('Readmore') !!}</button></a>
                        </div>
                    </div>`

        let marker = L.marker(new L.LatLng(-630.8, 254), {icon: greenIcon}).addTo(map).bindPopup(popup)
        L.marker(new L.LatLng(-640.8, 300), {icon: greenIcon}).addTo(map).bindPopup(popup)
        L.marker(new L.LatLng(-660.8, 200), {icon: greenIcon}).addTo(map).bindPopup(popup)
        L.marker(new L.LatLng(-650.8, 240), {icon: greenIcon}).addTo(map).bindPopup(popup)
        L.marker(new L.LatLng(-620.8, 240), {icon: greenIcon}).addTo(map).bindPopup(popup)

        setTimeout(() => {
            window.__map.setView(new L.LatLng(-630.8, 254), 2)
            // marker.openPopup()
        }, 300)
    }
    $(document).ready(function() {
        initMap();
    })
</script>