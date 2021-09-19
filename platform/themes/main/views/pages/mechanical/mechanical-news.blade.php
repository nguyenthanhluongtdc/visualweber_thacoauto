@php
$categoryNews = get_category_by_id(theme_option('default_category_news'));
@endphp
<div class="section-list-news-wrapper mechandical">
    <div class="container-remake">
        <div class="section-list-news">
            <div class="section-list-news-header  d-flex  align-items-center justify-content-between">
                <h2 class="title font-pri-bold font60 text-uppercase">
                    {{ __("News") }}
                </h2>
{{--               
                <a href="{{ is_plugin_active('blog') ? ($categoryNews ? $categoryNews->url : '') : '' }}" title="{!!__('Readmore')!!}" class="read-moree text-dark font20 font-pri"> {!!__('Readmore')!!} <img loading="lazy" width="" height=""
                        src="{{Theme::asset()->url('images/mechandical/chevron-double-right.svg')}}" alt="" /></a>
                         --}}
                         <a href="{{get_category_by_id(theme_option('default_category_news_summary'))->url}}" class="color-black font20 font-pri">
                            {{_('Xem tất cả')}} <span><i class="fas fa-arrow-right scale07"></i></span>
                        </a>
            </div>

            <div class="content">
                @if(!empty(get_posts_by_category(theme_option('default_category_news'),6)))
                @foreach(get_posts_by_category(theme_option('default_category_news'),6) as $post)
                    <div class="item" data-aos="fade-left" data-aos-duration="1500" data-aos-easing="ease-in-out"
                        data-aos-delay="50">
                        <div class="item__left">
                            <div class="sub--left font-pri-bold">
                                @php
                                    $month = $post->created_at->format('m')
                                @endphp
                                <div class="day"> {{ $post->created_at->format('d') }} </div>
                                <div class="month">{{Language::getCurrentLocale() == "en" ? $post->created_at->format('M') : "Tháng ".(int)$month}}</div>
                                <div class="year"> {{ $post->created_at->format('Y') }} </div>
                                
                            </div>

                            <div class="sub--right">
                                <a href="{{$post->url}}" title="{!! $post->name !!}">
                                    <img loading="lazy" width="" height="" src="{{Storage::disk('public')->exists($post->image) ? get_image_url($post->image) : RvMedia::getDefaultImage()}}"
                                    alt="" />
                                </a>
                            </div>
                        </div>

                        <div class="item__right">
                            <div class="item__right__top">
                                <h3 class="font30 font-pri-bold title">
                                    <a class="font30 font-pri-bold" href="{{$post->url}}"> {!! $post->name !!} </a>
                                </h3>
                            </div>
                            <div class="item__right__bottom">
                                <p class="description text-dark font20">
                                    @empty($post->description)
                                        {!! $post->name !!}
                                    @endempty
                                    {!! $post->description !!}
                                </p>
                            </div>

                            {{-- <a href="{{$post->url}}" title="{!!__('Readmore')!!}" class="read-more text-dark font20 font-pri">
                                {!!__('Readmore')!!} <img loading="lazy" width="" height=""
                                    src="{{Theme::asset()->url('images/mechandical/chevron-double-right.svg')}}"
                                    alt=" {!! $post->name !!}" /></a> --}}
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
            @if(!empty(get_posts_by_category(theme_option('default_category_news'),6)))
            <div class="container-remake">
                {{ get_posts_by_category(theme_option('default_category_news'),6)->links('vendor.pagination.custom') }}
            </div>
            @endif
        </div>
    </div>

</div>