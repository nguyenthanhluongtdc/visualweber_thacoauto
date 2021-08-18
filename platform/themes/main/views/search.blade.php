{{-- @php Theme::set('section-name', __('Search result for: ') . ' "' . Request::input('q') . '"') @endphp

@if ($posts->count() > 0)
    @foreach ($posts as $post)
        <article class="post post__horizontal mb-40 clearfix">
            <div class="post__thumbnail">
                <img src="{{ RvMedia::getImageUrl($post->image, 'medium', false, RvMedia::getDefaultImage()) }}" alt="{{ $post->name }}"><a href="{{ $post->url }}" class="post__overlay"></a>
            </div>
            <div class="post__content-wrap">
                <header class="post__header">
                    <h3 class="post__title"><a href="{{ $post->url }}">{{ $post->name }}</a></h3>
                    <div class="post__meta"><span class="post__created-at"><i class="ion-clock"></i>{{ $post->created_at->translatedFormat('M d, Y') }}</span>
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


<div class="search-page">
    <div class="container-remake">
            <div class="search-intro">
                <h1 class="font-pri-bold font60 text-center mt-5">KẾT QUẢ TÌM KIẾM</h1>
            </div>
            <div class="search-input row mt-5 mb-3">
                <div class="col-sm-3">

                </div>
                <div class="col-sm-6 search-bar mb-4">
                    <div class="row search">
                        <div class="col-md-11">
                            <input type="text" class="form-control font20" id="search-bar" placeholder="Tìm kiếm" name="search" value=""> 
                        </div>
                        <div class="col-md-1 input-group-append ">

                                <button id="button-addon5" type="submit" class="btn"> <ion-icon name="search-outline" class="font20"></ion-icon> </button>

                        </div>
                    </div>
                    
                   
                    <p class="font-pri mt-2">Có 43 kết quả được tìm thấy</p>
                </div>
                
            </div>
            <div class="search-range row pb-4 mt-5">
                <div class="col-md-10 col-12 search-cate">
                    
                    <div class="box">
                        <input id="one" type="checkbox">
                        <span class="check"></span>
                        <label for="one" class="font-pri font15">Giới thiệu</label>
                    </div>
                    <div class="box item">
                        <input id="two" type="checkbox">
                        <span class="check"></span>
                        <label for="two" class="font-pri font15">Lĩnh vực sản xuất kinh doanh</label>
                    </div>
                    <div class="box">
                        <input id="three" type="checkbox">
                        <span class="check"></span>
                        <label for="three" class="font-pri font15">Truyền thông</label>
                    </div>
                    <div class="box">
                        <input id="four" type="checkbox">
                        <span class="check"></span>
                        <label for="four" class="font-pri font15">Quan hệ cổ đông</label>
                    </div>
                    <div class="box">
                        <input id="five" type="checkbox">
                        <span class="check"></span>
                        <label for="five" class="font-pri font15">Tuyển dụng</label>
                    </div>
                    
                </div>
                <div class="col-md-2 col-12 search-time">
                    <div class="time-picker">
                        <ion-icon name="calendar-outline" class="mt-4 pl-3 font15 calendar" style="margin-top: 4px"></ion-icon>
                        <div class="date-frame">
                            <input type="date" id="birthday" name="birthday" class="font15"> 
                          </div>
                        {{-- <input type="date" id="datepicker" name="calendars" autocomplete="off" class="font15"> --}}
                        <ion-icon name="chevron-down-outline" class="arrow font15"></ion-icon>
                    </div>
                    
                </div>
                
            </div>
            
            <div class="search-result row mb-md-4 mb-5"  data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <div class="col-lg-3 col-md-5 result-img">
                    <a class="image h-100" href="#" title="">
                        <img src="{{ Theme::asset()->url('images/search/search-3.png') }}" alt="img-detail" class="w-100 h-100 object-fit-cover">
                    </a>
                </div>
                <div class="col-lg-9 col-md-7 result-content">
                    <div class="content">
                        <a href="#"><h3 class="font-pri-bold font30  color-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, perspiciatis? Cupiditate eligen dol optio placeat.</h3></a>
                        <p class="font-pri my-3 font15">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda laborum officiis nisi omnis! Illum, quibusdam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde eligendi deleniti quam amet earum laudantium.
                        </p>
                        <p class="font-pri date font15">20-12-20201</p>
                    </div>
                </div>
            </div>
            <div class="search-result row mb-md-4 mb-5" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <div class="col-lg-3 col-md-5 result-img">
                    <a class="image h-100" href="#" title="">
                        <img src="{{ Theme::asset()->url('images/search/search-4.png') }}" alt="img-detail" class="w-100 h-100 object-fit-cover">
                    </a>
                </div>
                <div class="col-lg-9 col-md-7 result-content">
                    <div class="content">
                        <a href="#"><h3 class="font-pri-bold font30  color-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, perspiciatis? Cupiditate eligen dol optio placeat.</h3></a>
                        <p class="font-pri my-3 font15">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda laborum officiis nisi omnis! Illum, quibusdam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde eligendi deleniti quam amet earum laudantium.
                        </p>
                        <p class="font-pri date font15">20-12-20201</p>
                    </div>
                </div>
            </div>
            <div class="search-result row mb-md-4 mb-5" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <div class="col-lg-3 col-md-5 result-img">
                    <a class="image h-100" href="#" title="">
                        <img src="{{ Theme::asset()->url('images/search/search-5.png') }}" alt="img-detail" class="w-100 h-100 object-fit-cover">
                    </a>
                </div>
                <div class="col-lg-9 col-md-7 result-content">
                    <div class="content">
                        <a href="#"><h3 class="font-pri-bold font30  color-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, perspiciatis? Cupiditate eligen dol optio placeat.</h3></a>
                        <p class="font-pri my-3 font15">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda laborum officiis nisi omnis! Illum, quibusdam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde eligendi deleniti quam amet earum laudantium.
                        </p>
                        <p class="font-pri date font15">20-12-20201</p>
                    </div>
                </div>
            </div>
            <div class="search-result row mb-md-4 mb-5" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <div class="col-lg-3 col-md-5 result-img">
                    <a class="image h-100" href="#" title="">
                        <img src="{{ Theme::asset()->url('images/search/search-6.png') }}" alt="img-detail" class="w-100 h-100 object-fit-cover">
                    </a>
                </div>
                <div class="col-lg-9 col-md-7 result-content">
                    <div class="content">
                        <a href="#"><h3 class="font-pri-bold font30  color-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, perspiciatis? Cupiditate eligen dol optio placeat.</h3></a>
                        <p class="font-pri my-3 font15">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda laborum officiis nisi omnis! Illum, quibusdam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde eligendi deleniti quam amet earum laudantium.
                        </p>
                        <p class="font-pri date font15">20-12-20201</p>
                    </div>
                </div>
            </div>
            <div class="search-result row mb-md-4 mb-5" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <div class="col-lg-3 col-md-5 result-img">
                    <a class="image h-100" href="#" title="">
                        <img src="{{ Theme::asset()->url('images/search/search-7.png') }}" alt="img-detail" class="w-100 h-100 object-fit-cover">
                    </a>
                </div>
                <div class="col-lg-9 col-md-7 result-content">
                    <div class="content">
                        <a href="#"><h3 class="font-pri-bold font30 color-gray">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, perspiciatis? Cupiditate eligen dol optio placeat.</h3></a>
                        <p class="font-pri my-3 font15">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda laborum officiis nisi omnis! Illum, quibusdam. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Unde eligendi deleniti quam amet earum laudantium.
                        </p>
                        <p class="font-pri date font15">20-12-20201</p>
                    </div>
                </div>
            </div>
            
        <div class="container d-flex justify-content-center mb-5 font-pri">         
                            <ul class="pagination justify-content-center pagination-success">
                                <li class="page-item active"><a class="page-link" href="#" data-abc="true">1</a></li>
                                <li class="page-item"><a class="page-link" href="#" data-abc="true">2</a></li>
                                <li class="page-item"><a class="page-link" href="#" data-abc="true">3</a></li>
                                <li class="page-item"><a class="page-link" href="#" data-abc="true">4</a></li>
                                <li class="page-item"><a class="page-link" href="#" data-abc="true">5</a></li>
                                <li class="page-item"><a class="page-link" href="#" data-abc="true">6</a></li>
                                <li class="page-item"><a class="page-link" href="#" data-abc="true">7</a></li>
                                <li class="page-item"><a class="page-link" href="#" data-abc="true">></a></li>
                                <li class="page-item"><a class="page-link" href="#" data-abc="true">>></a></li>
                            </ul>
                    </div>
            </div>
    </div>
</div>