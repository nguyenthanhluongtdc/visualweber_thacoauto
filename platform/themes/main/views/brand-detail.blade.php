<section class="section-brand-list">
    <div class="brand-list__banner">
        <img loading="lazy" class="brand-list__banner__img" src="{{get_image_url(has_field($data, 'brand_banner'))}}" alt="Banner brand">
        <div class="brand-list__banner__content">
            <h2 class= "font60 font-cond-bold text-uppercase">{{ __('tìm các dòng xe :brand', ['brand' => $data->name]) }}</h2>
            <p class="font20 font-pri">{{ __("Tìm dòng xe và đăng kí lái thử hoặc đặt hàng thanh toán") }}</p>
        </div>
        <ul class="brand-list__logo container-remake">
            <li class="brand-list__item active">
                <a href="{{ $data->url }}">
                    <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/kia-logo.png')}}">
                </a>
            </li>
            <li class="brand-list__item">
                <a href="#">
                    <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/mazda-logo.png')}}" alt="">
                </a>
            </li>
            <li class="brand-list__item">
                <a href="#">
                    <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/peugeot-logo.png')}}" alt="">
                </a>
            </li>
            <li class="brand-list__item">
                <a href="#">
                    <img loading="lazy" src="{{Theme::asset()->url('images/business/brand-detail/bmw-logo.png')}}" alt="">
                </a>
            </li>
        </ul>
    </div>
</section>
{!! Theme::partial('brands/filter',['slug'=>$slug ?? '']) !!}
{!! Theme::partial('brands/content',['slug'=>$slug ?? '']) !!}