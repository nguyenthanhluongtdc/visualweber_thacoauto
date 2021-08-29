<div class="services-block">
    <img loading="lazy" class="services-block__image" src="{{ get_image_url($service->image) }}" alt="">
    <div class="services-block__content">
        <div class="services-block__title">
            <h2 class=" font-mi-bold font40 fontmb-middle color-white">{{ $service->name }}</h2>
        </div>
        <div class="services-block__desc fontmb-little font20 font-pri color-white">{!! clean($service->description) !!}</div>
        <a href="{{ $service->url }}" class=" services-block__button font-mi-bold text-uppercase">{{ __("VIEW DETAIL") }}</a>
    </div>
</div>