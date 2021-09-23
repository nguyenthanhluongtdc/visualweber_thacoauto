@if(!empty($data))
    @foreach ($data as $item)
    <div class="item-shareholder">
        <div class="left">
            <img loading="lazy" src="{{ Theme::asset()->url('images/main/up.png') }}" alt="Up icon"
                                    class="up-show">
        </div>
        <div class="mid">
            <h5 class="title font25 font-pri-bold color-gray fontmb-small">
                {{$item->name}}
            </h5>
        </div>
        <div class="right font-pri color-gray font20">
            <div class="desc-right">
                <a href="{{get_image_url($item->file)}}" class="font-pri btn">{{__('Tải xuống')}}</a>
            </div>
        </div>
    </div>
    @endforeach
@endif