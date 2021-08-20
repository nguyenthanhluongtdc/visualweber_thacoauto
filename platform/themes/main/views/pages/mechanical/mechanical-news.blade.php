<div class="section-list-news-wrapper mechandical">
    <div class="container-remake">
        <div class="section-list-news">
            <div class="section-list-news-header  d-flex  align-items-center">
                <h2 class="title font-pri-bold font40 text-uppercase">
                    Tin tức
                </h2>

                <a href="#" title="{!!__('Read more')!!}" class="read-moree text-dark font20 font-pri"> {!!__('Xem
                    thêm')!!} <img width="" height=""
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
                                    <img width="" height="" src="{{get_image_url($post->image)}}"
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

                            <a href="#" title="{!!__('Read more')!!}" class="read-more text-dark font20 font-pri">
                                {!!__('Read more')!!} <img width="" height=""
                                    src="{{Theme::asset()->url('images/mechandical/chevron-double-right.svg')}}"
                                    alt="" /></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>