<section class="section-step-menu-car-selection overflow-x-hidden">
    <div class="container-remake">
        <ul class="step-menu">
            <li class="step-menu__item item-1 {{ \Request::route()->getName() == 'public.brand.car-selection' ? 'active' : '' }}">
                <a href="javascript:;" class="font18 fontmb-middle font-pri text-uppercase color-gray">
                    {{ __("1. LỰA CHỌN XE") }}
                </a>
            </li>
            <li class="step-menu__item item-2 {{ \Request::route()->getName() == 'public.brand.cost-estimate' ? 'active' : '' }}">
                <a href="javascript:;" class=" font18 fontmb-middle font-pri text-uppercase color-gray">
                    {{ __("2. DỰ TOÁN CHI PHÍ") }}
                </a>
            </li>
            <li class="step-menu__item item-3 {{ \Request::route()->getName() == 'public.brand.deposit' ? 'active' : '' }}">
                <a href="javascript:;" class="font18 fontmb-middle font-pri text-uppercase color-gray ">
                    {{ __("3. ĐẶT CỌC ĐĂNG KÝ") }}
                </a>
            </li>
        </ul>
    </div>
</section>