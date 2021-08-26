@forelse(@$distributionSystems as $row)
<div class="branch-item mb-20">
    <p class="branch-name font30 mb-20">{{ $row->name }}</p>
    <p class="branch-address font20 mb-20">{{ $row->description }}</p>
    <div class="logo-wrap mb-20">
        <div class="logo-wrap__left">
            <div class="logo-item">
                <img src="{{Theme::asset()->url('images/distribution/foton.png')}}" alt="">
            </div>
            <div class="logo-item">
                <img src="{{Theme::asset()->url('images/distribution/fuso.png')}}" alt="">
            </div>
            <div class="logo-item">
                <img src="{{Theme::asset()->url('images/distribution/frontier.png')}}" alt="">
            </div>
            <div class="logo-item">
                <img src="{{Theme::asset()->url('images/distribution/thacobus.png')}}" alt="">
            </div>
        </div>
        <div class="logo-wrap__right font17 font-pri font-17">
            <a href="/he-thong-phan-phoi-chi-tiet">Xem chi tiết <i class="fa fa-arrow-right"
                    aria-hidden="true"></i></a>
        </div>
    </div>
</div>
@empty
@endforelse