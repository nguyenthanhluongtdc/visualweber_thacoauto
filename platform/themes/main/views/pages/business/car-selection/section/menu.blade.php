<section class="section-step-menu-car-selection">
    <div class="container-remake">
        <ul class="step-menu">
            <li class="step-menu__item item-1 {{ url('car-selection') == URL::current() ? 'active' : '' }}">
                <a href="{{ url('car-selection') }}" class="font18 font-pri text-uppercase color-gray">
                    1. LỰA CHỌN XE
                </a>
            </li>
            <li class="step-menu__item item-2 {{ url('du-toan-chi-phi') == URL::current() ? 'active' : '' }}">
                <a href="{{ url('du-toan-chi-phi') }}" class=" font18 font-pri text-uppercase color-gray">
                    2. DỰ TOÁN CHI PHÍ
                </a>
            </li>
            <li class="step-menu__item item-3 {{ url('dat-coc') == URL::current() ? 'active' : '' }}">
                <a href="{{ url('dat-coc') }}" class="font18 font-pri text-uppercase color-gray">
                    3. ĐẶT CỌC ĐĂNG KÝ
                </a>
            </li>
        </ul>
    </div>
</section>