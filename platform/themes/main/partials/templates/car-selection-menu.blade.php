<section class="section-step-menu-car-selection">
    <div class="container-remake">
        <ul class="step-menu">
            <li class="step-menu__item item-1 {{ route('public.brand.car-selection', [
                    'slug' => $brand->slug
                ] + request()->all()) == URL::current() ? 'active' : '' }}">
                <a href="{{ route('public.brand.car-selection', [
                    'slug' => $brand->slug
                ] + request()->all()) }}" class="font18 font-pri text-uppercase color-gray">
                    {{ __("1. LỰA CHỌN XE") }}
                </a>
            </li>
            <li class="step-menu__item item-2 {{ url('du-toan-chi-phi') == URL::current() ? 'active' : '' }}">
                <a href="{{ url('du-toan-chi-phi') }}" class=" font18 font-pri text-uppercase color-gray">
                    {{ __("2. DỰ TOÁN CHI PHÍ") }}
                </a>
            </li>
            <li class="step-menu__item item-3 {{ url('dat-coc') == URL::current() ? 'active' : '' }}">
                <a href="{{ url('dat-coc') }}" class="font18 font-pri text-uppercase color-gray">
                    {{ __("3. ĐẶT CỌC ĐĂNG KÝ") }}
                </a>
            </li>
        </ul>
    </div>
</section>