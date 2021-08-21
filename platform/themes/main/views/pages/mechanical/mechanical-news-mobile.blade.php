
@php
    $posts = get_all_posts(true,3);
@endphp
<div class="section-list-news-wrapper-mobile mechandical">
    <div class="container-remake">
        <div class="section-list-news">
<<<<<<< HEAD
            <div class="section-list-news-header  d-flex  align-items-center mb-60">
                <h2 class="title font-pri-bold fontmb-large text-uppercase">
                    Tin tức
                </h2>
            </div>
            
            <div class="content">
                @forelse($posts as $post)
                    <div class="item mx-0" data-aos="fade-left" data-aos-duration="1500" data-aos-easing="ease-in-out"
                        data-aos-delay="50">
=======
                <div class="section-list-news-header  d-flex  align-items-center mb-60">
                    <h2 class="title font-pri-bold fontmb-large text-uppercase">
                        Tin tức
                    </h2>
                </div>

                <div class="content">
                    @foreach(get_latest_posts(3) as $post)
                    <div class="item mx-0"  data-aos="fade-left" data-aos-duration="1500" data-aos-easing="ease-in-out" data-aos-delay="50" >
                       
>>>>>>> a3c12f073575f3f120f100e8555dd35b92743419
                        <div class="item-mobile">
                            <div class="img">
                                <div class="sub-left font-pri-bold">
                                    <div class="day"> {{ $post->created_at->format('d') }} </div>
                                    <div class="month"> {{ $post->created_at->format('M') }} </div>
<<<<<<< HEAD
                                    <div class="year"> {{ $post->created_at->format('Y') }} </div>
                                </div>
                                <div class="sub-right">
                                    <img width="" height="" src="{{Storage::disk('public')->exists($post->image) ? get_image_url($post->image) : RvMedia::getDefaultImage()}}" alt="" />
                                </div>
                            </div>
                            <div class="content">
                                <h3 class="fontmb-middle font-pri-bold">Lorem ipsum dolor, sit amet consectetur adipisicing
                                    elit. Ipsa quas nisi totam tenetur eveniet neque dolore nulla a consectetur amet,
                                    aliquam at voluptates illo labore!</h3>
                            </div>
                        </div>
                    </div>

                    @empty
                    <p> empty </p>
                @endforelse

                {{-- <div class="item mx-0" data-aos="fade-left" data-aos-duration="1600" data-aos-easing="ease-in-out"
                    data-aos-delay="50">
                    <div class="item-mobile">
                        <div class="img">
                            <div class="sub-left font-pri-bold">
                                <div class="day"> 29 </div>
                                <div class="month"> May </div>
                                <div class="year"> 2021 </div>
=======
                                    <div class="year"> {{ $post->created_at->format('Y') }} </div> 
                                </div>
                                <div class="sub-right">
                                    <a href="{{$post->url}}" title="{!! $post->name !!}">
                                        <img width="" height="" src="{{get_image_url($post->image)}}"
                                        alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="content">
                                <a href="{{$post->url}}">
                                    <h3 class="fontmb-middle font-pri-bold  text-dark"> {!! $post->name !!} </h3>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="item mx-0" data-aos="fade-left" data-aos-duration="1600" data-aos-easing="ease-in-out" data-aos-delay="50" >
                        
                        <div class="item-mobile">
                            <div class="img">
                                <div class="sub-left font-pri-bold">
                                    <div class="day"> 29 </div>
                                    <div class="month"> May </div>
                                    <div class="year"> 2021 </div> 
                                </div>
                                <div class="sub-right">
                                    <img width="" height="" src="{{Theme::asset()->url('images/mechandical/news.png')}}" alt="" />
                                </div>
>>>>>>> a3c12f073575f3f120f100e8555dd35b92743419
                            </div>
                            <div class="sub-right">
                                <img width="" height="" src="{{Theme::asset()->url('images/mechandical/news.png')}}"
                                    alt="" />
                            </div>
                        </div>
                        <div class="content">
                            <h3 class="fontmb-middle font-pri-bold">Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Ipsa quas nisi totam tenetur eveniet neque dolore nulla a consectetur amet,
                                aliquam at voluptates illo labore!</h3>
                        </div>
                    </div>
                </div>

                <div class="item mx-0" data-aos="fade-left" data-aos-duration="1800" data-aos-easing="ease-in-out"
                    data-aos-delay="50">
                    <div class="item-mobile">
                        <div class="img">
                            <div class="sub-left font-pri-bold">
                                <div class="day"> 29 </div>
                                <div class="month"> May </div>
                                <div class="year"> 2021 </div>
                            </div>
                            <div class="sub-right">
                                <img width="" height="" src="{{Theme::asset()->url('images/mechandical/news.png')}}"
                                    alt="" />
                            </div>
                        </div>
<<<<<<< HEAD
                        <div class="content">
                            <h3 class="fontmb-middle font-pri-bold">Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Ipsa quas nisi totam tenetur eveniet neque dolore nulla a consectetur amet,
                                aliquam at voluptates illo labore!</h3>
                        </div>
                    </div>
                </div> --}}
            </div>
=======
                    </div> --}}
                </div>
>>>>>>> a3c12f073575f3f120f100e8555dd35b92743419
        </div>
    </div>
    
    {{ $posts->links('vendor.pagination.custom') }}
</div>