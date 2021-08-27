@php
    $posts = get_all_posts(true,3);
@endphp
<div class="section-list-news-wrapper-mobile mechandical">
    <div class="container-remake">
        <div class="section-list-news">
            <div class="section-list-news-header  d-flex  align-items-center mb-60">
                <h2 class="title font-pri-bold fontmb-large text-uppercase">
                    {{ __("News") }}
                </h2>
            </div>

            <div class="content">
                @forelse($posts as $post)
                    <div class="item mx-0" data-aos="fade-left" data-aos-duration="1500" data-aos-easing="ease-in-out"
                        data-aos-delay="50">
                        <div class="item-mobile">
                            <div class="img">
                                <div class="sub-left font-pri-bold">
                                    <div class="day"> {{ $post->created_at->format('d') }} </div>
                                    <div class="month"> {{ $post->created_at->format('M') }} </div>
                                    <div class="year"> {{ $post->created_at->format('Y') }} </div>
                                </div>
                                <div class="sub-right">
                                    <img loading="lazy" width="" height="" src="{{Storage::disk('public')->exists($post->image) ? get_image_url($post->image) : RvMedia::getDefaultImage()}}" alt="" />
                                </div>
                            </div>
                            <div class="content">
                                <h3 class="fontmb-middle font-pri-bold">{!! $post->name !!}</h3>
                            </div>
                        </div>
                    </div>

                    @empty
                    <p>{{ __("Nội dung đang được cập nhật") }}</p>
                @endforelse

                {{-- <div class="item mx-0" data-aos="fade-left" data-aos-duration="1600" data-aos-easing="ease-in-out"
                    data-aos-delay="50">
                    <div class="item-mobile">
                        <div class="img">
                            <div class="sub-left font-pri-bold">
                                <div class="day"> 29 </div>
                                <div class="month"> May </div>
                                <div class="year"> 2021 </div>
                            </div>
                            <div class="sub-right">
                                <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/mechandical/news.png')}}"
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
                                <img loading="lazy" width="" height="" src="{{Theme::asset()->url('images/mechandical/news.png')}}"
                                    alt="" />
                            </div>
                        </div>
                        <div class="content">
                            <h3 class="fontmb-middle font-pri-bold">Lorem ipsum dolor, sit amet consectetur adipisicing
                                elit. Ipsa quas nisi totam tenetur eveniet neque dolore nulla a consectetur amet,
                                aliquam at voluptates illo labore!</h3>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    <div class="container-remake">
        {{ $posts->links('vendor.pagination.custom') }}
    </div>
</div>

