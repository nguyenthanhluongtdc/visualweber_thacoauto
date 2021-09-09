<script>
    window.__distribution = {
        ajax: "{{ Language::getLocalizedURL(Language::getCurrentLocale(), route('public.ajax.showroom')) }}",
        id: "{{ $data->id }}"
    }
</script>
@php
    Theme::asset()->container('footer')->usePath()->add('distribution', 'js/distribution.js', [], [], time());
@endphp

@if (isset($data) && !blank($data))
    <div class="distribution-detail overflow-x-hidden">
        <div class="thacoauto-provincial">
            <div class="container-remake">
                <h1 data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000" class="title font60 fontmb-large">{{ $data->name }}</h1>
                <div class="thacoauto-provincial__wrap">
                    <div data-aos="fade-right" data-aos-duration="1500" class="left">
                        {{-- <h3 class="title fontmb-medium font25">{{ $data->name }}</h3> --}}
                        <div class="description font20">{!! has_field($data, 'mo_ta_he_thong_phan_phoi_16299906705') ? get_field($data, 'mo_ta_he_thong_phan_phoi_16299906705') : '' !!}</div>
                        <ul>
                            <li>
                                <img loading="lazy" src="{{Theme::asset()->url('images/distribution/icon_address.png')}}" alt="">
                                <div class="font20">{!! has_field($data, 'address_he_thong_phan_phoi') ? get_field($data, 'address_he_thong_phan_phoi') : '' !!}</div>
                            </li>
                            <li>
                                <img loading="lazy" src="{{Theme::asset()->url('images/distribution/icon_email.png')}}" alt="">
                                <div class="font20">{{ has_field($data, 'email_he_thong_phan_phoi') ? get_field($data, 'email_he_thong_phan_phoi') : '' }}</div>
                            </li>
                            <li>
                                <img loading="lazy" src="{{Theme::asset()->url('images/distribution/icon_phone.png')}}" alt="">
                                <div class="font20">{{ has_field($data, 'phone_he_thong_phan_phoi') ? get_field($data, 'phone_he_thong_phan_phoi') : '' }}</div>
                            </li>
                        </ul>
                    </div>
                    <div data-aos="fade-left" data-aos-duration="1500" class="right">
                        <h3 class="title fontmb-medium font25 ">{{ __("Trụ sở chính") }}</h3>
                        <div class="img-container">
                            <div class="skewed">
                                <img loading="lazy" src="{{ $data->image ? get_image_url($data->image) : '' }}" alt="{{ $data->name }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="business-activities mt-85">
            <div class="container-remake">
                <h1 data-aos="fade-right" data-aos-easing="linear" data-aos-duration="1000" class="title font60 fontmb-large text-uppercase">{{ __('hoạt động kinh doanh') }}</h1>
                <div class="vehicle-category__wrap" data-aos="fade-up" data-aos-anchor-placement="center-center" data-aos-duration="1000">
                    @forelse (get_brand_of_distribution($data->id) ?? collect() as $key => $item)
                        <div class="vehicle-category__item">
                            <h3 class="title font25">{{ $key }}</h3>
                            <ul>
                                @foreach ($item as $child)
                                    <li>
                                        <a class="js-showroom-showlist" href="javascript:;" data-brand-id="{{ $child->brand_id }}" data-category-id="{{ $child->category_id }}">
                                            <img loading="lazy" class="img-fluid" width="70" src="{{ isset($child->brand->image) && !blank($child->brand->image) ? get_image_url($child->brand->image) : '' }}" alt="{{ $child->brand->name ?? '' }}">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @empty
                        {!! Theme::partial('templates.no-content') !!}
                    @endforelse
                </div>
            </div>
            {!! Theme::partial('templates.loading') !!}
            <div class="js-showroom-content container-remake"></div>
        </div>
        @php
            $posts = get_posts_by_category(theme_option('default_category_news'), 4);
            $pictures = get_posts_by_category(theme_option('default_category_gallery'), 4);
        @endphp
        <div class="event-news mt-55 mb-155">
            <div class="container-remake">
                <h1 class="title font60 fontmb-large mb-0">{{ __('tin tức & sự kiện') }}</h1>
            </div>
            <div class="event-news__wrap mt-40">
                <div class="container-remake">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active font30" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">{{ __('tin tức & sự kiện') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link font30" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">{{ __('video & hình ảnh') }}</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="event-news__content">
                                @foreach ($posts as $post)
                                <div class="event-news__item">
                                    <div class="left">
                                        <div class="img-container">
                                            <div class="skewed">
                                                <img loading="lazy" src="{{ Storage::disk('public')->exists($post->image) ? get_object_image($post->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="tin tức & sự kiện">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <h2 class="event-news__item--name font30"><a href="{{$post->url}}">{{$post->name}}</a></h2>
                                        <p class="event-news__item--date font20">{{date_format($post->created_at,"d-m-Y")}}</p>
                                        <p class="event-news__item--description font20">{{Str::words($post->description,40)}}</p>
                                        <a href="{{$post->url}}">
                                            <button class="event-news__item--more font15">{{ __("Readmore") }}</button>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="event-news__content">
                                @foreach ($pictures as $picture)
                                <div class="event-news__item">
                                    <div class="left">
                                        <div class="img-container">
                                            <div class="skewed">
                                                <img loading="lazy" src="{{ Storage::disk('public')->exists($picture->image) ? get_object_image($picture->image, 'post-related') : RvMedia::getDefaultImage() }}" alt="video & hình ảnh">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <h2 class="event-news__item--name font30"><a data-fancybox data-type="ajax" data-src="{{$picture->url}}" data-filter="#gallery" href="javascript:;">{{$picture->name}}</a></h2>
                                        <p class="event-news__item--date font20">{{date_format($picture->created_at,"d-m-Y")}}</p>
                                        <p class="event-news__item--description font20">{{Str::words($picture->description,40)}}</p>
                                        <a data-fancybox data-type="ajax" data-src="{{$picture->url}}" data-filter="#gallery" href="javascript:;">
                                            <button class="event-news__item--more font15">{{ __("Readmore") }}</button>
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif