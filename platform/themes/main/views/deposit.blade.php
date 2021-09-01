{!! Theme::partial('templates.car-selection-menu', ['car' => $car]) !!}

<div class="my-3 container-remake MyriadPro-Regular font15 deposit-wrapper">
    <form action="{{route('public.deppsit.post')}}" method="POST" class="row">
        @csrf
        <input type="hidden" name="car_id" value="{{$car->id ?? ''}}">
        <input type="hidden" name="color_id" value="{{$color->id ?? ''}}">
        @if(request()->all())
            @forelse(request()->all() as $key=>$value)
                @if(is_array($value))
                    @forelse($value as $subValue)
                            <input type="hidden" name="{{$key}}[]" value="{{$subValue}}">
                    @empty
                    @endforelse
                @else
                    <input type="hidden" name="{{$key}}" value="{{$value}}">
                @endif
            @empty
            @endforelse
        @endif
        <div class="col-sm-12 col-md-12 col-xl-8 mb-4">
            <h2 class="font20 MyriadPro-BoldCond text-uppercase mb-3 fontmb-middle">{!! __('thông tin khách hàng') !!}</h2>
            <p class="mb-4 fontmb-small">
                {!! __('Thông tin khách hàng sẽ được đưa vào thoả thuận hợp đồng. Quý khách vui lòng nhập chính xác các nội dung dưới đây') !!}
            </p>
            <div class="deposit__form">
                <div class="form-group span-3 ">
                    <input type="text" class="form-control MyriadPro-Regular font15 fontmb-small" required name="name" placeholder="{!! __('Nhập họ và tên') !!}" />
                    @error('name')
                        <p class="text-danger mt-2"> {!! $message !!} </p>
                    @enderror
                </div>
                <div class="form-group span-3 ">
                    <input type="text" class="form-control MyriadPro-Regular font15 fontmb-small"required name="phone" placeholder="{!! __('Nhập số điện thoại') !!}" />
                    @error('phone')
                        <p class="text-danger mt-2"> {!! $message !!} </p>
                    @enderror
                </div>
                <div class="form-group span-3">
                    <div class="ui fluid selection dropdown">
                        <input required type="hidden" name="country">
                        <i class="dropdown icon"></i>
                        <div class="default text MyriadPro-Regular font15 fontmb-small">
                            {!! __('Chọn showroom gần bạn') !!}
                        </div>
                        <div class="menu">
                            @forelse (get_showroom_by_state() as $item)
                                <div class="item fontmb-small" data-value="{{$item->id}}"></i>{{$item->name}}</div>
                            @empty
                                
                            @endforelse
                        </div>
                    </div>
                    @error('country')
                        <p class="text-danger mt-2"> {!! $message !!} </p>
                    @enderror
                    {{-- <input type="text" class="form-control MyriadPro-Regular font15" name="showroom" placeholder="Chọn showroom" /> --}}
                </div>
                <div class="form-group span-3 ">
                    <input type="email" class="form-control MyriadPro-Regular font15 fontmb-small" required name="email" placeholder="{!! __('Nhập email') !!}" />
                    @error('email')
                        <p class="text-danger mt-2"> {!! $message !!} </p>
                    @enderror
                </div>
                <div class="form-group span-2">
                    <textarea rows="7" class="form-control MyriadPro-Regular font15 fontmb-small" name="note" placeholder="{!! __('Nhập nội dung') !!}"></textarea>
                    @error('note')
                        <p class="text-danger mt-2"> {!! $message !!} </p>
                    @enderror
                </div>
                <div class="custom-control mt-2 span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input required type="checkbox" name="provision1" class="custom-control-input" id="customControlInline">
                    <label class="custom-control-label fontmb-small" for="customControlInline">
                        {!! theme_option('des_provision1') !!}
                    </label>
                </div>
                <div class="custom-control span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input required type="checkbox" name="provision2" class="custom-control-input" id="customControlInline2">
                    <label class="custom-control-label fontmb-small" for="customControlInline2">
                        {!! theme_option('des_provision2') !!}
                    </label>
                </div>
                <div class="custom-control span-2 d-flex align-center custom-checkbox my-1 mr-sm-2">
                    <input required type="checkbox" name="provision3" class="custom-control-input" id="customControlInline3">
                    <label class="custom-control-label fontmb-small" for="customControlInline3">
                        {!! theme_option('des_provision3') !!}
                    </label>
                </div>
                @if($errors->has('provision1') || $errors->has('provision2') || $errors->has('provision3'))
                    <p class="text-danger mt-3"> {!! __('* Vui lòng đồng ý với các điều khoản trên để tiếp tục') !!} </p>
                @endif
            </div>
        </div>
        {!! Theme::partial('templates.car-cost-total', [
            'car' => $car,
            'color' => isset($color) ? $color : collect(),
            'accessories' => isset($accessories) ? $accessories : collect(),
            'equipments' => isset($equipments) ? $equipments : collect()
        ])!!}
    </form>
    <a class="btn-back fontmb-small" href="{{ url()->previous() }}">
        {!! __('Quay lại') !!}
    </a>
</div>

<script>
    $(document).ready(function() {
        $('.dropdown').dropdown()
    })
</script>