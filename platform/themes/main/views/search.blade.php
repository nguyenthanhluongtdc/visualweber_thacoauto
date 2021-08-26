{{-- @php Theme::set('section-name', __('Search result for: ') . ' "' . Request::input('q') . '"') @endphp

@if ($posts->count() > 0)
    @foreach ($posts as $post)
        <article class="post post__horizontal mb-40 clearfix">
            <div class="post__thumbnail">
                <img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}"
alt="{{ $post->name }}"><a href="{{ $post->url }}" class="post__overlay"></a>
</div>
<div class="post__content-wrap">
    <header class="post__header">
        <h3 class="post__title"><a href="{{ $post->url }}">{{ $post->name }}</a></h3>
        <div class="post__meta"><span class="post__created-at"><i
                    class="ion-clock"></i>{{ $post->created_at->translatedFormat('M d, Y') }}</span>
            @if ($post->author->username)
            <span class="post__author"><i class="ion-android-person"></i><span>{{ $post->author->name }}</span></span>
            @endif
            <span class="post-category"><i class="ion-cube"></i>
                @if ($post->categories->first())
                <a href="{{ $post->categories->first()->url }}">{{ $post->categories->first()->name }}</a>
                @endif
            </span>
        </div>
    </header>
    <div class="post__content">
        <p data-number-line="4">{{ $post->description }}</p>
    </div>
</div>
</article>
@endforeach
<div class="page-pagination text-right">
    {!! $posts->withQueryString()->links() !!}
</div>
@else
<div class="alert alert-warning">
    <p>{{ __('There is no data to display!') }}</p>
</div>
@endif --}}

@php
Theme::asset()->usePath()->add('reset_css', 'css/reset.css');
@endphp
<div class="search-page">
    <form action="{{route('public.search')}}" class="form-search">
        <div class="container-remake">
            <div class="search-intro">
                <h1 class="font-pri-bold font60 text-uppercase text-center mt-md-5 mt-3"> 
                    {!! __('kết quả tìm kiếm') !!} 
                </h1>
            </div>
            <div class="search-input row mt-md-5 mt-3 mb-5">
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6 search-bar mb-4">
                    <div class="row search">
                        <div class="col-10">
                            <input type="text" class="form-control font20" id="search-bar" placeholder="{!! __('Tìm kiếm') !!}"
                                name="keyword" value="{{ request()->get('keyword') }}">
                        </div>
                        <div class="col-1 input-group-append ">

                            <button id="button-addon5" type="submit" class="btn">
                                <ion-icon name="search-outline" class="font20"></ion-icon>
                            </button>
                        </div>
                    </div>
                    <p class="font-pri mt-2"> 
                        {!! $comment !!} 
                    </p>
                </div>
            </div>

            {{-- <div class="search-range row pb-4 mt-5">
                <div class="col-md-10 col-12 search-cate">
                    <div class="box">
                        <input id="one" type="radio" name="cate" value="">
                        <span class="check"></span>
                        <label for="one" class="font-pri font15">Giới thiệu</label>
                    </div>
                    <div class="box item">
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
                    </div>
                </div>
                <div class="col-md-2 col-12 search-time">
                    <div class="time-picker">
                        <ion-icon name="calendar-outline" class=" pl-md-3 pl-1 font15 calendar"></ion-icon>
                        <input type="date" class="date-frame" id="birthday" name="birthday" class="font15">
                        <ion-icon name="chevron-down-outline" class="arrow font15"></ion-icon>
                    </div>
                </div>
            </div> --}}

            <div class="section-content pt-5">
                @forelse($posts as $post)
                    <div class="search-result row mb-md-4 mb-5" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-easing="ease-in-out">
                        <div class="col-lg-3 col-md-5 result-img">
                            <a class="image h-100" href="#" title="">
                                <img src="{{ Storage::disk('public')->exists($post['image']) ? get_image_url($post['image']) : RvMedia::getDefaultImage() }}" alt="img-detail"
                                    class="w-100 h-100 object-fit-cover">
                            </a>
                        </div>
                        <div class="col-lg-9 col-md-7 result-content">
                            <div class="content">
                                <a href="#">
                                    <h3 class="font-pri-bold font30 fontmb-middle color-gray">
                                        {!! $post['name'] !!}
                                    </h3>
                                </a>
                                <p class="font-pri my-3 font15 fontmb-small">
                                    {!! $post['description'] !!}
                                </p>
                                
                            </div>
                            <p class="font-pri date font15 fontmb-little ">
                                {{\Carbon\Carbon::parse($post['created_at'])->format('d-m-Y');}}
                            </p>
                        </div>
                    </div>
                    
                    @empty
                    <i class="fal fa-empty-set"></i>
                    <p class="text-center font25">
                        {!! __('Không tìm thấy kết quả nào') !!}
                    </p>
                @endforelse
            </div>
            {{-- <div class="search-result row mb-md-4 mb-5" data-aos="fade-up" data-aos-duration="1000"
                data-aos-easing="ease-in-out">
                <div class="col-lg-3 col-md-5 result-img">
                    <a class="image h-100" href="#" title="">
                        <img src="{{ Theme::asset()->url('images/search/search-4.png') }}" alt="img-detail"
                            class="w-100 h-100 object-fit-cover">
                    </a>
                </div>
                <div class="col-lg-9 col-md-7 result-content">
                    <div class="content">
                        <a href="#">
                            <h3 class="font-pri-bold font30  color-gray">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Dolore, perspiciatis? Cupiditate eligen dol optio placeat.</h3>
                        </a>
                        <p class="font-pri my-3 font15">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda
                            laborum officiis nisi omnis! Illum, quibusdam. Lorem ipsum dolor, sit amet consectetur
                            adipisicing elit. Unde eligendi deleniti quam amet earum laudantium.
                        </p>
                        <p class="font-pri date font15">20-12-20201</p>
                    </div>
                </div>
            </div> --}}

            <div class="container-remake">
                {{ $posts->links('vendor.pagination.custom') }}
            </div>
        </div>
    </form>
</div>
</div>