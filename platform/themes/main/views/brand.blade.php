<section class="section-brand overflow-x-hidden">
    <div class="container-remake">
        @forelse (get_car_categories_parent() ?? collect() as $item)
            <div class="brand-block">
                <div class="tabs">
                    @if(!empty($item->childrens))
                    @php
                        $i=0;
                    @endphp
                    @foreach ($item->childrens as $key => $children)
                        @foreach ($children->brands ?? collect() as $brand)
                            @php
                                $i++
                            @endphp
                        @endforeach
                    @endforeach
                    @if($i!=0)
                    <h3 class="brand-name font-pri-bold font40 fontmb-middle">{{ $item->name }}</h3>
                    @endif
                    @endif
                    @foreach ($item->childrens as $key => $children)
                        <input type="radio" name="{{ 'tabs_' . $item->id }}" id="{{ 'tab_' . $item->id . '_' . $children->id }}" @if($key == 0) checked="checked" @endif>
                        <label for="{{ 'tab_' . $item->id . '_' . $children->id }}" class="font-pri font18">{{ $children->name }}</label>
                        <div class="tab">
                            <h1 class="font-pri-bold font20 mb-3 fontmb-medium">{{ $children->description }}</h1>
                            <div class="font-pri font18 fontmb-little">{!! $children->content !!}</div>
                            <div class="brand-logo">
                                @foreach ($children->brands ?? collect() as $brand)
                                    <div class="logo-img">
                                        <a href="{{ $brand->url }}">
                                            <img loading="lazy" src="{{ get_image_url($brand->image) }}" alt="{{ $brand->name }}" >
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @empty
            {!! Theme::partial('templates/no-content') !!}
        @endforelse
    </div>
</section>