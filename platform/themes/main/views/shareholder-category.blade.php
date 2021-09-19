<div id="introduce-page" class="font-pri mb-4">
<div class="navbar-menu font20 introduce-menu-fixed">
    <div class="container-remake overflow-x-hidden">
        <ul class="nav font-pri-bold">
            @if(!empty(get_shareholder_categories()))
            @foreach (get_shareholder_categories() as $key => $item)
            <li class="nav-item {{$item->url == request()->url() ? "active" : ""}}" data-aos="fade-down">
                <a href="{{$item->url}}"
                    title="{{$item->name}}" class="click_scroll">
                    {{$item->name}}
                </a>
            </li>
            @endforeach
            @endif
        </ul>
    </div>
</div>
</div>
<div class="news-thaco-content container-remake overflow-hidden show-desktop">
    
    <div class="news-thaco-top">
        @php
        $shareholderCategory = get_shareholder_categories()->last();
        $posts = get_shareholder_by_category_id($data->id, 999);
        $count = 0;
        @endphp
        @if (!empty($posts)) 
        @foreach ($posts as $post)
        @if($count<=1)
        <div class="item">
            <div class="item-img">
                <div class="post-thumbnail">
                    <a href="{{$post->url}}"><img loading="lazy" src="{{ get_object_image($post->image) }}" alt="Bản tin Thaco"></a>
                </div>
            </div>
            <div class="item-content">
                <h5 class="title font30 font-pri-bold">
                    <a href="javscritpt:;">{{$post->name}}</a>
                </h5>
                <p class="day font15 font-pri color-gray">
                    {{date_format($post->created_at,"d-m-Y")}}
                </p>
                <p class="desc font-pri font20">
                    
                </p>
                <div class="news-download font20 font-pri-bold mr-4">
                    {{-- <a href="{{ get_object_image(get_field($post, 'newspaper_file')) }}"
                        class="font-pri">{{ __("Tải về") }}</a> --}}
                        <a href="{{ get_object_image($post->file) }}">  
                           {{ __("Tải về") }}
                        </a>
                      
                </div>
                <p class="size-dowload">
                    <span class="font-pri"><a href="">{{ __("DOWNLOAD") }}</a></span>
                </p>
            </div>
        </div>
        @php
            $count++;
            
        @endphp
        @endif

        @endforeach
        @endif
    </div>

    <ul class="news-thaco-list" id="myList">
        @if (!empty($posts))
        @foreach ($posts as  $key => $post)
        @if($count>1 && $key>1)
        <li class="news-thaco-item">
            <div class="item-shareholder">
                <div class="item-wrap">
                    <div class="left">
                        <img loading="lazy" src="{{ Theme::asset()->url('images/main/right-btn.png') }}" alt="{{$post->name}}" class="">
                        {{-- <img loading="lazy" src="{{ Theme::asset()->url('images/main/down.png') }}" alt="{{$post->name}}" class="down-hide"> --}}
                    </div>
                    <div class="mid">
                        <a href="javscritpt:;">
                            <h5 class="title font-pri-bold font25 color-gray">
                                {{$post->name}}
                            </h5>
                        </a>
                       

                    </div>
                    <div class="news-download font20 font-pri-bold mr-4">
                        <a href="{{ get_object_image($post->file) }}">  
                           {{ __("Tải về") }}
                        </a>
                    </div>
                    <div class="right font-pri color-gray">
                        {{date_format($post->created_at,"d-m-Y")}}
                    </div>
                </div>
            </div>

        </li>
        @endif
        @php
            $count++;
            
        @endphp
        @endforeach
        @endif
    </ul>
    <div id="loadMore" class="font20 hidden">
        <span>{{ __("Xem tất cả") }}</span>
        <span>
            <i class="fas fa-arrow-right font15"></i>
        </span>
    </div>
</div>

<div class="news-thaco-content container-remake overflow-hidden show-mobile">
    <div class="news-thaco-top">

        @if (!empty($posts))
            @foreach ($posts as $post)
                <div class="item">
                    <div class="item-img">
                        <div class="post-thumbnail">
                            <a href=""><img loading="lazy" src="{{ get_object_image($post->image) }}" alt="Bản tin Thaco"></a>
                        </div>
                    </div>
                    <div class="item-content">
                        <h5 class="title font30 font-pri-bold">
                            <a href="{{$post->url}}">{{$post->name}}</a>
                        </h5>
                        <p class="day font15 font-pri color-gray">
                            {{date_format($post->created_at,"d-m-Y")}}
                        </p>
                        <p class="desc font-pri font20">
                            {{Str::words($post->description,30)}}
                        </p>
                        <a href="{{$post->url}}" class="view-detail font-pri font15">
                            {{ __("Xem chi tiết") }}<span><i class="fas fa-arrow-right font15"></i></span>
                        </a>

                        <p class="size-dowload">
                            <span class="font-pri"><a href="">{{ __("DOWNLOAD") }}</a></span>
                        </p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <div class="page-pagination hidden-desktop">
        @if(!empty($posts_mb))
            {{ $posts_mb->links('vendor.pagination.custom') }}
        @endif
    </div>
</div>