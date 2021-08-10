<section class="section-car-filter">
    <div class="container-remake">
        <div class="car-filter">
            <h2 class="car-filter__title font30 font-mi-bold">KIỂU DÁNG XE</h2>
        </div>
        <div class="car-filter--top">
            <ul class="car-model font18 font-pri car-model">
                <li class="car-model__item">
                    <span>TẤT CẢ</span>
                </li>
                <li class="car-model__item">
                    <span>HATCHBACK</span>
                </li>
                <li class="car-model__item active">
                    <span>SEDAN</span>
                </li>
                <li class="car-model__item">
                    <span>SUV</span>
                </li>
                <li class="car-model__item">
                    <span>MPV</span>
                </li>
            </ul>
            <a href="#" class="font18 font-pri pre-order">PRE-ORDER</a>
        </div>
        <div class="car-filter--center">
            <select class="provinces-select2 font18 font-pri" name="" id="">
                <option value="">TP. HỒ CHÍ MINH</option>
                <option value="">HÀ NỘI</option>
            </select>
            <div class="slider-range">
                <div class="slider-range__value font18 font-pri">
                    <span>Đến: </span>
                    <span class="filter-value"></span>đ
                </div>
                <div class="slider-range__frame">
                    <span class="slider-range__line"></span>
                    <input type="range" min="100000000" max="20000000000" step="50000000" value="50000000" class="slider" id="myRange">
                </div>

            </div>
        </div>
        <div class="car-filter--bottom">
            <button type="button" class="modal-button" data-toggle="modal" data-target="#exampleModalCenter">
                <span class="frame">
                    <img src="{{Theme::asset()->url('images/business/brand-detail/filter.png')}}" alt="filter icon">
                    BỘ LỌC NÂNG CAO
                </span>
            </button>
        </div>
    </div>
</section>