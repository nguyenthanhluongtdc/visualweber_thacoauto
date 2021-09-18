{{-- @php Theme::layout('no-sidebar') @endphp --}}
<script>
    const getShareholderUrl = '{{route('public.ajax.getShareholder')}}'
</script>
<div class="slider-main-carousel owl-carousel owl-theme">
    @forelse (get_field($page, 'main_banner_homepage') as $item)
    <div class="slider-main-item">
        <a href="{{get_sub_field($item, 'link')}}"><img loading="lazy" src="{{ get_image_url(get_sub_field($item, 'image')) }}" alt="Banner trang chủ"></a>
    </div>
    @empty
 
    @endforelse
</div>

<div class="section-news-home container-remake">
    @php
        $postDesktop = get_only_featured_posts_by_category(theme_option('default_category_news'),4);
        $postMobile = get_only_featured_posts_by_category(theme_option('default_category_news'),2);
    @endphp

    <h2 class="font-pri-bold font60 fontmb-large color-gray" >{{ __('TIN TỨC VÀ SỰ KIỆN') }}</h2>


    <div class="news-hompage">
        <div class="news-item news-1">
            @if(count($postDesktop)>=1)
            <a href="{{$postDesktop[0]->url}}"><img loading="lazy" src="{{ get_object_image($postDesktop[0]->image, 'post-large') }}" alt="{{$postDesktop[0]->name}}"></a>
            @endif
        </div>
        <div class="news-item news-2">
            @if(count($postDesktop)>=1)
            <div class="content-top">
                <h3 class="title font-pri-bold font30  text-uppercase-none fontmb-middle">
                    <a href="{{$postDesktop[0]->url}}" >{{$postDesktop[0]->name}}</a>
                </h3>
                <p class="desc font-pri font18 fontmb-small">
                    {{$postDesktop[0]->description}}
                </p>
            </div>
            <div class="city-day font-pri font18 fontmb-little">
                <span class="city">{{ $postDesktop[0]->city->name ?? '--' }}</span>
                <span class="day">{{date_format($postDesktop[0]->created_at,"d-m-Y")}}</span>
            </div>
            @endif
        </div>
        <div class="news-item news-3">
            @php
                $post = is_plugin_active('blog') ? get_first_video_post() : collect();
            @endphp

            @if(!blank($post) && isset(get_field($post, 'video_gallery')[0]))
                <div class="img-item">
                    <a data-fancybox href="https://www.youtube.com/watch?v={{get_sub_field(get_field($post, 'video_gallery')[0], 'youtube_code')}}">
                        <i class="fab fa-youtube"></i>
                        <img loading="lazy" src="{{ get_object_image($post->image) }}" alt="{{$post->name}}">
                    </a>
                </div>
                <h3 class="title font30 fontmb-small text-uppercase-none">
                    <a data-fancybox href="https://www.youtube.com/watch?v={{get_sub_field(get_field($post, 'video_gallery')[0], 'youtube_code')}}" class="font-pri-bold color-gray font30 fontmb-small">{{$post->name}}</a>
                </h3>
            @endif
        </div>
        <div class="news-item news-4">
            @if(count($postDesktop)>=2)
            <div class="news-item-content">
                <h3 class="title font-pri-bold font30 fontmb-middle text-uppercase-none">
                    <a href="{{$postDesktop[1]->url}}">{{$postDesktop[1]->name}}</a>
                </h3>
                <p class="desc font-pri font18 fontmb-small">
                    {{$postDesktop[1]->description}}
                </p>
            </div>
            <div class="city-day font-pri font18 fontmb-little">
                <span class="city">{{ $postDesktop[1]->city->name ?? '--' }}</span>
                <span class="day">{{date_format($postDesktop[1]->created_at,"d-m-Y")}}</span>
            </div>
            @endif
        </div>
        <div class="news-item news-5">
            @if(count($postDesktop)>=3)
            <div class="news-item-content">
                <h3 class="title font-pri-bold font30 fontmb-middle text-uppercase-none">
                    <a href="{{$postDesktop[2]->url}}">{{$postDesktop[2]->name}}</a>
                </h3>
                <p class="desc font-pri font18 fontmb-small">
                    {{$postDesktop[2]->description}}
                </p>
            </div>
            <div class="city-day font-pri font18 fontmb-little">
                <span class="city">{{ $postDesktop[2]->city->name ?? '--' }}</span>
                <span class="day">{{date_format($postDesktop[2]->created_at,"d-m-Y")}}</span>
            </div>
            @endif
        </div>
        <div class="news-item news-6">
            @if(!empty(get_post_featerd_member(1) && count(get_post_featerd_member(1))>0))
            <div class="news-item-content">
                <h3 class="title font-pri-bold font30 fontmb-middle text-uppercase-none">
                    <a href="{{get_post_featerd_member(1)[0]->url}}">{{get_post_featerd_member(1)[0]->name}}</a>
                </h3>
                <p class="desc font-pri font18 fontmb-small">
                    {{get_post_featerd_member(1)[0]->description}}
                </p>
            </div>
            <div class="city-day font-pri font18 fontmb-little">
                <span class="city">{{ get_post_featerd_member(1)[0]->city->name ?? '--' }}</span>
                <span class="day">{{date_format(get_post_featerd_member(1)[0]->created_at,"d-m-Y")}}</span>
            </div>
            <img src="{{get_image_url(get_post_featerd_member(1)[0]->featured_member_image)}}" alt="{{get_post_featerd_member(1)[0]->name}}" class="member-avatar">
            @elseif(count($postDesktop)>=4)
            <div class="news-item-content">
                <h3 class="title font-pri-bold font30 fontmb-middle text-uppercase-none">
                    <a href="{{$postDesktop[3]->url}}">{{$postDesktop[3]->name}}</a>
                </h3>
                <p class="desc font-pri font18 fontmb-small">
                    {{$postDesktop[3]->description}}
                </p>
            </div>
            <div class="city-day font-pri font18 fontmb-little">
                <span class="city">{{ $postDesktop[3]->city->name ?? '--' }}</span>
                <span class="day">{{date_format($postDesktop[3]->created_at,"d-m-Y")}}</span>
            </div>
            @endif
        </div>
        <div class="news-item news-7">
            <div class="summary">
                <p class="title font-pri-bold font30 fontmb-middle">
                    {{ __("Điểm tin") }}
                </p>
                <a href="{{get_category_by_id(theme_option('default_category_news_summary'))->url}}" class="font-pri-bold font20 fontmb-small">
                    {{_('Xem tất cả')}} <span><i class="fas fa-arrow-right scale07"></i></span>
                </a>
                {{-- <a class="font-pri-bold font20 fontmb-small" href="{{get_category_by_id(theme_option('default_category_news_summary'))->url}}">Xem thêm</a> --}}
            </div>

            <div class="scollbar-wrap">
                @php
                    $postsHot = get_posts_by_category(theme_option('default_category_news_summary'), 10)
                    
                @endphp
                <div class="swiper-container swiper-hotnews">
                    <div class="swiper-wrapper">
                        @if (!empty($postsHot))
                        @foreach ($postsHot as $key => $post)
                        <div class="swiper-slide">
                            {{-- {{ Theme::asset()->url('images/favicon.png') }} --}}
                            <img src='{{ get_image_url(has_field($post, 'hot_news_image')) }}'
                            alt='{{$post->name}}' />
                        </div>
                        @endforeach
                        @endif
                  </div>
                </div>
                <div class="swiper-container swiper-hotnews-title">
                    <div class="swiper-wrapper">
                        @if (!empty($postsHot))
                        @foreach ($postsHot as $key => $post)
                        <div class="swiper-slide">
                            <span class="font-pri-bold font25 fontmb-small">
                                <a href="{{$post->url}}" class="text-uppercase-none">{{$post->name}}</a>
                            </span>
                        </div>
                        @endforeach
                        @endif
                  </div>
                      <!-- Add Scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- lĩnh vực hoạt động --}}
@include('theme.main::partials.field-of-activity',$page)

{{-- quan hệ cổ đông --}}
@if(!empty(get_shareholder_categories()))
<div class="section-shareholder-home container-remake">
    <div class="shareholder-home-top" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out">
        <h2 class="font-pri-bold font60 color-gray fontmb-large ">Quan hệ cổ đông</h2>
        <div class="menu-tab-right font25 fontmb-small">
            <ul class="nav nav-pills font-pri-bold color-gray hidden-scrollbar" role="tablist">
                @foreach (get_shareholder_categories() as $key => $item)
                <li class="nav-item" role="tab">
                    <a class="nav-link shareholder-link {{$loop->first ? "active" : ""}}" data-category={{$item->id}} href="javascript:;">{{$item->name}}</a>
                </li>
                @endforeach
                <li class="nav-item link-views-all">
                    <a href="#" class="color-gray">
                        {{__('Xem tất cả')}} <span><i class="fas fa-arrow-right font15"></i></span>
                    </a>
                </li>
            </ul>
            {{-- <div class="link-views-all font-pri-bold font18 color-gray">
                <a href="#" class="color-gray">
                    Xem tất cả   <span><i class="fas fa-arrow-right font15"></i></span>
                </a>
            </div> --}}
        </div>
    </div>
    
    <div class="shareholder-home-content">
        @php
            $shareholderCategory = get_shareholder_categories()->last();
            
        @endphp
        <div class="loading d-none">
            <img src="{{Theme::asset()->url('images/media/loading.gif')}}" alt="Loading">
        </div>
        <div class=" font-25 fontmb-small" >
            <div>
                <div class="tab-content-item">
                    <div class="tab-content-left" data-aos="fade-right" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <img loading="lazy" src="{{ Theme::asset()->url('images/main/cthome1.jpg') }}" alt="Icon">
                    </div>
                    <div class="tab-content-right" data-aos="fade-right" data-aos-duration="1200" data-aos-easing="ease-in-out" data-aos-delay="250">
                        <div class="list-content">
                            {{-- @dd($shareholderCategory->id) --}}
                            @if(!empty(get_shareholder_by_category_id($shareholderCategory->id)))
                            @foreach (get_shareholder_by_category_id($shareholderCategory->id) as $item)
                                
                            <div class="item-shareholder">
                                
                                <div class="left">
                                    <img loading="lazy" src="{{ Theme::asset()->url('images/main/up.png') }}" alt="Up icon"
                                    class="up-show">
                                    {{-- <i class="fas fa-caret-right font18"></i> --}}
                                </div>
                                <div class="mid">
                                    <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                                        {{$item->name}}
                                    </h5>
                                    {{-- <div class="desc-none">
                                        <div class="wrap">
                                            <div class="desc-left font20 font-cond font20 fontmb-small">CBTT phat hanh co phieu tang von co
                                                phan.pdf
                                            </div>
                                            <div class="desc-right">
                                                <span class="font-cond font20 fontmb-small">804,24KB</span>
                                                <a href="#" class="font-pri">DOWNLOAD</a>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <div class="right font-pri color-gray font20">
                                    <div class="desc-right">
                                        <a href="{{get_image_url($item->file)}}" class="font-pri fontmb-small btn">{{__('Tải về')}}</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
    @endif
    
    {{-- đối tác --}}
    <div class="section-partner-home container-remake" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out">
        <h2 class="font-pri-bold font60 color-gray fontmb-large text-uppercase">{{get_field($page, 'homepage_partner_title')}}</h2>
    <div class="partner-home-carousel owl-carousel">
        @if(has_field($page, 'homepage_slide_partner'))
            @forelse (get_field($page, 'homepage_slide_partner') as $item)
                <div class="item">
                    <div class="logo">
                        <a href="{{get_sub_field($item, 'lien_ket')}}"><img loading="lazy" src="{{ get_image_url(get_sub_field($item, 'logo')) }}" alt="{{__('Partner logo')}}"></a>
                    </div>
                </div>
            @empty
                {{__('No data to show')}}
            @endforelse
        @endif
    </div>
</div>
