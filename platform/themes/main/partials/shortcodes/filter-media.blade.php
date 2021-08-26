<div class="fitter-media">
    <div class="fitter-media-wrap container-remake">
        <form action="{{ URL::current() }}" method="GET" class="form-filter">
            <select disabled name="seleccity" id="seleccity" name="seleccity"
                class="font20 font-mi-cond js-example-disabled-results">
                <option selected disabled>{{ __("Công ty tỉnh thành") }}</option>
                @foreach (is_plugin_active('location') ? get_cities() : collect() as $key => $item)
                    <option {{ intval(request('seleccity', -1)) == $key ? 'selected' : '' }}  value="{{ $key }}">{{ $item }}</option>
                @endforeach
            </select>
            <select name="selectmedia" id="selectmedia" name="selectmedia"
                class="font20 font-mi-cond js-example-disabled-results">
                <option selected disabled>{{ __("Thể loại") }}</option>
                @foreach (is_plugin_active('blog') ? get_categories() : collect() as $item)
                    <option {{ intval(request('selectmedia', -1)) == $item->id || $category_id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <select name="selectyear" id="selectyear" name="selectyear"
                class="font20 font-mi-cond js-example-disabled-results">
                <option selected disabled>{{ __("Năm") }}</option>
                @for ($i = intval(date("Y")); $i >= 2019; $i--)
                    <option {{ intval(request('selectyear', -1)) == $i ? 'selected' : '' }} value="{{ $i }}" >{{ $i }}</option>
                @endfor
            </select>
            <select name="selectmonth" value="2" id="selectmonth" name="selectmonth"
                class="font20 font-mi-cond js-example-disabled-results">
                <option selected disabled>{{ __("Tháng") }}</option>
                @for ($i = 1; $i < 12; $i++)
                    <option {{ intval(request('selectmonth', -1)) == $i ? 'selected' : '' }} value="{{ $i }}">{{ __("Tháng") . ' ' . $i }}</option>
                @endfor
            </select>
            <button class="btn-submit">{{ __('Approval') }}</button>
        </form>
    </div>
</div>
