<div class="fitter-media">
    <div class="fitter-media-wrap container-remake">
        <form action="{{ URL::current() }}" method="GET" class="form-filter">
            <select name="select_city" id="select_city" name="select_city"
                class="font20 font-mi-cond js-example-disabled-results">
                <option selected disabled>{{ __("Công ty tỉnh thành") }}</option>
                @foreach (is_plugin_active('location') ? get_cities() : collect() as $key => $item)
                    <option {{ intval(request('select_city', -1)) == $key ? 'selected' : '' }}  value="{{ $key }}">{{ $item }}</option>
                @endforeach
            </select>
            <select name="select_category" id="select_category" name="select_category"
                class="font20 font-mi-cond js-example-disabled-results">
                <option selected disabled>{{ __("Thể loại") }}</option>
                @foreach (is_plugin_active('blog') ? get_categories() : collect() as $item)
                    <option {{ intval(request('select_category', -1)) == $item->slug || $category_id == $item->id ? 'selected' : '' }} value="{{ $item->slug }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <select name="select_year" id="select_year" name="select_year"
                class="font20 font-mi-cond js-example-disabled-results">
                <option selected disabled>{{ __("Năm") }}</option>
                @for ($i = intval(date("Y")); $i >= 2019; $i--)
                    <option {{ intval(request('select_year', -1)) == $i ? 'selected' : '' }} value="{{ $i }}" >{{ $i }}</option>
                @endfor
            </select>
            <select name="select_month" value="2" id="select_month" name="select_month"
                class="font20 font-mi-cond js-example-disabled-results">
                <option selected disabled>{{ __("Tháng") }}</option>
                @for ($i = 1; $i < 12; $i++)
                    <option {{ intval(request('select_month', -1)) == $i ? 'selected' : '' }} value="{{ $i }}">{{ __("Tháng") . ' ' . $i }}</option>
                @endfor
            </select>
            <button class="btn-submit">{{ __('Approval') }}</button>
        </form>
    </div>
</div>
