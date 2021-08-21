
@isset($name_menu)
<div class="section-support-industry-tab">
    <div class="mechanical-tab-wrapper"
        style="background-image:url('{{ Theme::asset()->url('images/mechandical/bg-tab2.png') }}')">
        <div class="container-remake mechanical-tab__content" data-aos="fade-up" data-aos-duration="1500"
            data-aos-easing="ease-in-out" data-aos-delay="50">
            <div class="py-lg-5 py-4">
                <div class="row">
                    {!!
                        Menu::renderMenuLocation($name_menu, [
                            'options' => [],
                            'theme' => true,
                            'view' => 'tabs_business',
                        ])
                    !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endisset



