<div class="gallery-detail" id="gallery">
    <div class="gallery">
        @if (!empty($galleries = gallery_meta_data($post)))
                @foreach ($galleries as $gallery)
                <div class="gallery-pic">
                    <a href="{{ RvMedia::getImageUrl(Arr::get($gallery, 'img')) }}" data-fancybox="images">
                        <img src="{{ RvMedia::getImageUrl(Arr::get($gallery, 'img')) }}" />
                    </a>
                </div>
                
                @endforeach
        @endif
        @if (!empty(get_field($post, 'video_gallery')))
                @foreach (get_field($post, 'video_gallery') as $gallery)
                <div class="gallery-pic">
                    <a data-fancybox href="https://www.youtube.com/watch?v={{get_sub_field($gallery, 'youtube_code')}}">
                        <img src="http://img.youtube.com/vi/{{get_sub_field($gallery, 'youtube_code')}}/mqdefault.jpg" />
                    </a>
                </div>
                
                @endforeach
        @endif
    {{-- <div class="swiper-container gallery-swiper">
        <div class="swiper-wrapper">
            @if (!empty($galleries = gallery_meta_data($post)))
                @foreach ($galleries as $gallery)
                <div class="swiper-slide">
                    <a href="{{ RvMedia::getImageUrl(Arr::get($gallery, 'img')) }}" data-fancybox="images">
                        <img src="{{ RvMedia::getImageUrl(Arr::get($gallery, 'img')) }}" />
                    </a>
                </div>
                @endforeach
            @endif
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div> --}}
</div>

<script>
    var swiper = new Swiper(".gallery-swiper", {
      pagination: {
        el: ".swiper-pagination",
        type: "fraction",
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
</script>
</div>