    
@foreach ($menu_nodes as $key => $row)
    @php $slug = explode ("/", parse_url($row->url)['path'])[1]; @endphp
    <div class="box item">
        <input id="{{Str::slug($row->name, '_')}}" type="radio" name="category" checked="{{Request::get('category')==$slug?'checked':''}}" value="{{$slug}}">
        <span class="check"></span>
        <label for="{{Str::slug($row->name, '_')}}" class="font-pri font15"> {!! $row->name !!} </label>
    </div>
@endforeach
{{-- <div class="box item">
    <input id="two" type="radio" name="cate" value="">
    <span class="check"></span>
    <label for="two" class="font-pri font15">Lĩnh vực sản xuất kinh doanh</label>
</div>
<div class="box">
    <input id="three" class="trigger" type="radio" value="15" name="cate" checked>
    <span class="check"></span>
    <label for="three" class="font-pri font15">Truyền thông</label>
</div>
<div class="box">
    <input id="four" type="radio" name="cate" value="">
    <span class="check"></span>
    <label for="four" class="font-pri font15">Quan hệ cổ đông</label>
</div>
<div class="box">
    <input id="five" type="radio" name="cate" value="">
    <span class="check"></span>
    <label for="five" class="font-pri font15">Tuyển dụng</label>
</div> --}}