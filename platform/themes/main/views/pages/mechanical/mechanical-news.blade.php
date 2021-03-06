<div class="section-list-news-wrapper mechandical">
    <div class="container-remake">
        <div class="section-list-news">
            <div class="section-list-news-header  d-flex  align-items-center">
                <h2 class="title font-pri-bold font60 text-uppercase">
                    {{ __("News") }}
                </h2>
                @php
                    $categoryNews = get_category_by_id(theme_option('default_category_news'));
                @endphp
                <a href="{{ is_plugin_active('blog') ? ($categoryNews ? $categoryNews->url : '') : '' }}" title="{!!__('Readmore')!!}" class="read-moree text-dark font20 font-pri"> {!!__('Readmore')!!} <img loading="lazy" width="" height=""
                        src="{{Theme::asset()->url('images/mechandical/chevron-double-right.svg')}}" alt="" /></a>
            </div>

            <div class="content">
                @foreach(get_latest_posts(3) as $post)
                    <div class="item mx-0" data-aos="fade-left" data-aos-duration="1500" data-aos-easing="ease-in-out"
                        data-aos-delay="50">
                        <div class="item__left">
                            <div class="sub--left font-pri-bold">
                                <div class="day"> {{ $post->created_at->format('d') }} </div>
                                <div class="month"> {{ $post->created_at->format('M') }} </div>
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
                                <h3 class="font30 title">
                                    <a href="{{$post->url}}"> {!! $post->name !!} </a>
                                </h3>
                                <p class="description text-dark font20">
                                    @empty($post->description)
                                        {!! $post->name !!}
                                    @endempty
                                    {!! $post->description !!}
                                </p>
                            </div>

                            <a href="{{$post->url}}" title="{!!__('Readmore')!!}" class="read-more text-dark font20 font-pri">
                                {!!__('Readmore')!!} <img loading="lazy" width="" height=""
                                    src="{{Theme::asset()->url('images/mechandical/chevron-double-right.svg')}}"
                                    alt=" {!! $post->name !!}" /></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>