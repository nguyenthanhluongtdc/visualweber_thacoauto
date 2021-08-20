{!! do_shortcode('[filter-media][/filter-media]') !!}

@php
    $imageFeatures = get_featured_posts_by_category(20, 5);
    $videoFeatures = get_featured_posts_by_category(22, 5);
@endphp
<div class="tabs-mobile">
    <div class="container-remake">
        <nav>
            <div class="nav nav-tabs font30 font-pri-bold" id="nav-tab" role="tablist">
              <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">VIDEO</button>
              <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">HÌNH ẢNH</button>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="image-gallery-list font-pri">
                @if (!empty($videoFeatures))
                    @foreach ($videoFeatures as $post)
                    <div class="gallery-item">
                        <div class="thumbnail">
                            <a data-fancybox data-type="ajax" data-src="{{$post->url}}" data-filter="#gallery" href="javascript:;">
                                <img src="{{get_image_url($post->image)}}" alt="{{$post->name}}">
                            </a>
                        </div>
                        <div class="content">
                            <h3 class="title font-pri-bold font30">
                                <a data-fancybox data-type="ajax" data-src="{{$post->url}}" data-filter="#gallery" href="javascript:;">
                                    {{$post->name}}
                                </a>
                            </h3>
                            <p class="day fon20">
                                {{date_format($post->created_at,"d-m-Y")}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                @endif
                
            </div>
          </div>
          <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="video-gallery-list font-pri">
                @if (!empty($imageFeatures))
                    @foreach ($imageFeatures as $post)
                    <div class="gallery-item">
                        <div class="thumbnail">
                            <a data-fancybox data-type="ajax" data-src="{{$post->url}}" data-filter="#gallery" href="javascript:;">
                                <img src="{{get_image_url($post->image)}}" alt="{{$post->name}}">
                            </a>
                        </div>
                        <div class="content">
                            <h3 class="title font-pri-bold font30">
                                <a data-fancybox data-type="ajax" data-src="{{$post->url}}" data-filter="#gallery" href="javascript:;">
                                    {{$post->name}}
                                </a>
                            </h3>
                            <p class="day fon20">
                                {{date_format($post->created_at,"d-m-Y")}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
          </div>
        </div>
    </div>
</div>

<div class="section-desktop">
    <div class="image-gallery container-remake">
        <h3 class="title font-pri-bold font50">
            Hình ảnh
        </h3>
        <div class="image-gallery-list">
            @if (!empty($imageFeatures))
                @foreach ($imageFeatures as $post)
                <div class="item-image">
                    <p class="day font20 font-pri">{{date_format($post->created_at,"d-m-Y")}}</p>
                    <div class="post-thumbnail">
                        <a data-fancybox data-type="ajax" data-src="{{$post->url}}" data-filter="#gallery" href="javascript:;">
                            <img src="{{get_image_url($post->image)}}" alt="{{$post->name}}">
                        </a>
                    </div>
                    <h5 class="font-cond font20">
                        <a data-fancybox data-type="ajax" data-src="{{$post->url}}" data-filter="#gallery" href="javascript:;">
                            {{$post->name}}
                        </a>
                    </h5>
                </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="image-gallery video container-remake">
        <h3 class="title font-pri-bold font50">
            VIDEO
        </h3>
        <div class="image-gallery-list">
            @if (!empty($videoFeatures))
                @foreach ($videoFeatures as $post)
                <div class="item-image">
                    <p class="day font20 font-pri">{{date_format($post->created_at,"d-m-Y")}}</p>
                    <div class="post-thumbnail">
                        <a data-fancybox data-type="ajax" data-src="{{$post->url}}" data-filter="#gallery" href="javascript:;">
                            <img src="{{get_image_url($post->image)}}" alt="{{$post->name}}">
                        </a>
                    </div>
                    <h5 class="font-cond font20">
                        <a data-fancybox data-type="ajax" data-src="{{$post->url}}" data-filter="#gallery" href="javascript:;">
                            {{$post->name}}
                        </a>
                    </h5>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>