<div class="section-field-home">
    <div class="section-field-home-wrap container-remake">
        <h2 class="font-pri-bold font60 fontmb-large color-gray text-uppercase" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out">
            {{get_field($page, 'homepage_production_business_title')}}
        </h2>
        <div class="field-home-content">
            <div class="top">
                <div class="top-left hover-image-homepage" data-aos="fade-up" data-aos-duration="1200" data-aos-easing="ease-in-out" >
                    <img loading="lazy" class="black"  src="{{ get_image_url(get_field($page,'homepage_production_logo_black')) }}" alt="{{get_field($page, 'homepage_production_title')}}">
                    <img loading="lazy" class="d-none blue" src="{{ get_image_url(get_field($page,'homepage_production_logo_blue')) }}" alt="{{get_field($page, 'homepage_production_title')}}">
                    <p class="name-img font-pri-bold font18 color-pri fontmb-small">THACO AUTO</p>
                    <a href="{{get_field($page, 'homepage_production_link')}}" class="title font-pri-bold font40 fontmb-middle color-gray">{{get_field($page, 'homepage_production_title')}}</a>
                    <P class="desc font-pri font20 color-gray fontmb-small">{{get_field($page, 'homepage_production_descrtiption')}}</p>
                </div>
                <div class="top-right">
                    <div class="top-right-item hover-image-homepage" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <img loading="lazy" class="black" src="{{ get_image_url(get_field($page,'homepage_production_block_1_logo_black')) }}" alt="{{get_field($page, 'homepage_production_block_1')}}">
                        <img loading="lazy" class="d-none blue" src="{{ get_image_url(get_field($page,'homepage_production_block_1_logo_blue')) }}" alt="{{get_field($page, 'homepage_production_block_1')}}">
                        <p class="top-right-item-title font-pri-bold font30 fontmb-small"><a href="{{get_field($page, 'homepage_production_block_1_link')}}" class="link-item-home">
                            {!!get_field($page, 'homepage_production_block_1')!!}</a></p>
                    </div>
                    <div class="top-right-item hover-image-homepage" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <img loading="lazy" class="black" src="{{ get_image_url(get_field($page,'homepage_production_block_2_logo_black')) }}" alt="{{get_field($page, 'homepage_production_block_2')}}">
                        <img loading="lazy" class="d-none blue"  src="{{ get_image_url(get_field($page,'homepage_production_block_2_logo_blue')) }}" alt="{{get_field($page, 'homepage_production_block_2')}}">
                        <p class="top-right-item-title font-pri-bold font30 fontmb-small"><a href="{{get_field($page, 'homepage_production_block_2_link')}}" class="link-item-home">
                            {!!get_field($page, 'homepage_production_block_2')!!}</a></p>
                    </div>
                    <div class="top-right-item hover-image-homepage" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <img loading="lazy" class="black" src="{{ get_image_url(get_field($page,'homepage_production_block_3_logo_black')) }}" alt="{{get_field($page, 'homepage_production_block_3')}}">
                        <img loading="lazy" class="d-none blue" src="{{ get_image_url(get_field($page,'homepage_production_block_3_logo_blue')) }}" alt="{{get_field($page, 'homepage_production_block_3')}}">
                        <p class="top-right-item-title font-pri-bold font30 fontmb-small"><a href="{{get_field($page, 'homepage_production_block_3_link')}}" class="link-item-home">
                            {!!get_field($page, 'homepage_production_block_3')!!}</a></p>
                    </div>

                    <div class="top-right-item hover-image-homepage" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <img loading="lazy" class="black" src="{{ get_image_url(get_field($page,'homepage_production_block_4_logo_black')) }}" alt="{{get_field($page, 'homepage_production_block_4')}}">
                        <img loading="lazy" class="d-none blue" src="{{ get_image_url(get_field($page,'homepage_production_block_4_logo_blue')) }}" alt="{{get_field($page, 'homepage_production_block_4')}}">
                        <p class="top-right-item-title font-pri-bold font30 fontmb-small"><a href="{{get_field($page, 'homepage_production_block_4_link')}}" class="link-item-home">
                            {!!get_field($page, 'homepage_production_block_4')!!}</a></p>
                    </div>
                </div>
            </div>
            <div class="bottom">
                <div class="bottom-left hover-image-homepage" data-aos="fade-down" data-aos-duration="1200" data-aos-easing="ease-in-out">
                    <img loading="lazy" class="black" src="{{ get_image_url(get_field($page,'homepage_business_logo_black')) }}" alt="{{get_field($page, 'homepage_business_title')}}">
                    <img loading="lazy" class="d-none blue" src="{{ get_image_url(get_field($page,'homepage_business_logo_blue')) }}" alt="{{get_field($page, 'homepage_business_title')}}">
                    <p class="name-img font-pri-bold font18 color-pri fontmb-small">THACO AUTO</p>
                    <a href="{{get_field($page, 'homepage_business_link')}}" class="title font-pri-bold font40 color-gray fontmb-middle">{{get_field($page, 'homepage_business_title')}}</a>
                    <P class="desc font-pri font20 color-gray fontmb-small">{{get_field($page, 'homepage_business_descrtiption')}}</P>
                </div>
                <div class="bottom-right">
                    <div class="bottom-right-item" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <div class="symbol hover-image-homepage">
                            <img loading="lazy" class="black" src="{{ get_image_url(get_field($page,'homepage_business_block_1_logo_black')) }}" alt="{{get_field($page, 'homepage_business_block_1')}}">
                            <img loading="lazy" class="d-none blue" src="{{ get_image_url(get_field($page,'homepage_business_block_1_logo_blue')) }}" alt="{{get_field($page, 'homepage_business_block_1')}}">
                        </div>
                        <p class="bottom-right-item-title font-pri-bold font30 fontmb-small"><a href="{{get_field($page, 'homepage_business_block_1_link')}}" class="link-item-home">{!!get_field($page, 'homepage_business_block_1')!!}</a></p>
                    </div>
                    <div class="bottom-right-item" data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <div class="symbol hover-image-homepage">
                            <img loading="lazy" class="black" src="{{ get_image_url(get_field($page,'homepage_business_block_2_logo_black')) }}" alt="{{get_field($page, 'homepage_business_block_2')}}">
                            <img loading="lazy" class="d-none blue" src="{{ get_image_url(get_field($page,'homepage_business_block_2_logo_blue')) }}" alt="{{get_field($page, 'homepage_business_block_2')}}">
                        </div>
                        <p class="bottom-right-item-title font-pri-bold font30 fontmb-small"><a href="{{get_field($page, 'homepage_business_block_2_link')}}" class="link-item-home">{!!get_field($page, 'homepage_business_block_2')!!}
                            </a></p>
                    </div>
                    <div class="bottom-right-item " data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <div class="symbol hover-image-homepage">
                            <img loading="lazy" class="black" src="{{ get_image_url(get_field($page,'homepage_business_block_3_logo_black')) }}" alt="{{get_field($page, 'homepage_business_block_3')}}">
                            <img loading="lazy" class="d-none blue" src="{{ get_image_url(get_field($page,'homepage_business_block_3_logo_blue')) }}" alt="{{get_field($page, 'homepage_business_block_3')}}">
                        </div>
                        <p class="bottom-right-item-title font-pri-bold font30 fontmb-small"><a href="{{get_field($page, 'homepage_business_block_3_link')}}" class="link-item-home">{!!get_field($page, 'homepage_business_block_3')!!}</a></p>
                    </div>
                    <div class="bottom-right-item " data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <div class="symbol hover-image-homepage">
                            <img loading="lazy"  class="black" src="{{ get_image_url(get_field($page,'homepage_business_block_4_logo_black')) }}" alt="{{get_field($page, 'homepage_business_block_4')}}">
                            <img loading="lazy" class="d-none blue" src="{{ get_image_url(get_field($page,'homepage_business_block_4_logo_blue')) }}" alt="{{get_field($page, 'homepage_business_block_4')}}">
                        </div>
                        <p class="bottom-right-item-title font-pri-bold font30 fontmb-small"><a href="{{get_field($page, 'homepage_business_block_4_link')}}" class="link-item-home">{!!get_field($page, 'homepage_business_block_4')!!}</a></p>
                    </div>

                    <div class="bottom-right-item " data-aos="zoom-in" data-aos-duration="1200" data-aos-easing="ease-in-out">
                        <div class="symbol hover-image-homepage">
                            <img loading="lazy" class="black" src="{{ get_image_url(get_field($page,'homepage_business_block_5_logo_black')) }}" alt="{{get_field($page, 'homepage_business_block_5')}}">
                            <img loading="lazy" class="d-none blue" src="{{ get_image_url(get_field($page,'homepage_business_block_5_logo_blue')) }}" alt="{{get_field($page, 'homepage_business_block_5')}}">
                        </div>
                        <p class="bottom-right-item-title font-pri-bold font30 fontmb-small"><a href="{{get_field($page, 'homepage_business_block_5_link')}}" class="link-item-home">{!!get_field($page, 'homepage_business_block_5')!!}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>